<?php

require_once dirname(__FILE__).'/../lib/volunteer_surveyGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/volunteer_surveyGeneratorHelper.class.php';

/**
 * volunteer_survey actions.
 *
 * @package    quehagoporti
 * @subpackage volunteer_survey
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class volunteer_surveyActions extends autoVolunteer_surveyActions
{
	
  public function executeExcel(sfWebRequest $request)
  {
	$this->setLayout(false);
  
    $this->volunteer_surveys = Doctrine_Core::getTable('VolunteerSurvey')
      ->createQuery('a')
      ->execute();
      
    $this->formV = new VolunteerSurveyForm();
    $this->formA = new ActivitySurveyForm();
      
    $this->max_activities = VolunteerSurvey::getMaxNumberOfActivities();

	$reportName = 'Reporte Voluntarios '.date(DATE_RFC822).'.xls';
	$this->getResponse()->setHttpHeader('Content-Disposition', 'inline; filename="'.$reportName.'"');
	$this->getResponse()->setContentType('application/vnd.ms-excel');
  }
	
}
