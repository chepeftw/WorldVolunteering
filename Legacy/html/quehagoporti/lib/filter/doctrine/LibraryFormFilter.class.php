<?php

/**
 * Library filter form.
 *
 * @package    quehagoporti
 * @subpackage filter
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LibraryFormFilter extends BaseLibraryFormFilter
{
  public function configure()
  {
	  $this->widgetSchema['type'] = new sfWidgetFormSelect(array('choices' => LibraryForm::$options1));
	  
	  unset($this->widgetSchema['description']);
	  unset($this->widgetSchema['media']);
  }
}
