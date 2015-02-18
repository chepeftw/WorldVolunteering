<?php

/**
 * photo actions.
 *
 * @package    quepuedohacerporti
 * @subpackage photo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class photoActions extends sfActions
{
  public function executeShow(sfWebRequest $request)
  {
	$this->photo = $this->getRoute()->getObject();
    $this->forward404Unless($this->photo);
    
    $this->association = Doctrine::getTable('Association')->find( $this->photo->getAssociationId() );
    
    // Next Image
	$photos = Doctrine_Core::getTable('Photo')->createQuery('a')
					  ->where('association_id = '.$this->photo->getAssociationId().' AND order_number = '.( $this->photo->getOrderNumber() + 1 ))
					  ->execute();
	$this->next = null;
				  
	if( count( $photos ) > 0 )
	{
		$this->next = $photos->getFirst();
	}
	else
	{
		$this->next = Doctrine_Core::getTable('Photo')->createQuery('a')
					  ->where('association_id = '.$this->photo->getAssociationId())->orderBy('order_number ASC')
					  ->execute()->getFirst();
	}
    // End Next Image
    
    // Prev Image
	$photos = Doctrine_Core::getTable('Photo')->createQuery('a')
					  ->where('association_id = '.$this->photo->getAssociationId().' AND order_number = '.( $this->photo->getOrderNumber() - 1 ))
					  ->execute();
	$this->prev = null;
				  
	if( count( $photos ) > 0 )
	{
		$this->prev = $photos->getFirst();
	}
	else
	{
		$this->prev = Doctrine_Core::getTable('Photo')->createQuery('a')
					  ->where('association_id = '.$this->photo->getAssociationId())->orderBy('order_number DESC')
					  ->execute()->getFirst();
	}
    // End Prev Image
    
    $this->getResponse()->setTitle(sprintf('Imagen %s de %s - GuateVoluntaria.org', $this->photo->getOrderNumber(), $this->association->getName()));
    
    $this->getResponse()->addHttpMeta('cache-control', 'public');
	$this->getResponse()->addMeta('description', 'Imagen '.$this->photo->getOrderNumber().' de la asociacion '.$this->association->getName().', contamos con informacion sobre el voluntariado, actividades actuales, necesitamos tu ayuda para construir una mejor Guatemala.');
	$this->getResponse()->addMeta('keywords', $this->association->getName().', voluntarios, voluntariado, trabajo voluntario, voluntarios en guatemala, voluntariado en guatemala, guatemala que hago por ti, que hago por ti, guatemala' );
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->association = $this->getRoute()->getObject();
    $this->forward404Unless($this->association);

    $this->form = new PhotoForm();
    
    $this->photos = Doctrine_Core::getTable('Photo')
      ->createQuery('a')
      ->where('association_id = '.$this->association->getId())
      ->execute();
      
    $this->getResponse()->setTitle(sprintf('Galeria de %s - GuateVoluntaria.org', $this->association->getName()));
    
    $this->getResponse()->addHttpMeta('cache-control', 'public');
	$this->getResponse()->addMeta('description', 'Galeria de Imagenes de la asociacion '.$this->association->getName().', contamos con informacion sobre el voluntariado, actividades actuales, necesitamos tu ayuda para construir una mejor Guatemala.');
	$this->getResponse()->addMeta('keywords', $this->association->getName().', voluntarios, voluntariado, trabajo voluntario, voluntarios en guatemala, voluntariado en guatemala, guatemala que hago por ti, que hago por ti, guatemala' );
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PhotoForm();

    $this->processForm($request, $this->form);

	$photo = $request->getParameter('photo');
	$this->forward404Unless($this->association = Doctrine_Core::getTable('Association')->find(array($photo['association_id'])), sprintf('Object photo does not exist (%s).', $request->getParameter('id')));
	
	$this->photos = null;
    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($photo = Doctrine_Core::getTable('Photo')->find(array($request->getParameter('id'))), sprintf('Object photo does not exist (%s).', $request->getParameter('id')));
    $photo->delete();

	$this->forward404Unless($association = Doctrine_Core::getTable('Association')->find($photo->getAssociationId()), sprintf('Object association does not exist (%s).', $request->getParameter('id')));
    $this->redirect('association_gallery', $association);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $photo = $form->save();

      $this->forward404Unless($association = Doctrine_Core::getTable('Association')->find($photo->getAssociationId()), sprintf('Object association does not exist (%s).', $request->getParameter('id')));
	  $this->redirect('association_gallery', $association);
    }
  }
}
