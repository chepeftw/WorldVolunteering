<?php

/**
 * volunteer_survey actions.
 *
 * @package    quehagoporti
 * @subpackage volunteer_survey
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class volunteer_surveyActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->volunteer_surveys = Doctrine_Core::getTable('VolunteerSurvey')
      ->createQuery('a')
      ->execute();
  }
  
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

  public function executeThanks(sfWebRequest $request)
  {
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new VolunteerSurveyForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new VolunteerSurveyForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    //$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    
    $captcha = array(
	  'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
	  'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
	);
	$form->bind(array_merge($request->getParameter($form->getName()), array('captcha' => $captcha) ), $request->getFiles($form->getName()));
	
    if ($form->isValid())
    {
      $volunteer_survey = $form->save();

      $this->redirect('survey_volunteer2', $volunteer_survey);
    }
  }
}
