<?php

/**
 * Association form.
 *
 * @package    quepuedohacerporti
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssociationFormStep1 extends BaseAssociationForm
{
  public static $options1 = array( '0' => '' );
	
  public function configure()
  {
	    $this->widgetSchema['is_active']	= new sfWidgetFormInputHidden();
	    $this->widgetSchema['approved']		= new sfWidgetFormInputHidden();
	    
	    $this->widgetSchema['address']		= new sfWidgetFormTextarea( array(), array('cols' => 50) );
	    
	    $this->widgetSchema['about_us']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['what_we_do']	= new sfWidgetFormInputHidden();
	    $this->widgetSchema['history']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['mision']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['vision']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['requirements']	= new sfWidgetFormInputHidden();
	    $this->widgetSchema['commitment']	= new sfWidgetFormInputHidden();
	    $this->widgetSchema['donations']	= new sfWidgetFormInputHidden();
	    $this->widgetSchema['method']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['utilization']		= new sfWidgetFormInputHidden();
	    
	    $this->widgetSchema['country_id']		= new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true), array('onchange'=>'getdepartments()'));
	    $this->widgetSchema['department_id']	= new sfWidgetFormSelect(array('choices' => self::$options1) );
	    $this->widgetSchema['logo'] 			= new sfWidgetFormInputFile();
	    
	    $year_s = date('Y') - 100;
		$year_e = date('Y') - 0;
		$years = range( $year_s, $year_e );
		$this->widgetSchema['founded'] = new sfWidgetFormDate( array( 'years' => array_combine( $years, $years ) ) );
	    
	    $this->widgetSchema->setLabel('name', 'Nombre');
	    $this->widgetSchema->setLabel('email', 'Correo Electronico');
	    $this->widgetSchema->setLabel('phone1', 'Telefono');
	    $this->widgetSchema->setLabel('phone2', 'Telefono2');
	    $this->widgetSchema->setLabel('address', 'Direccion');
	    $this->widgetSchema->setLabel('website', 'Pagina Web');
	    $this->widgetSchema->setLabel('country_id', 'Pais');
	    $this->widgetSchema->setLabel('department_id', 'Departamento/Estado/Region');
	    $this->widgetSchema->setLabel('town', 'Municipio');
	    $this->widgetSchema->setLabel('founded', 'Fecha de Fundacion');
	    $this->widgetSchema->setLabel('facebook_page', 'Pagina de Facebook');
	    $this->widgetSchema->setLabel('facebook_group', 'Grupo de Facebook');
	    $this->widgetSchema->setLabel('twitter_user', 'Twitter');
	    $this->widgetSchema->setLabel('partner1_name', 'Nombre del Representante 1');
	    $this->widgetSchema->setLabel('partner1_email', 'Email del Representante 1');
	    $this->widgetSchema->setLabel('partner2_name', 'Nombre del Representante 2');
	    $this->widgetSchema->setLabel('partner2_email', 'Email del Representante 2');
	    
	    $this->validatorSchema['name']->setMessage('required', 'Nombre es requerido.');
	    $this->validatorSchema['email']->setMessage('required', 'Correo Electronico es requerido.');
	    $this->validatorSchema['phone1']->setMessage('required', 'Telefono es requerido.');
	    $this->validatorSchema['country_id']->setMessage('required', 'Pais es requerido.');
	    $this->validatorSchema['department_id']->setMessage('invalid', 'Departamento/Estado/Region es requerido.');
	    $this->validatorSchema['town']->setMessage('invalid', 'Municipio es requerido.');
	    $this->validatorSchema['partner1_name']->setMessage('required', 'Nombre del Representante 1 es requerido.');
	    $this->validatorSchema['partner1_email']->setMessage('required', 'Email del Representante 1 es requerido.');
	    $this->validatorSchema['partner2_name']->setMessage('required', 'Nombre del Representante 2 es requerido.');
	    $this->validatorSchema['partner2_email']->setMessage('required', 'Email del Representante 2 es requerido.');
	    
	    $this->validatorSchema['logo'] = new sfValidatorFile(array(
										  'required'   => true,
										  'path'       => sfConfig::get('app_upload_dir').'/logos/',
										  'mime_types' => 'web_images',
										));
		$this->validatorSchema['logo']->setMessage('required', 'El Logo es requerido.');

		$this->widgetSchema['captcha'] = new sfWidgetFormReCaptcha(array(
		  'public_key' => sfConfig::get('app_recaptcha_public_key')
		));
		 
		$this->validatorSchema['captcha'] = new sfValidatorReCaptcha(array(
		  'private_key' => sfConfig::get('app_recaptcha_private_key')
		));
		
		$this->validatorSchema->setPostValidator(new OneAssociationPerUserValidator());

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
