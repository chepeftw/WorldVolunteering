<?php

/**
 * ActivitySurvey form base class.
 *
 * @method ActivitySurvey getObject() Returns the current form's model object
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseActivitySurveyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'volunteer_survey_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VolunteerSurvey'), 'add_empty' => false)),
      'association_survey_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AssociationSurvey'), 'add_empty' => false)),
      'field1'                => new sfWidgetFormInputText(),
      'field2'                => new sfWidgetFormInputText(),
      'field3'                => new sfWidgetFormInputText(),
      'field4'                => new sfWidgetFormInputText(),
      'field5'                => new sfWidgetFormInputText(),
      'field6'                => new sfWidgetFormInputText(),
      'field7'                => new sfWidgetFormInputText(),
      'field8'                => new sfWidgetFormInputText(),
      'field9'                => new sfWidgetFormInputText(),
      'field10'               => new sfWidgetFormInputText(),
      'field11'               => new sfWidgetFormInputText(),
      'field12'               => new sfWidgetFormInputText(),
      'field13'               => new sfWidgetFormInputText(),
      'field14'               => new sfWidgetFormInputText(),
      'field15'               => new sfWidgetFormInputText(),
      'field16'               => new sfWidgetFormInputText(),
      'field17'               => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'volunteer_survey_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VolunteerSurvey'))),
      'association_survey_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AssociationSurvey'))),
      'field1'                => new sfValidatorInteger(array('required' => false)),
      'field2'                => new sfValidatorInteger(array('required' => false)),
      'field3'                => new sfValidatorInteger(array('required' => false)),
      'field4'                => new sfValidatorInteger(array('required' => false)),
      'field5'                => new sfValidatorInteger(array('required' => false)),
      'field6'                => new sfValidatorInteger(array('required' => false)),
      'field7'                => new sfValidatorInteger(array('required' => false)),
      'field8'                => new sfValidatorInteger(array('required' => false)),
      'field9'                => new sfValidatorInteger(array('required' => false)),
      'field10'               => new sfValidatorInteger(array('required' => false)),
      'field11'               => new sfValidatorInteger(array('required' => false)),
      'field12'               => new sfValidatorInteger(array('required' => false)),
      'field13'               => new sfValidatorInteger(array('required' => false)),
      'field14'               => new sfValidatorInteger(array('required' => false)),
      'field15'               => new sfValidatorInteger(array('required' => false)),
      'field16'               => new sfValidatorInteger(array('required' => false)),
      'field17'               => new sfValidatorPass(),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('activity_survey[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivitySurvey';
  }

}
