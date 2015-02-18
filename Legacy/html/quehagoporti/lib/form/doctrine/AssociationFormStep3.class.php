<?php

/**
 * Association form.
 *
 * @package    quepuedohacerporti
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssociationFormStep3 extends BaseAssociationForm
{
  public static $options1 = array( '0' => '' );
	
  public function configure()
  {
	    $this->widgetSchema['is_active']	= new sfWidgetFormInputHidden();
	    $this->widgetSchema['approved']		= new sfWidgetFormInputHidden();
	    
	    $this->widgetSchema['requirements']		= new sfWidgetFormTextarea();
	    $this->widgetSchema['commitment']		= new sfWidgetFormTextarea();
	    $this->widgetSchema['method']			= new sfWidgetFormTextarea();
	    $this->widgetSchema['utilization']			= new sfWidgetFormTextarea();
	    
	    $this->widgetSchema['user_id']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['name']				= new sfWidgetFormInputHidden();
	    $this->widgetSchema['email']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['phone1']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['phone2']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['address']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['website']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['logo']				= new sfWidgetFormInputHidden();
	    $this->widgetSchema['country_id']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['department_id']	= new sfWidgetFormInputHidden();
	    $this->widgetSchema['town']				= new sfWidgetFormInputHidden();
	    $this->widgetSchema['founded']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['facebook_page']	= new sfWidgetFormInputHidden();
	    $this->widgetSchema['facebook_group']	= new sfWidgetFormInputHidden();
	    $this->widgetSchema['twitter_user']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['user_id']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['about_us']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['what_we_do']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['history']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['mision']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['vision']			= new sfWidgetFormInputHidden();
	    
	    $this->widgetSchema->setLabel('requirements', 'Requerimientos del Voluntario?');
	    $this->widgetSchema->setLabel('commitment', 'Compromiso del Voluntario?');
	    $this->widgetSchema->setLabel('donations', 'Acepta donaciones?');
	    $this->widgetSchema->setLabel('method', 'Metodologia para donaciones');
	    $this->widgetSchema->setLabel('utilization', 'Uso de las donaciones');

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
