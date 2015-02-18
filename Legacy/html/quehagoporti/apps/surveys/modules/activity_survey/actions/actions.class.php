<?php

/**
 * activity_survey actions.
 *
 * @package    quehagoporti
 * @subpackage activity_survey
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activity_surveyActions extends sfActions
{
  public function executeShow(sfWebRequest $request)
  {
    $this->activity_survey = Doctrine_Core::getTable('ActivitySurvey')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->activity_survey);
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->volunteer_survey = $this->getRoute()->getObject();
	  
    $this->activity_surveys = Doctrine_Core::getTable('ActivitySurvey')
      ->createQuery('a')
      ->where('volunteer_survey_id = '.$this->volunteer_survey->getId())
      ->execute();
	  
    $this->form = new ActivitySurveyForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ActivitySurveyForm();

    $this->processForm($request, $this->form);

	$tmp = $request->getParameter('activity_survey');
	$this->volunteer_survey = Doctrine::getTable('VolunteerSurvey')->find( $tmp['volunteer_survey_id'] );
	
	$this->activity_surveys = Doctrine_Core::getTable('ActivitySurvey')
      ->createQuery('a')
      ->where('volunteer_survey_id = '.$this->volunteer_survey->getId())
      ->execute();
	
    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($activity_survey = Doctrine_Core::getTable('ActivitySurvey')->find(array($request->getParameter('id'))), sprintf('Object activity_survey does not exist (%s).', $request->getParameter('id')));
    $activity_survey->delete();

    $this->redirect('survey_volunteer2', $activity_survey->getVolunteerSurvey());
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $success = $request->getParameter('suc');
    if ($form->isValid())
    {
      $activity_survey = $form->save();

	  if( $success )
		$this->redirect('survey_volunteer2', $activity_survey->getVolunteerSurvey());
	  else
		$this->redirect('survey_volunteer3');
    }
  }
}
