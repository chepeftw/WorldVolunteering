<?php

/**
 * ActivitySurvey filter form base class.
 *
 * @package    quehagoporti
 * @subpackage filter
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseActivitySurveyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'volunteer_survey_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VolunteerSurvey'), 'add_empty' => true)),
      'association_survey_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AssociationSurvey'), 'add_empty' => true)),
      'field1'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field2'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field3'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field4'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field5'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field6'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field7'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field8'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field9'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field10'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field11'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field12'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field13'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field14'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field15'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field16'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field17'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'volunteer_survey_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VolunteerSurvey'), 'column' => 'id')),
      'association_survey_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AssociationSurvey'), 'column' => 'id')),
      'field1'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field2'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field3'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field4'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field5'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field6'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field7'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field8'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field9'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field10'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field11'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field12'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field13'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field14'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field15'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field16'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field17'               => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('activity_survey_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivitySurvey';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'volunteer_survey_id'   => 'ForeignKey',
      'association_survey_id' => 'ForeignKey',
      'field1'                => 'Number',
      'field2'                => 'Number',
      'field3'                => 'Number',
      'field4'                => 'Number',
      'field5'                => 'Number',
      'field6'                => 'Number',
      'field7'                => 'Number',
      'field8'                => 'Number',
      'field9'                => 'Number',
      'field10'               => 'Number',
      'field11'               => 'Number',
      'field12'               => 'Number',
      'field13'               => 'Number',
      'field14'               => 'Number',
      'field15'               => 'Number',
      'field16'               => 'Number',
      'field17'               => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}
