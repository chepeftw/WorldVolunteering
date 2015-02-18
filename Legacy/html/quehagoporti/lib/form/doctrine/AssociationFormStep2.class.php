<?php

/**
 * Association form.
 *
 * @package    quepuedohacerporti
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssociationFormStep2 extends BaseAssociationForm
{
  public static $options1 = array( '0' => '' );
	
  public function configure()
  {
	    $this->widgetSchema['is_active']	= new sfWidgetFormInputHidden();
	    $this->widgetSchema['approved']		= new sfWidgetFormInputHidden();
	    
	    $this->widgetSchema['about_us']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    $this->widgetSchema['what_we_do']	= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    $this->widgetSchema['history']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    $this->widgetSchema['mision']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    $this->widgetSchema['vision']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 6) );
	    
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
	    $this->widgetSchema['requirements']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['commitment']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['donations']		= new sfWidgetFormInputHidden();
	    $this->widgetSchema['method']			= new sfWidgetFormInputHidden();
	    $this->widgetSchema['utilization']			= new sfWidgetFormInputHidden();
	    
	    $this->widgetSchema->setLabel('about_us', 'Quienes son?');
	    $this->widgetSchema->setLabel('what_we_do', 'Que hacen?');
	    $this->widgetSchema->setLabel('history', 'Historia');
	    $this->widgetSchema->setLabel('mision', 'Mision');
	    $this->widgetSchema->setLabel('vision', 'Vision');
	    
	    $this->validatorSchema['about_us']		= new sfValidatorString(array('required' => true));
	    $this->validatorSchema['what_we_do']	= new sfValidatorString(array('required' => true));

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
