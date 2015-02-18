<?php

/**
 * VolunteerSurvey filter form base class.
 *
 * @package    quehagoporti
 * @subpackage filter
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVolunteerSurveyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'age'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sex'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status_other'         => new sfWidgetFormFilterInput(),
      'kids'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ethnic'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ethnic_other'         => new sfWidgetFormFilterInput(),
      'schooling'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'schooling_discipline' => new sfWidgetFormFilterInput(),
      'occupation'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nationality'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nationality_other'    => new sfWidgetFormFilterInput(),
      'religion'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'religion_other'       => new sfWidgetFormFilterInput(),
      'voluteering_time'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ip_address'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_active'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deleted_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'name'                 => new sfValidatorPass(array('required' => false)),
      'email'                => new sfValidatorPass(array('required' => false)),
      'age'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sex'                  => new sfValidatorPass(array('required' => false)),
      'status'               => new sfValidatorPass(array('required' => false)),
      'status_other'         => new sfValidatorPass(array('required' => false)),
      'kids'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ethnic'               => new sfValidatorPass(array('required' => false)),
      'ethnic_other'         => new sfValidatorPass(array('required' => false)),
      'schooling'            => new sfValidatorPass(array('required' => false)),
      'schooling_discipline' => new sfValidatorPass(array('required' => false)),
      'occupation'           => new sfValidatorPass(array('required' => false)),
      'nationality'          => new sfValidatorPass(array('required' => false)),
      'nationality_other'    => new sfValidatorPass(array('required' => false)),
      'religion'             => new sfValidatorPass(array('required' => false)),
      'religion_other'       => new sfValidatorPass(array('required' => false)),
      'voluteering_time'     => new sfValidatorPass(array('required' => false)),
      'ip_address'           => new sfValidatorPass(array('required' => false)),
      'is_active'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('volunteer_survey_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VolunteerSurvey';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'name'                 => 'Text',
      'email'                => 'Text',
      'age'                  => 'Number',
      'sex'                  => 'Text',
      'status'               => 'Text',
      'status_other'         => 'Text',
      'kids'                 => 'Number',
      'ethnic'               => 'Text',
      'ethnic_other'         => 'Text',
      'schooling'            => 'Text',
      'schooling_discipline' => 'Text',
      'occupation'           => 'Text',
      'nationality'          => 'Text',
      'nationality_other'    => 'Text',
      'religion'             => 'Text',
      'religion_other'       => 'Text',
      'voluteering_time'     => 'Text',
      'ip_address'           => 'Text',
      'is_active'            => 'Boolean',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'deleted_at'           => 'Date',
    );
  }
}
