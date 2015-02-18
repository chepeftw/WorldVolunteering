<?php

/**
 * video actions.
 *
 * @package    quepuedohacerporti
 * @subpackage video
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class videoActions extends sfActions
{
  public function executeNew(sfWebRequest $request)
  {
	$this->association = $this->getRoute()->getObject();
    $this->forward404Unless($this->association);
	  
    $this->form = new VideoForm();
    
    $this->videos = Doctrine_Core::getTable('Video')
      ->createQuery('a')
      ->where('association_id = '.$this->association->getId())
      ->execute();
      
    $this->getResponse()->setTitle(sprintf('Videos de %s', $this->association->getName()));
    
    $this->getResponse()->addHttpMeta('cache-control', 'public');
	$this->getResponse()->addMeta('description', 'Videos de la asociacion '.$this->association->getName().', contamos con informacion sobre el voluntariado, actividades actuales, necesitamos tu ayuda para construir una mejor Guatemala.');
	$this->getResponse()->addMeta('keywords', $this->association->getName().', voluntarios, voluntariado, trabajo voluntario, voluntarios en guatemala, voluntariado en guatemala, guatemala que hago por ti, que hago por ti, guatemala' );
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new VideoForm();

    $this->processForm($request, $this->form);

	$video = $request->getParameter('video');
	$this->forward404Unless($this->association = Doctrine_Core::getTable('Association')->find(array($video['association_id'])), sprintf('Object photo does not exist (%s).', $request->getParameter('id')));
	
	$this->videos = null;
    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($video = Doctrine_Core::getTable('Video')->find(array($request->getParameter('id'))), sprintf('Object video does not exist (%s).', $request->getParameter('id')));
    $video->delete();

    $this->forward404Unless($association = Doctrine_Core::getTable('Association')->find($video->getAssociationId()), sprintf('Object association does not exist (%s).', $request->getParameter('id')));
    $this->redirect('association_video', $association);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $video = $form->save();

      $this->forward404Unless($association = Doctrine_Core::getTable('Association')->find($video->getAssociationId()), sprintf('Object association does not exist (%s).', $request->getParameter('id')));
      $this->redirect('association_video', $association);
    }
  }
}
