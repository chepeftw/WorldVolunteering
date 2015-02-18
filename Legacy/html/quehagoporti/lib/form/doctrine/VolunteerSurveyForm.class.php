<?php

/**
 * VolunteerSurvey form.
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VolunteerSurveyForm extends BaseVolunteerSurveyForm
{
	
	public static $options1 = array( 'K’iche’' => 'K’iche’',
												'Q’eqchi’' => 'Q’eqchi’', 
												'Kaqchikel' => 'Kaqchikel', 
												'Mam' => 'Mam', 
												'Xinca' => 'Xinca', 
												'Garífuna' => 'Garífuna', 
												'Ladino/Mestizo/No indígena' => 'Ladino/Mestizo/No indígena', 'Otro' => 'Otro' );
												
	public static $options2 = array( 'Ninguno' => 'Ninguno',
												'Primaria' => 'Primaria', 
												'Ciclo Básico' => 'Ciclo Básico', 
												'Ciclo Diversificado' => 'Ciclo Diversificado', 
												'Técnico/diplomado (o equivalente a 1-3 años de universidad)' => 'Técnico/diplomado (o equivalente a 1-3 años de universidad)', 
												'Licenciatura' => 'Licenciatura', 
												'Maestría' => 'Maestría', 
												'Doctorado' => 'Doctorado' );
												
	public static $options3 = array( 'Estudia' => 'Estudia',
												'Trabaja' => 'Trabaja', 
												'Estudia y trabaja' => 'Estudia y Trabaja', 
												'No estudia ni trabaja' => 'No estudia ni trabaja' );
												
	public static $options4 = array( 'Católica' => 'Católica',
												'Evangélica' => 'Evangélica', 
												'Mormona' => 'Mormona', 
												'Judía' => 'Judía', 
												'Musulmana' => 'Musulmana', 
												'Testigo de Jehová' => 'Testigo de Jehová', 
												'Otra' => 'Otra', 
												'Ninguna' => 'Ninguna' );
												
	public static $options5 = array( 'Soltero(a)' => 'Soltero(a)',
												'Casado(a)' => 'Casado(a)', 
												'Unido(a)' => 'Unido(a)', 
												'Otro' => 'Otro' );
												
	public static $options6 = array( 'Masculino' => 'Masculino',
												'Femenino' => 'Femenino' );
	
	public static $options7 = array( 'Guatemalteco/a' => 'Guatemalteco/a',
												'Otro' => 'Otro' );
	
  public function configure()
  {
	    $this->widgetSchema['is_active']	= new sfWidgetFormInputHidden();
	  
	    $this->widgetSchema['sex']	= new sfWidgetFormSelect(array('choices' => self::$options6) );
	    $this->widgetSchema['status']	= new sfWidgetFormSelect(array('choices' => self::$options5) );
	    $this->widgetSchema['ethnic']	= new sfWidgetFormSelect(array('choices' => self::$options1) );
	    $this->widgetSchema['schooling']	= new sfWidgetFormSelect(array('choices' => self::$options2) );
	    $this->widgetSchema['occupation']	= new sfWidgetFormSelect(array('choices' => self::$options3) );
	    $this->widgetSchema['religion']	= new sfWidgetFormSelect(array('choices' => self::$options4) );
	    $this->widgetSchema['nationality']	= new sfWidgetFormSelect(array('choices' => self::$options7) );
	  
		$this->widgetSchema['captcha'] = new sfWidgetFormReCaptcha(array(
		  'public_key' => sfConfig::get('app_recaptcha_public_key')
		));
		 
		$this->validatorSchema['captcha'] = new sfValidatorReCaptcha(array(
		  'private_key' => sfConfig::get('app_recaptcha_private_key')
		));
	  
	    $this->widgetSchema->setLabel('name', 'Nombre');
	    $this->widgetSchema->setLabel('email', 'Correo Electronico');
	    $this->widgetSchema->setLabel('age', 'Edad');
		$this->widgetSchema->setLabel('sex', 'Sexo');
		$this->widgetSchema->setLabel('status', 'Estado Civil');
		$this->widgetSchema->setLabel('status_other', 'Otro');
		$this->widgetSchema->setLabel('kids', 'Número de hijos e hijas');
		$this->widgetSchema->setLabel('ethnic', 'Grupo étnico');
		$this->widgetSchema->setLabel('ethnic_other', 'Otro');
		$this->widgetSchema->setLabel('schooling', 'Último nivel de escolaridad cursado');
		$this->widgetSchema->setLabel('schooling_discipline', 'Disciplina o Carrera');
		$this->widgetSchema->setLabel('occupation', 'Ocupación');
		$this->widgetSchema->setLabel('religion', 'Religión');
		$this->widgetSchema->setLabel('religion_other', 'Otra');
		$this->widgetSchema->setLabel('voluteering_time', 'Años de realizar trabajo voluntario');
		$this->widgetSchema->setLabel('nationality', 'Nacionalidad');
		$this->widgetSchema->setLabel('nationality_other', 'Otro');
		
		$this->validatorSchema['name']->setMessage('required', 'Campo requerido.');
		$this->validatorSchema['email']->setMessage('required', 'Campo requerido.');
		$this->validatorSchema['age']->setMessage('required', 'Campo requerido.');
		$this->validatorSchema['kids']->setMessage('required', 'Campo requerido.');
		$this->validatorSchema['voluteering_time']->setMessage('required', 'Campo requerido.');
		$this->validatorSchema['captcha']->setMessage('captcha', 'Solucion no valida.');
		
		$this->validatorSchema->setPostValidator(
		  new sfValidatorDoctrineUnique(array('model' => 'VolunteerSurvey', 'column' => array('email')), array( 'invalid' => 'Ya existe un registro con este email.' ))
		);
	  
	  	// Following code will remove Required validators from these fields.
		unset($this->validatorSchema['created_at']);
		unset($this->validatorSchema['updated_at']);
		unset($this->validatorSchema['deleted_at']);
		unset($this->validatorSchema['association_surveys_list']);

		// Following code will remove fields from form.
		unset($this->widgetSchema['created_at']);
		unset($this->widgetSchema['updated_at']);
		unset($this->widgetSchema['deleted_at']);
		unset($this->widgetSchema['association_surveys_list']);
  }
}
