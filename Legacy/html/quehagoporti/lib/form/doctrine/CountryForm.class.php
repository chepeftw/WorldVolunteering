<?php

/**
 * Country form.
 *
 * @package    quepuedohacerporti
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CountryForm extends BaseCountryForm
{
  public function configure()
  {
	  
		// Following code will remove Required validators from these fields.
		unset($this->validatorSchema['created_at']);
		unset($this->validatorSchema['updated_at']);

		// Following code will remove fields from form.
		unset($this->widgetSchema['created_at']);
		unset($this->widgetSchema['updated_at']);
	  
  }
}
