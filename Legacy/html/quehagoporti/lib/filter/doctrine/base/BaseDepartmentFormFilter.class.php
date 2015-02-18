<?php

/**
 * Department filter form base class.
 *
 * @package    quehagoporti
 * @subpackage filter
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDepartmentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country_id'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'created_at'                          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'association_survey_departments_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AssociationSurvey')),
      'association_departments_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Association')),
    ));

    $this->setValidators(array(
      'name'                                => new sfValidatorPass(array('required' => false)),
      'country_id'                          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Country'), 'column' => 'id')),
      'created_at'                          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'association_survey_departments_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AssociationSurvey', 'required' => false)),
      'association_departments_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Association', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('department_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addAssociationSurveyDepartmentsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.AssociationSurveyDepartment AssociationSurveyDepartment')
      ->andWhereIn('AssociationSurveyDepartment.association_survey_id', $values)
    ;
  }

  public function addAssociationDepartmentsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.AssociationDepartment AssociationDepartment')
      ->andWhereIn('AssociationDepartment.association_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Department';
  }

  public function getFields()
  {
    return array(
      'id'                                  => 'Number',
      'name'                                => 'Text',
      'country_id'                          => 'ForeignKey',
      'created_at'                          => 'Date',
      'updated_at'                          => 'Date',
      'association_survey_departments_list' => 'ManyKey',
      'association_departments_list'        => 'ManyKey',
    );
  }
}
