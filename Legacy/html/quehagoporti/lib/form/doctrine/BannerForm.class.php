<?php

/**
 * Banner form.
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BannerForm extends BaseBannerForm
{
  public function configure()
  {
  
	    $this->widgetSchema['path']	= new sfWidgetFormInputFile();
	    
	    $this->validatorSchema['path'] = new sfValidatorFile(array(
										  'required'   => true,
										  'max_size'   => 51200000,
										  'path'       => sfConfig::get('app_upload_dir').'/banners/',
										  'mime_types' => 'web_images',
										));
		$this->validatorSchema['path']->setMessage('required', 'Campo requerido.');
		
		// Following code will remove Required validators from these fields.
		unset($this->validatorSchema['created_at']);
		unset($this->validatorSchema['updated_at']);
		unset($this->validatorSchema['deleted_at']);

		// Following code will remove fields from form.
		unset($this->widgetSchema['created_at']);
		unset($this->widgetSchema['updated_at']);
		unset($this->widgetSchema['deleted_at']);
		  
  }
}
