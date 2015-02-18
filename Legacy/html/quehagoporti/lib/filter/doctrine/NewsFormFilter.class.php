<?php

/**
 * News filter form.
 *
 * @package    quehagoporti
 * @subpackage filter
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsFormFilter extends BaseNewsFormFilter
{
  public function configure()
  {
	  
	  unset($this->widgetSchema['description']);
	  unset($this->widgetSchema['picture']);
	  
  }
}
