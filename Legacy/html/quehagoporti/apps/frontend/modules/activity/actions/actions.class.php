<?php

/**
 * activity actions.
 *
 * @package    quepuedohacerporti
 * @subpackage activity
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activityActions extends sfActions
{
  public function executeShow(sfWebRequest $request)
  {
    $this->activity = $this->getRoute()->getObject();
    $this->forward404Unless($this->activity);
    
    $this->type = $request->getParameter('is_historic', 1);
    
    $this->getResponse()->setTitle(sprintf('Actividad %s, %s - GuateVoluntaria.org', $this->activity->getTitle(), $this->activity->getDateSpanish()));
    
    $this->getResponse()->addHttpMeta('cache-control', 'public');
	$this->getResponse()->addMeta('description', 'Informacion de la actividad de '.$this->activity->getAssociation()->getName().', contamos con informacion sobre la asociacion, actividades actuales, necesitamos tu ayuda para construir una mejor Guatemala.');
	$this->getResponse()->addMeta('keywords', 'actividad '.$this->activity->getAssociation()->getName().', voluntarios, voluntariado, trabajo voluntario, voluntarios en guatemala, voluntariado en guatemala, guatemala que hago por ti, que hago por ti, guatemala' );
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->association = $this->getRoute()->getObject();
	
    $this->form = new ActivityFrontForm();
    
    $this->getResponse()->setTitle(sprintf('Nueva Actividad de %s', $this->association->getName()));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ActivityFrontForm();

    $this->processForm($request, $this->form);
	
	$activity = $request->getParameter('activity');
	
	$this->getUser()->setFlash('error', sprintf('Ocurrio un error, porfavor revise el formulario.' ));
	$this->association = Doctrine::getTable('Association')->find( $activity['association_id'] );
    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($activity = Doctrine_Core::getTable('Activity')->find(array($request->getParameter('id'))), sprintf('Object activity does not exist (%s).', $request->getParameter('id')));
    
    if( $activity->isMine( $this->getUser()->getGuardUser()->getId() ) )
		$activity->delete();
    
    $this->getUser()->setFlash('notice', sprintf('Actividad borrada exitosamente.' ));

    $this->redirect('association_activities', $activity->getAssociation());
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
      $activity = $form->save();

		$this->getUser()->setFlash('notice', sprintf('Actividad guardada exitosamente para la fecha '.$activity->getDateSpanish().', tomara aprox 1 hora para que se replique en el sitio.' ));

      $this->redirect('association_activities', $activity->getAssociation());
    }
  }
  
  public function executeShowactivities(sfWebRequest $request)
  {
    $this->association = $this->getRoute()->getObject();
    $this->forward404Unless($this->association);
      
    $this->form = new ActivityFrontForm();
      
	$this->pager = new sfDoctrinePager(
	'Activity',
	sfConfig::get('app_max_associations')
	);
	$this->pager->setQuery( $this->association->getActualActivities() );
	$this->pager->setPage($request->getParameter('pagina', 1));
	$this->pager->init();
	
	$this->getResponse()->setTitle(sprintf('Actividades de %s - GuateVoluntaria.org', $this->association->getName()));
	
	$this->getResponse()->addHttpMeta('cache-control', 'public');
	$this->getResponse()->addMeta('description', 'Actividades de la asociacion '.$this->association->getName().', contamos con informacion sobre la asociacion, actividades actuales, necesitamos tu ayuda para construir una mejor Guatemala.');
	$this->getResponse()->addMeta('keywords', 'actividades '.$this->association->getName().', voluntarios, voluntariado, trabajo voluntario, voluntarios en guatemala, voluntariado en guatemala, guatemala que hago por ti, que hago por ti, guatemala' );
  }

  public function executeShowactivitieshistory(sfWebRequest $request)
  {
    $this->association = $this->getRoute()->getObject();
    $this->forward404Unless($this->association);
    
    $this->pager = new sfDoctrinePager(
	'Activity',
	sfConfig::get('app_max_associations')
	);
	$this->pager->setQuery( $this->association->getHistoricActivities() );
	$this->pager->setPage($request->getParameter('pagina', 1));
	$this->pager->init();
	
	$this->getResponse()->setTitle(sprintf('Historial de %s - GuateVoluntaria.org', $this->association->getName()));
	
	$this->getResponse()->addHttpMeta('cache-control', 'public');
	$this->getResponse()->addMeta('description', 'Historial de la asociacion '.$this->association->getName().', contamos con informacion sobre la asociacion, actividades actuales, necesitamos tu ayuda para construir una mejor Guatemala.');
	$this->getResponse()->addMeta('keywords', 'historial '.$this->association->getName().', voluntarios, voluntariado, trabajo voluntario, voluntarios en guatemala, voluntariado en guatemala, guatemala que hago por ti, que hago por ti, guatemala' );
  }
}
