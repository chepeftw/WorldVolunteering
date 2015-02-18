<?php

class fixAssociationTask extends sfBaseTask
{
  public function configure()
  {
	$this->addOptions(array(
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
    ));

    $this->namespace = 'quehagoporti';
    $this->name      = 'fix';
  }
 
  public function execute($arguments = array(), $options = array())
  {
	    $databaseManager = new sfDatabaseManager($this->configuration);
		$connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

		$cont = 0;
		$i = 0;
	
		$results = Doctrine::getTable('Association')
				->createQuery()
				->count();
					
		while( $count < $results )
		{
			$result = Doctrine::getTable('Association')->find( $i );
			if( $result == null )
			{
				$i++;
				continue;
			}
			
			$result->save();
			unset( $result );
			$i++;
			$count++;
		}
  }
}
