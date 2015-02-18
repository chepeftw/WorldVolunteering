<?php

/**
 * testimonial actions.
 *
 * @package    quehagoporti
 * @subpackage testimonial
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class testimonialActions extends sfActions
{  
  public function executeShow(sfWebRequest $request)
  {
    $this->testimonial = Doctrine_Core::getTable('Testimonial')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->testimonial);
    
    $this->getResponse()->setTitle(sprintf('Testimonio %s de %s - GuateVoluntaria.org', $this->testimonial->getTitle(), $this->testimonial->getAssociation()->getName()));
    	
	$this->getResponse()->addHttpMeta('cache-control', 'public');
	$association = $this->testimonial->getAssociation();
	$this->getResponse()->addMeta('description', 'Testimonio '.$this->testimonial->getTitle().' de la asociacion '.$association->getName().', contamos con informacion sobre la asociacion, actividades actuales, necesitamos tu ayuda para construir una mejor Guatemala.');
	$this->getResponse()->addMeta('keywords', 'testimonials '.$association->getName().', voluntarios, voluntariado, trabajo voluntario, voluntarios en guatemala, voluntariado en guatemala, guatemala que hago por ti, que hago por ti, guatemala' );
  }
 
  public function executeNew(sfWebRequest $request)
  {
	$this->association = $this->getRoute()->getObject();
	
    $this->form = new TestimonialFrontForm();
    
    $this->getResponse()->setTitle(sprintf('Nuevo Testimonio de %s - GuateVoluntaria.org', $this->association->getName()));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TestimonialFrontForm();

    $this->processForm($request, $this->form);
    
    $testimonial = $request->getParameter('testimonial');
	
	$this->getUser()->setFlash('error', sprintf('Ocurrio un error, porfavor revise el formulario.' ));
	$this->association = Doctrine::getTable('Association')->find( $testimonial['association_id'] );

    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($testimonial = Doctrine_Core::getTable('Testimonial')->find(array($request->getParameter('id'))), sprintf('Object testimonial does not exist (%s).', $request->getParameter('id')));
    
    if( $testimonial->isMine( $this->getUser()->getGuardUser()->getId() ) )
		$testimonial->delete();

    $this->redirect('association_testimonials', $testimonial->getAssociation());
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
      $testimonial = $form->save();
		
	  $this->getUser()->setFlash('notice', sprintf('Testimonio guardado exitosamente, tomara aprox 1 hora para que se replique en el sitio.' ));
      $this->redirect('association_testimonials', $testimonial->getAssociation());
    }
  }
  
  public function executeShowtestimonials(sfWebRequest $request)
  {
    $this->association = $this->getRoute()->getObject();
    $this->forward404Unless($this->association);
      
    $this->form = new TestimonialFrontForm();
      
	$this->pager = new sfDoctrinePager(
	'Testimonial',
	sfConfig::get('app_max_associations')
	);
	$this->pager->setQuery( $this->association->getActualTestimonials() );
	$this->pager->setPage($request->getParameter('pagina', 1));
	$this->pager->init();
	
	$this->getResponse()->setTitle(sprintf('Testimoniales de %s - GuateVoluntaria.org', $this->association->getName()));
	
	$this->getResponse()->addHttpMeta('cache-control', 'public');
	$this->getResponse()->addMeta('description', 'Testimoniales de la asociacion '.$this->association->getName().', contamos con informacion sobre la asociacion, actividades actuales, necesitamos tu ayuda para construir una mejor Guatemala.');
	$this->getResponse()->addMeta('keywords', 'testimonials '.$this->association->getName().', voluntarios, voluntariado, trabajo voluntario, voluntarios en guatemala, voluntariado en guatemala, guatemala que hago por ti, que hago por ti, guatemala' );
  }
}
