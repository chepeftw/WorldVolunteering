#!/app/bash
# Use -gt 1 to consume two arguments per pass in the loop (e.g. each
# argument has a corresponding value to go with it).
# Use -gt 0 to consume one or more arguments per pass in the loop (e.g.
# some arguments don't have a corresponding value to go with it such
# as in the --default example).

S='docker-compose.yml'
FORCE_FLAG=false

## docker-compose exec php tail -f var/logs/dev.log

# Cache Clear
# This functions first deletes all files from var/console symfony directory.
# Then it deletes the same folders in the containers.
# If this fails, it creates the folders just in case and assign them 777 permission.
# Then runs symfony cache clear, which up to this point is redundant, I know, but
# the cache clear will generate some files.
# Finally it assings permissions 777 to make sure.
function sf_cacheclear {
    sf_composer dump-autoload

    rm -rf web/var/console/dev/* web/var/console/prod/*
    docker-compose exec php rm -rf /var/www/symfony/var/logs/* /var/www/symfony/var/cache/dev/* /var/www/symfony/var/cache/prod/*
    docker-compose exec php mkdir -p /var/www/symfony/var/logs /var/www/symfony/var/cache /var/www/symfony/var/sessions /var/www/symfony/web/uploads /var/www/symfony/web/downloads /var/www/symfony/web/media
    docker-compose exec php chmod -R 777 /var/www/symfony/var/logs /var/www/symfony/var/cache /var/www/symfony/var/sessions /var/www/symfony/web/uploads /var/www/symfony/web/downloads /var/www/symfony/web/media

    docker-compose exec php app/console cache:clear --env=prod
    docker-compose exec php app/console cache:clear
    docker-compose exec php app/console assets:install
    docker-compose exec php app/console cache:warmup --env=prod
    docker-compose exec php app/console cache:warmup
    docker-compose exec php chmod -R 777 /var/www/symfony/var/logs /var/www/symfony/var/cache /var/www/symfony/var/sessions
    docker-compose exec php chmod -R 777 /var/www/symfony/web/downloads

    docker-compose exec nginx chmod -R 777 /var/lib/nginx/tmp/client_body
}

function sf_restartall {
    if [ "$FORCE_FLAG" = true ] ; then
        echo 'Be careful not to fall off!'
        docker-compose exec php app/console doctrine:schema:drop --force
        docker-compose exec php app/console doctrine:schema:update --dump-sql --force
        docker-compose exec php app/console fos:user:create admin admin@admin.com admin --super-admin

        docker-compose exec php app/console cache:clear --env=prod
        docker-compose exec php app/console cache:clear
        docker-compose exec php chmod -R 777 /var/www/symfony/var/console /var/www/symfony/var/logs
    else
        echo 'Doing nothing!'
    fi
}

function sf_fixtures {
    docker-compose exec php php app/console doctrine:fixtures:load
}

# Composer
# This function is either to update or install the symfony project,
# ASSUMING is an existing project but it is being instantiated in a new
# location, like a server or new dev machine.
function sf_composer {
    docker-compose exec tools composer $1
}

# DB Backup
# Backups database
function db_backup {
    OUTPUT="./backups"
    DATE_NOW=`date +%Y%m%d`
    mkdir -p $OUTPUT/$DATE_NOW
    docker-compose exec db sh -c 'mysqldump --force --opt --user=$MYSQL_USER --password=$MYSQL_PASSWORD --databases $MYSQL_DATABASE' > $OUTPUT/$DATE_NOW/db_backup_$DATE_NOW.sql
    gzip < $OUTPUT/$DATE_NOW/db_backup_$DATE_NOW.sql > $OUTPUT/$DATE_NOW/db_backup_$DATE_NOW.gz
}

function db_quick_backup {
    OUTPUT="./restore"
    mkdir -p $OUTPUT/quick
    docker-compose exec db sh -c 'mysqldump --force --opt --user=$MYSQL_USER --password=$MYSQL_PASSWORD --databases $MYSQL_DATABASE' > $OUTPUT/quick/db_backup.sql
}

function files_backup {
    OUTPUT="./backups"
    DATE_NOW=`date +%Y%m%d`
    mkdir -p $OUTPUT/$DATE_NOW
    tar -zcf $OUTPUT/`date +%Y%m%d`/web_backup_`date +%Y%m%d`.tar.gz ./Web2/web/uploads/
}

function db_quick_restore {
    INPUT="./restore"
    docker-compose exec db sh -c 'mysql --force --user=$MYSQL_USER --password=$MYSQL_PASSWORD < /restore/quick/db_backup.sql'
}

function db_restore {
    INPUT="./restore"
    DATE_NOW=`date +%Y`
    docker-compose exec db sh -c 'mysql --force -D worldVolunteering --user=root --password=$MYSQL_ROOT_PASSWORD < /restore/db_backup_2018.sql'
}

function jenkins_pass {
    docker-compose exec jenkins cat /var/jenkins_home/secrets/initialAdminPassword
}


# New SF Project
# This command can only be run using the PROD environment.
# This is because the dev environment is intended to use the sync container,
# and this container copies from local FS (L_FS) to the container FS (C_FS),
# but not from C_FS to L_FS, so everything that is created inside the container
# stays in the container and this case we want it to be copied back tot he LF_FS.
function sf_new {
    mkdir upweb
    docker-compose exec tools symfony new /var/www/symfony 3.4
}

# Docker Build, Start and Stop
# This 3 functions will heavily rely on docker-compose and the yml compose conf file.
# The intention is to build, start or stop the instances.
# The start function, not only start the docker infrastructure, but also assigns some
# permissions to some nginx folder that caused me problems in the past.
# Lastly it updates symfony schema.
function dock_build {
    docker-compose -f $S build
}

MD5CMD="md5"

function dock_startfirsttime {
    if [ ! -f ./mysql.env ]; then
      echo "mysql.env not found! Creating one!"
      DBNAME="worldvolunteering"$(date | ${MD5CMD} | head -c8)
      USERNAME="guatevoluntaria"$(date | ${MD5CMD} | head -c8)
      PWD1=$(date | ${MD5CMD} | head -c32)
      PWD2=$(openssl rand -base64 64 | ${MD5CMD} | head -c32)
      cp mysql.template mysql.env
      sed -i '.original' "s/%%database%%/${DBNAME}/g" mysql.env
      sed -i '.original' "s/%%username%%/${USERNAME}/g" mysql.env
      sed -i '.original' "s/%%password%%/${PWD1}/g" mysql.env
      sed -i '.original' "s/%%root_password%%/${PWD2}/g" mysql.env

      if [ ! -f ./Web/app/config/parameters.yml ]; then
          echo "parameters.yml not found! Creating one!"
          cp ./Web/app/config/parameters.yml.dist ./Web/app/config/parameters.yml
          sed -i '.original' "s/%%database%%/${DBNAME}/g" ./Web/app/config/parameters.yml
          sed -i '.original' "s/%%username%%/${USERNAME}/g" ./Web/app/config/parameters.yml
          sed -i '.original' "s/%%password%%/${PWD1}/g" ./Web/app/config/parameters.yml
      fi
    fi

    docker-compose -f $S build

    docker-compose -f $S up -d

    docker-compose exec nginx mkdir -p /var/lib/nginx/tmp/client_body
    docker-compose exec nginx chown -R www-data:www-data /var/lib/nginx /var/lib/nginx/tmp /var/lib/nginx/tmp/client_body
    docker-compose exec nginx chmod -R 777 /var/lib/nginx/tmp/client_body /var/lib/nginx/tmp /var/lib/nginx

    sf_composer install

    docker-compose exec php app/console doctrine:schema:update --dump-sql --force

    db_restore
    sf_cacheclear
}

function dock_start {
    docker-compose -f $S up -d

    docker-compose exec nginx mkdir -p /var/lib/nginx/tmp/client_body
    docker-compose exec nginx chown -R www-data:www-data /var/lib/nginx /var/lib/nginx/tmp /var/lib/nginx/tmp/client_body
    docker-compose exec nginx chmod -R 777 /var/lib/nginx/tmp/client_body /var/lib/nginx/tmp /var/lib/nginx

    docker-compose exec php app/console doctrine:schema:update --dump-sql --force
}

function dock_stop {
    docker-compose -f $S stop
}

function dock_down {
    docker-compose -f $S down
}



while [[ $# -gt 1 ]]
do
key="$1"

case $key in
    -e|--environment)
        ENV="$2"
        shift # past argument
    ;;
    -a|--action)
        ACTION="$2"
        shift # past argument
    ;;
    -f|--force)
        FORCE_FLAG=$2
        echo "Force ..."
        shift # past argument
    ;;
    *)
        # unknown option
    ;;
esac
shift # past argument or value
done

if [ "$ENV" == "dev" ];
then
    echo "Dev ..."
    S='docker-compose.dev.yml'
fi


case "$ACTION" in
    start)
        dock_start
        ;;

    stop)
        dock_stop
        ;;
    down)
        dock_down
        ;;

    build)
        dock_build
        ;;

    run)
        dock_build
        dock_start
        ;;

    cacheclear)
        sf_cacheclear
        ;;
    cc)
        sf_cacheclear
        ;;

    backup)
        db_backup
        ;;

    restore)
        db_restore
        ;;

    quickbu)
        db_quick_backup
        ;;

    quickrt)
        db_quick_restore
        ;;

    install)
        sf_composer install
        ;;

    update)
        sf_composer update
        ;;

    reinit)
        sf_restartall
        ;;

    jenkins)
        jenkins_pass
        ;;

    new)
        sf_new
        ;;

    fixtures)
        sf_restartall
        sf_fixtures
        sf_cacheclear
        ;;

    firsttime)
        dock_startfirsttime
        ;;

    *)
        echo $"Usage: $0 -a {start|stop|build|run|cacheclear|install|update|reinit|backup|restore|jenkins|down|quickbu|quickrt}"
        exit 1
esac
