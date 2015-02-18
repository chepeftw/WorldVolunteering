<?php

/**
 * sfGuardRegisterForm for registering new users
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardRegisterForm extends BasesfGuardRegisterForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
	  $this->widgetSchema->setLabel('first_name', 'Nombres');
	  $this->widgetSchema->setLabel('last_name', 'Apellidos');
	  $this->widgetSchema->setLabel('email_address', 'Correo Electronico*');
	  $this->widgetSchema->setLabel('password', 'Contraseña*');
	  $this->widgetSchema->setLabel('password_again', 'Contraseña otra vez*');
	  
	  $this->validatorSchema['email_address']->setMessage('required', 'Correo Electronico es requerido.');
	  $this->validatorSchema['email_address']->setMessage('invalid', 'Correo Electronico invalido.');
	  $this->validatorSchema['password']->setMessage('required', 'Contraseña es requerida.');
	  $this->validatorSchema['password_again']->setMessage('required', 'Contraseña es requerida.');
	  
		$this->widgetSchema['captcha'] = new sfWidgetFormReCaptcha(array(
		  'public_key' => sfConfig::get('app_recaptcha_public_key')
		));
		
		$this->widgetSchema->setLabel('captcha', 'Captcha*');
		 
		$this->validatorSchema['captcha'] = new sfValidatorReCaptcha(array(
		  'private_key' => sfConfig::get('app_recaptcha_private_key')
		));
	  
	  unset($this->validatorSchema['username']);
	  unset($this->widgetSchema['username']);
  }
}
