<?php

/**
 * TellUs form.
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TellUsForm extends BaseTellUsForm
{
  public function configure()
  {
	    $this->widgetSchema['comment']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	  
		$this->widgetSchema->setLabel('name', 'Nombre');
		$this->widgetSchema->setLabel('last_name', 'Apellido');
		$this->widgetSchema->setLabel('email', 'Correo Electronico');
		$this->widgetSchema->setLabel('mobile', 'Telefono');
		$this->widgetSchema->setLabel('comment', 'Comentario');
		
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
