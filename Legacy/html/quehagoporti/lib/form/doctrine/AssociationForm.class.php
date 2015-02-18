<?php

/**
 * Association form.
 *
 * @package    quepuedohacerporti
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssociationForm extends BaseAssociationForm
{
	
	public static $options1 = array( '1' => 'Si', '0' => 'No' );
	public static $options2 = array( '' => '', 'Fundación' => 'Fundación',
												'Asociación sin fines de lucro' => 'Asociación sin fines de lucro', 
												'Sociedad' => 'Sociedad', 'Otro' => 'Otro' );
	public static $options3 = array( '' => '', 'Escrito' => 'Escrito', 
												'Verbal' => 'Verbal', 'Otro' => 'Otro' );
	public static $options4 = array( '' => '', 'Siempre' => 'Siempre', 
												'Casi Siempre' => 'Casi Siempre', 
												'Algunas veces' => 'Algunas veces', 'Nunca' => 'Nunca' );
	public static $options5 = array( '' => '', 'Sobre la Organización (visión, misión, etc.)' => 'Sobre la Organización (visión, misión, etc.)', 
												'Capacitación técnica para la labor que realizan' => 'Capacitación técnica para la labor que realizan',
												'Formación conceptual sobre el voluntariado' => 'Formación conceptual sobre el voluntariado',
												'Desarrollo personal (crecimiento)' => 'Desarrollo personal (crecimiento)',
												'Sensibilización en temas sociales' => 'Sensibilización en temas sociales',
												'Otros' => 'Otros' );
	public static $options6 = array( '' => '', 'Subsidio mensual' => 'Subsidio mensual', 
												'Viáticos' => 'Viáticos',
												'Comida' => 'Comida',
												'Transporte y hospedaje' => 'Transporte y hospedaje',
												'Otros' => 'Otros' );
	public static $options7 = array( '' => '', 'Anual' => 'Anual', 
												'Mensual' => 'Mensual',
												'Semanal' => 'Semanal',
												'Alguna vez' => 'Alguna vez',
												'Nunca' => 'Nunca' );
	
  public function configure()
  {
	    $this->widgetSchema['is_active']	= new sfWidgetFormInputHidden();
	    $this->widgetSchema['approved']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['address']		= new sfWidgetFormTextarea( array(), array('cols' => 50) );
	    $this->widgetSchema['country_id']		= new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => false));
	    $this->widgetSchema['department_id']	= new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => false));
	    //$this->widgetSchema['departments']		= new sfWidgetFormDoctrineChoice(array('multiple' => true, 'expanded' => true,  'model' => 'Department'));
	    $this->widgetSchema['logo'] 			= new sfWidgetFormInputFile();
	    $year_s = date('Y') - 100;
		$year_e = date('Y') - 0;
		$years = range( $year_s, $year_e );
		$this->widgetSchema['founded'] = new sfWidgetFormDate( array( 'years' => array_combine( $years, $years ) ) );
		$this->widgetSchema['about_us']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    $this->widgetSchema['what_we_do']	= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    $this->widgetSchema['history']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    $this->widgetSchema['mision']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    $this->widgetSchema['vision']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    //$this->widgetSchema['legal_person']	= new sfWidgetFormSelect(array('choices' => self::$options1) );
	    //$this->widgetSchema['legal_person_type']	= new sfWidgetFormSelect(array('choices' => self::$options2) );
	    //$this->widgetSchema['sat_registry']	= new sfWidgetFormSelect(array('choices' => self::$options1) );
	    //$this->widgetSchema['categories_list']	= new sfWidgetFormDoctrineChoice(array('multiple' => true, 'expanded' => true,  'model' => 'Category', 'query' => Doctrine::getTable('Category')->createQuery()->orderBy('created_at ASC')));
	    $this->widgetSchema['requirements']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    //$this->widgetSchema['commitment']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    //$this->widgetSchema['mechanism_commitment']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    //$this->widgetSchema['commitment_type']	= new sfWidgetFormSelect(array('choices' => self::$options3) );
	    $this->widgetSchema['method']			= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    $this->widgetSchema['utilization']			= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    //$this->widgetSchema['compensation']	= new sfWidgetFormSelect(array('choices' => self::$options4) );
	    //$this->widgetSchema['compensation_type']	= new sfWidgetFormSelect(array('choices' => self::$options6) );
	    //$this->widgetSchema['training']	= new sfWidgetFormSelect(array('choices' => self::$options7) );
	    //$this->widgetSchema['training_type']	= new sfWidgetFormSelect(array('choices' => self::$options5) );
	    $this->widgetSchema['donations']	= new sfWidgetFormSelect(array('choices' => self::$options1) );
	  
	  
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
										  'max_size'   => 51200000,
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
		
		$this->validatorSchema['captcha']->setMessage('captcha', 'Solucion no valida.');
		
		$this->validatorSchema['website']	= new sfValidatorUrl( array('required' => false) );
		$this->validatorSchema['website']	= new myValidatorUrl( array('required' => false) );
		//$this->validatorSchema['departments']	= new ArrayToStringValidator( array('required' => false) );
	  
	  
		$this->widgetSchema->setLabel('name', 'Nombre de la organización');
		$this->widgetSchema->setLabel('address', 'Dirección');
		//$this->widgetSchema->setLabel('departments', 'Ámbito geográfico de acción');
	  
		$this->widgetSchema->setLabel('email', 'Correo Electronico');
		$this->widgetSchema->setLabel('phone1', 'Telefono');
		$this->widgetSchema->setLabel('phone2', 'Telefono2');
		$this->widgetSchema->setLabel('website', 'Pagina Web');
		$this->widgetSchema->setLabel('country_id', 'Pais');
		$this->widgetSchema->setLabel('department_id', 'Departamento/Estado/Region');
		$this->widgetSchema->setLabel('town', 'Municipio');
		$this->widgetSchema->setLabel('founded', 'Fecha de Fundacion');
		$this->widgetSchema->setLabel('facebook_page', 'Pagina de Facebook');
		$this->widgetSchema->setLabel('twitter_user', 'Twitter');
		$this->widgetSchema->setLabel('partner1_name', 'Nombre del Representante 1');
		$this->widgetSchema->setLabel('partner1_email', 'Email del Representante 1');
		$this->widgetSchema->setLabel('partner1_mobile', 'Celular del Representante 1');
		$this->widgetSchema->setLabel('partner2_name', 'Nombre del Representante 2');
		$this->widgetSchema->setLabel('partner2_email', 'Email del Representante 2');
		$this->widgetSchema->setLabel('partner2_mobile', 'Celular del Representante 2');
		
		$this->widgetSchema->setLabel('about_us', 'Quienes somos');
	    $this->widgetSchema->setLabel('what_we_do', 'Que hacemos');
	    $this->widgetSchema->setLabel('history', 'Reseña Histórica');
	    $this->widgetSchema->setLabel('mision', 'Mision');
	    $this->widgetSchema->setLabel('vision', 'Vision');
	    
	    //$this->widgetSchema->setLabel('legal_person', 'Personería Jurídica');
	    //$this->widgetSchema->setLabel('legal_person_type', 'Tipo de entidad juridica');
	    //$this->widgetSchema->setLabel('legal_person_type_other', 'Otro');
	    
	    //$this->widgetSchema->setLabel('sat_registry', 'Registro en la Superintendencia de Administración Tributaria');
	    
	    //$this->widgetSchema->setLabel('categories_list', 'Ámbitos de acción');
	    
	    $this->widgetSchema->setLabel('requirements', 'Perfil Requerido del Voluntario');
	    //$this->widgetSchema->setLabel('commitment_type', 'Tipo de Compromiso');
	    //$this->widgetSchema->setLabel('commitment_type_other', 'Otros');
	    //$this->widgetSchema->setLabel('commitment', 'Compromiso del Voluntario');
	    //$this->widgetSchema->setLabel('mechanism_commitment', 'Mecanismo de verificacion');
	    $this->widgetSchema->setLabel('donations', 'Acepta donaciones?');
	    $this->widgetSchema->setLabel('method', 'Procedimiento para donaciones');
	    $this->widgetSchema->setLabel('utilization', 'Uso de las donaciones');
	    
	    //$this->widgetSchema->setLabel('quantity_perm_men', 'Voluntarios Permanentes Hombres');
	    //$this->widgetSchema->setLabel('quantity_perm_women', 'Voluntarios Permanentes Mujeres');
	    //$this->widgetSchema->setLabel('quantity_temp_men', 'Voluntarios Temporales Hombres');
	    //$this->widgetSchema->setLabel('quantity_temp_women', 'Voluntarios Temporales Mujeres');
	    
	    //$this->widgetSchema->setLabel('compensation', 'Compensación');
	    //$this->widgetSchema->setLabel('compensation_type_other', 'Otros');
	    //$this->widgetSchema->setLabel('compensation_type', 'Tipo de Compensación');
	    
	    //$this->widgetSchema->setLabel('training', 'Capacitación por Frecuencia');
	    //$this->widgetSchema->setLabel('training_type_other', 'Otros');
	    //$this->widgetSchema->setLabel('training_type', 'Tipo de Capacitación');
		
		
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
