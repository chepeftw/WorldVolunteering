<?php

/**
 * News form.
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsForm extends BaseNewsForm
{
  public function configure()
  {
	  
	  $this->widgetSchema['description'] = new sfWidgetFormTextarea( array(), array('cols' => 50) );
	  
	  $this->widgetSchema['picture']		= new sfWidgetFormInputFile();
	  $this->validatorSchema['picture'] = new sfValidatorFile(array(
										  'required'   => false,
										  'max_size'   => 51200000,
										  'path'       => sfConfig::get('app_upload_dir').'/news/',
										));
	  
	  // Following code will remove Required validators from these fields.
		unset($this->validatorSchema['created_at']);
		unset($this->validatorSchema['updated_at']);

		// Following code will remove fields from form.
		unset($this->widgetSchema['created_at']);
		unset($this->widgetSchema['updated_at']);
  }
}
