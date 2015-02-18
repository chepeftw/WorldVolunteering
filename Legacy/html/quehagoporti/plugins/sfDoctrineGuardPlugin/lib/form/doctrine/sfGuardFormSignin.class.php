<?php

/**
 * sfGuardFormSignin for sfGuardAuth signin action
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardFormSignin.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardFormSignin extends BasesfGuardFormSignin
{
  /**
   * @see sfForm
   */
  public function configure()
  {
	  $this->widgetSchema->setLabel('username', 'Correo Electronico/Usuario');
	  $this->widgetSchema->setLabel('password', 'Contraseña');
	  $this->widgetSchema->setLabel('remember', 'Recordar');
	  
	  $this->validatorSchema['username']->setMessage('required', 'Correo Electronico requerido.');
	  $this->validatorSchema['password']->setMessage('required', 'Contraseña requerida.');
  }
}
