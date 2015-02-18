<?php

/**
 * association actions.
 *
 * @package    quepuedohacerporti
 * @subpackage association
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class associationActions extends sfActions
{
  public function executeSearch(sfWebRequest $request)
  {
    $this->forwardUnless($query = $request->getParameter('query'), 'association', 'index');
 
    $this->associations = Doctrine_Core::getTable('Association') ->getForLuceneQuery($query);
  }
	
  public function executeIndex(sfWebRequest $request)
  {
    $query = Doctrine_Core::getTable('Association')
      ->createQuery('a')
      ->where('a.approved = 1');
      
	$this->pager = new sfDoctrinePager(
	'Association',
	sfConfig::get('app_max_associations')
	);
	$this->pager->setQuery( $query );
	$this->pager->setPage($request->getParameter('pagina', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->association = $this->getRoute()->getObject();
    $this->forward404Unless($this->association);
    
    $this->getResponse()->setTitle(sprintf('Voluntariado %s - GuateVoluntaria.org', $this->association->getName()));
    
    $this->getResponse()->addHttpMeta('cache-control', 'public');
	$this->getResponse()->addMeta('description', 'Informacion de la asociacion '.$this->association->getName().', contamos con informacion sobre el voluntariado, actividades actuales, necesitamos tu ayuda para construir una mejor Guatemala.');
	$this->getResponse()->addMeta('keywords', $this->association->getName().', voluntarios, voluntariado, trabajo voluntario, voluntarios en guatemala, voluntariado en guatemala, guatemala que hago por ti, que hago por ti, guatemala' );
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AssociationForm();
    
    $this->getResponse()->addHttpMeta('cache-control', 'public');
    $this->getResponse()->setTitle(sprintf('Nuevo Voluntariado - GuateVoluntaria.org'));
	$this->getResponse()->addMeta('description', 'Directorio de voluntariado en Guatemala, contamos con listado de asociaciones y sus actividades futuras, necesitamos tu ayuda para construir una mejor Guatemala.');
	$this->getResponse()->addMeta('keywords', 'voluntarios, voluntariado, trabajo voluntario, voluntarios en guatemala, voluntariado en guatemala, guatemala que hago por ti, que hago por ti guatemala' );
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AssociationForm();

    $this->processForm($request, $this->form);

	$this->getUser()->setFlash('error', sprintf('Ocurrio un error, porfavor revise el formulario.' ));
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
      $association = $form->save();

	  $this->getUser()->setFlash('notice', sprintf('Voluntariado guardado exitosamente, tomara aproximadamente 1 hora para que se replique en el sitio.' ));
      $this->redirect('association_user', $association);
    }
  }

  public function executeEdit(sfWebRequest $request)
  {
	$association = Doctrine_Core::getTable('Association')
						->createQuery()
						->where( 'id = '.$request->getParameter('id').' AND user_id = '.$this->getUser()->getGuardUser()->getId() )
						->execute()
						->getFirst();
    $this->forward404Unless($association , sprintf('Object association does not exist (%s).', $request->getParameter('id')));
    $this->form = new AssociationEditForm($association);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$association = Doctrine_Core::getTable('Association')
						->createQuery()
						->where( 'id = '.$request->getParameter('id').' AND user_id = '.$this->getUser()->getGuardUser()->getId() )
						->execute()
						->getFirst();
	
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($association, sprintf('Object association does not exist (%s).', $request->getParameter('id')));
    $this->form = new AssociationEditForm($association);

    $this->processForm($request, $this->form, $association);

	$this->getUser()->setFlash('error', sprintf('Ocurrio un error, porfavor revise el formulario.' ));
    $this->setTemplate('edit');
  }
}
