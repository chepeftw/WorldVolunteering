<?php

/**
 * association_survey actions.
 *
 * @package    quehagoporti
 * @subpackage association_survey
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class association_surveyActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }
  
  public function executeThanks(sfWebRequest $request)
  {
  }
  
  public function executeExcel(sfWebRequest $request)
  {
	$this->setLayout(false);
  
    $this->association_surveys = Doctrine_Core::getTable('AssociationSurvey')
      ->createQuery('a')
      ->execute();
      
    $this->form = new AssociationSurveyForm();

	$reportName = 'Reporte Asociaciones '.date(DATE_RFC822).'.xls';
	$this->getResponse()->setHttpHeader('Content-Disposition', 'inline; filename="'.$reportName.'"');
	$this->getResponse()->setContentType('application/vnd.ms-excel');
  }

/*
  public function executeShow(sfWebRequest $request)
  {
    $this->association_survey = Doctrine_Core::getTable('AssociationSurvey')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->association_survey);
  }
*/

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AssociationSurveyForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AssociationSurveyForm();

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
      $association_survey = $form->save();

      $this->redirect('association_survey/thanks');
    }
  }
}
