<?php

/**
 * AssociationTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AssociationTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AssociationTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Association');
    }
    
    static public function getLuceneIndex()
	{
		ProjectConfiguration::registerZend();

		if (file_exists($index = self::getLuceneIndexFile()))
			return Zend_Search_Lucene::open($index);

		return Zend_Search_Lucene::create($index);
	}
	 
	static public function getLuceneIndexFile()
	{
	  return sfConfig::get('sf_data_dir').'/association.index';
	}
	
	public function getForLuceneQuery( $query, $col = 0, $mod = null )
	{
		$hits = self::getLuceneIndex()->find( $query );

		$pks = array();
		foreach ( $hits as $hit )
		{
			$pks[] = $hit->pk;
		}

		if ( empty( $pks ) )
		{
			return array();
		}

		$q = $this->createQuery('j')
				->where('j.approved = 1')
				->whereIn('j.id', $pks)
				->limit(25);
				
		return $q->execute();
	}
}
