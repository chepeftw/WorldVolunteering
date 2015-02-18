<?php

require_once dirname(__FILE__).'/../lib/associationGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/associationGeneratorHelper.class.php';

/**
 * association actions.
 *
 * @package    quehagoporti
 * @subpackage association
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class associationActions extends autoAssociationActions
{
	
  public function executeExcel(sfWebRequest $request)
  {
	$this->setLayout(false);
  
    $this->association_surveys = Doctrine_Core::getTable('Association')
      ->createQuery('a')
      ->execute();
      
    $this->form = new AssociationForm();

	$reportName = 'Reporte Asociaciones '.date(DATE_RFC822).'.xls';
	$this->getResponse()->setHttpHeader('Content-Disposition', 'inline; filename="'.$reportName.'"');
	$this->getResponse()->setContentType('application/vnd.ms-excel');
  }
	
}
