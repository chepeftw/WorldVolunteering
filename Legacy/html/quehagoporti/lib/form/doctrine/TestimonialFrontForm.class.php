<?php

/**
 * Testimonial form.
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TestimonialFrontForm extends BaseTestimonialForm
{
  public function configure()
  {
	$this->widgetSchema['is_active']	= new sfWidgetFormInputHidden();
	$this->widgetSchema['association_id']	= new sfWidgetFormInputHidden();
	
	$this->widgetSchema['description']	= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	$this->widgetSchema['picture'] 		= new sfWidgetFormInputFile();
	
	$this->widgetSchema->setLabel('title', 'Titulo');
	$this->widgetSchema->setLabel('description', 'Testimonio');
	$this->widgetSchema->setLabel('picture', 'Imagen');
	
	$this->validatorSchema['picture'] 	= new sfValidatorFile(array(
										  'required'   => true,
										  'max_size'   => 51200000,
										  'path'       => sfConfig::get('app_upload_dir').'/testimonials/',
										  'mime_types' => 'web_images',
										));
	$this->validatorSchema['picture']->setMessage('required', 'La imagen es requerida.');
	
	$this->widgetSchema['captcha'] = new sfWidgetFormReCaptcha(array(
	  'public_key' => sfConfig::get('app_recaptcha_public_key')
	));
	 
	$this->validatorSchema['captcha'] = new sfValidatorReCaptcha(array(
	  'private_key' => sfConfig::get('app_recaptcha_private_key')
	));
	  
	// Following code will remove Required validators from these fields.
	unset($this->validatorSchema['created_at']);
	unset($this->validatorSchema['updated_at']);

	// Following code will remove fields from form.
	unset($this->widgetSchema['created_at']);
	unset($this->widgetSchema['updated_at']);
	  
  }
}
