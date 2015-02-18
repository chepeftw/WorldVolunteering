<?php

/**
 * VolunteerSurvey form base class.
 *
 * @method VolunteerSurvey getObject() Returns the current form's model object
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVolunteerSurveyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'email'                => new sfWidgetFormInputText(),
      'age'                  => new sfWidgetFormInputText(),
      'sex'                  => new sfWidgetFormInputText(),
      'status'               => new sfWidgetFormInputText(),
      'status_other'         => new sfWidgetFormInputText(),
      'kids'                 => new sfWidgetFormInputText(),
      'ethnic'               => new sfWidgetFormInputText(),
      'ethnic_other'         => new sfWidgetFormInputText(),
      'schooling'            => new sfWidgetFormInputText(),
      'schooling_discipline' => new sfWidgetFormInputText(),
      'occupation'           => new sfWidgetFormInputText(),
      'nationality'          => new sfWidgetFormInputText(),
      'nationality_other'    => new sfWidgetFormInputText(),
      'religion'             => new sfWidgetFormInputText(),
      'religion_other'       => new sfWidgetFormInputText(),
      'voluteering_time'     => new sfWidgetFormInputText(),
      'ip_address'           => new sfWidgetFormInputText(),
      'is_active'            => new sfWidgetFormInputCheckbox(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'deleted_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 255)),
      'email'                => new sfValidatorEmail(array('max_length' => 255)),
      'age'                  => new sfValidatorInteger(),
      'sex'                  => new sfValidatorString(array('max_length' => 255)),
      'status'               => new sfValidatorString(array('max_length' => 255)),
      'status_other'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'kids'                 => new sfValidatorInteger(),
      'ethnic'               => new sfValidatorString(array('max_length' => 255)),
      'ethnic_other'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'schooling'            => new sfValidatorString(array('max_length' => 255)),
      'schooling_discipline' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'occupation'           => new sfValidatorString(array('max_length' => 255)),
      'nationality'          => new sfValidatorString(array('max_length' => 255)),
      'nationality_other'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'religion'             => new sfValidatorString(array('max_length' => 255)),
      'religion_other'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'voluteering_time'     => new sfValidatorString(array('max_length' => 255)),
      'ip_address'           => new sfValidatorString(array('max_length' => 255)),
      'is_active'            => new sfValidatorBoolean(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'deleted_at'           => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'VolunteerSurvey', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('volunteer_survey[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VolunteerSurvey';
  }

}
