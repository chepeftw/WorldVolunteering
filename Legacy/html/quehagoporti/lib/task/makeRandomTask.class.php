<?php

class makeRandomTask extends sfBaseTask
{
  public function configure()
  {
	$this->addOptions(array(
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
    ));

    $this->namespace = 'quehagoporti';
    $this->name      = 'randomize';
  }
 
  public function execute($arguments = array(), $options = array())
  {
	    $databaseManager = new sfDatabaseManager($this->configuration);
		$connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

		$results = Doctrine::getTable('Association')
				->createQuery()
				->execute();
					
		foreach( $results as $result )
		{
			$result->setRandomValue( mt_rand(0, 9999999) );
			$result->save(null, 0);
		}
  }
}
