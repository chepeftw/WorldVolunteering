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
  public function executeIndex(sfWebRequest $request)
  {
    $this->activity_surveys = Doctrine_Core::getTable('ActivitySurvey')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->activity_survey = Doctrine_Core::getTable('ActivitySurvey')->find(array($request->getParameter('volunteer_survey_id'),
                                    $request->getParameter('association_survey_id')));
    $this->forward404Unless($this->activity_survey);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ActivitySurveyForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ActivitySurveyForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($activity_survey = Doctrine_Core::getTable('ActivitySurvey')->find(array($request->getParameter('volunteer_survey_id'),
              $request->getParameter('association_survey_id'))), sprintf('Object activity_survey does not exist (%s).', $request->getParameter('volunteer_survey_id'),
              $request->getParameter('association_survey_id')));
    $this->form = new ActivitySurveyForm($activity_survey);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($activity_survey = Doctrine_Core::getTable('ActivitySurvey')->find(array($request->getParameter('volunteer_survey_id'),
              $request->getParameter('association_survey_id'))), sprintf('Object activity_survey does not exist (%s).', $request->getParameter('volunteer_survey_id'),
              $request->getParameter('association_survey_id')));
    $this->form = new ActivitySurveyForm($activity_survey);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($activity_survey = Doctrine_Core::getTable('ActivitySurvey')->find(array($request->getParameter('volunteer_survey_id'),
              $request->getParameter('association_survey_id'))), sprintf('Object activity_survey does not exist (%s).', $request->getParameter('volunteer_survey_id'),
              $request->getParameter('association_survey_id')));
    $activity_survey->delete();

    $this->redirect('activity_survey/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $activity_survey = $form->save();

      $this->redirect('activity_survey/edit?volunteer_survey_id='.$activity_survey->getVolunteerSurveyId().'&association_survey_id='.$activity_survey->getAssociationSurveyId());
    }
  }
}
