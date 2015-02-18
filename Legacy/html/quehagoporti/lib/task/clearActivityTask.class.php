<?php

class clearActivityTask extends sfBaseTask
{
  public function configure()
  {
	$this->addOptions(array(
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
    ));

    $this->namespace = 'quehagoporti';
    $this->name      = 'clear';
  }
 
  public function execute($arguments = array(), $options = array())
  {
	    $databaseManager = new sfDatabaseManager($this->configuration);
		$connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

		$results = Doctrine::getTable('Activity')
				->createQuery()
				->execute();
					
		foreach( $results as $result )
		{
			$diff_time = strtotime($result->getDate()) - strtotime("now");
			if( $diff_time <= 0 )
			{
				$result->setIsActive( false );
				$result->save();
			}
		}
  }
}
