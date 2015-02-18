<?php

/**
 * AssociationSurvey
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    quehagoporti
 * @subpackage model
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class AssociationSurvey extends BaseAssociationSurvey
{
	
	public function getDepartmentsString()
	{
		$results = Doctrine::getTable('AssociationSurveyDepartment')->createQuery()->where('association_survey_id = '.$this->getId())->execute();
		
		$var = "";
		foreach( $results as $department )
			$var .= $department." ";
		
		return $var;
	}
	
	public function getSatRegistryString()
	{
		if( $this->getSatRegistry() )
			return "Si";
		return "No";
	}
	
	public function getDonationsString()
	{
		if( $this->getDonations() )
			return "Si";
		return "No";
	}
	
}