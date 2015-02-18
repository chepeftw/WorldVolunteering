<?php

/**
 * my_association actions.
 *
 * @package    quehagoporti
 * @subpackage my_association
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class my_associationActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->associations = Doctrine_Core::getTable('Association')
							->createQuery('a')
							->where( 'user_id = '.$this->getUser()->getGuardUser()->getId() )
							->execute();
  }
}
