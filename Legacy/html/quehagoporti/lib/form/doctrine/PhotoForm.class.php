<?php

/**
 * Photo form.
 *
 * @package    quepuedohacerporti
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoForm extends BasePhotoForm
{
  public function configure()
  {
	  
	    $this->widgetSchema['location'] 			= new sfWidgetFormInputFile();
	    $this->validatorSchema['location'] = new sfValidatorFile(array(
										  'required'   => true,
										  'max_size'   => 51200000,
										  'path'       => sfConfig::get('app_upload_dir').'/photos/',
										  'mime_types' => 'web_images',
										));
		$this->validatorSchema['location']->setMessage('required', 'La imagen es requerida.');
	    $this->widgetSchema->setLabel('location', 'Imagen');
	  
	  // Following code will remove Required validators from these fields.
		unset($this->validatorSchema['created_at']);
		unset($this->validatorSchema['updated_at']);

		// Following code will remove fields from form.
		unset($this->widgetSchema['created_at']);
		unset($this->widgetSchema['updated_at']);
	  
  }
}
