<?php

/**
 * home actions.
 *
 * @package    quepuedohacerporti
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
  }
  
  public function executeShownews(sfWebRequest $request)
  {
    $this->news = $this->getRoute()->getObject();
    $this->forward404Unless($this->news);
    
    $this->getResponse()->setTitle(sprintf('%s', $this->news->getTitle()));
    
    $this->getResponse()->addHttpMeta('cache-control', 'public');
	$this->getResponse()->addMeta('description', 'Informacion de la asociacion, contamos con informacion sobre el voluntariado, actividades actuales, necesitamos tu ayuda para construir una mejor Guatemala.');
	$this->getResponse()->addMeta('keywords', 'voluntarios, voluntariado, trabajo voluntario, voluntarios en guatemala, voluntariado en guatemala, guatemala que hago por ti, que hago por ti guatemala' );
  }

}
