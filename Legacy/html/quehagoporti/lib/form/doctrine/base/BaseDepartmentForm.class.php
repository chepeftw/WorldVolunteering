<?php

/**
 * Department form base class.
 *
 * @method Department getObject() Returns the current form's model object
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDepartmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
      'name'                                => new sfWidgetFormInputText(),
      'country_id'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => false)),
      'created_at'                          => new sfWidgetFormDateTime(),
      'updated_at'                          => new sfWidgetFormDateTime(),
      'association_survey_departments_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AssociationSurvey')),
      'association_departments_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Association')),
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                                => new sfValidatorString(array('max_length' => 255)),
      'country_id'                          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'))),
      'created_at'                          => new sfValidatorDateTime(),
      'updated_at'                          => new sfValidatorDateTime(),
      'association_survey_departments_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AssociationSurvey', 'required' => false)),
      'association_departments_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Association', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('department[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Department';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['association_survey_departments_list']))
    {
      $this->setDefault('association_survey_departments_list', $this->object->AssociationSurveyDepartments->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['association_departments_list']))
    {
      $this->setDefault('association_departments_list', $this->object->AssociationDepartments->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAssociationSurveyDepartmentsList($con);
    $this->saveAssociationDepartmentsList($con);

    parent::doSave($con);
  }

  public function saveAssociationSurveyDepartmentsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['association_survey_departments_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AssociationSurveyDepartments->getPrimaryKeys();
    $values = $this->getValue('association_survey_departments_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AssociationSurveyDepartments', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AssociationSurveyDepartments', array_values($link));
    }
  }

  public function saveAssociationDepartmentsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['association_departments_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AssociationDepartments->getPrimaryKeys();
    $values = $this->getValue('association_departments_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AssociationDepartments', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AssociationDepartments', array_values($link));
    }
  }

}
