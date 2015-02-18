<?php

/**
 * Category form base class.
 *
 * @method Category getObject() Returns the current form's model object
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                 => new sfWidgetFormInputHidden(),
      'name'                               => new sfWidgetFormInputText(),
      'created_at'                         => new sfWidgetFormDateTime(),
      'updated_at'                         => new sfWidgetFormDateTime(),
      'root_id'                            => new sfWidgetFormInputText(),
      'lft'                                => new sfWidgetFormInputText(),
      'rgt'                                => new sfWidgetFormInputText(),
      'level'                              => new sfWidgetFormInputText(),
      'association_survey_categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AssociationSurvey')),
      'association_categories_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Association')),
    ));

    $this->setValidators(array(
      'id'                                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                               => new sfValidatorString(array('max_length' => 255)),
      'created_at'                         => new sfValidatorDateTime(),
      'updated_at'                         => new sfValidatorDateTime(),
      'root_id'                            => new sfValidatorInteger(array('required' => false)),
      'lft'                                => new sfValidatorInteger(array('required' => false)),
      'rgt'                                => new sfValidatorInteger(array('required' => false)),
      'level'                              => new sfValidatorInteger(array('required' => false)),
      'association_survey_categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AssociationSurvey', 'required' => false)),
      'association_categories_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Association', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['association_survey_categories_list']))
    {
      $this->setDefault('association_survey_categories_list', $this->object->AssociationSurveyCategories->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['association_categories_list']))
    {
      $this->setDefault('association_categories_list', $this->object->AssociationCategories->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAssociationSurveyCategoriesList($con);
    $this->saveAssociationCategoriesList($con);

    parent::doSave($con);
  }

  public function saveAssociationSurveyCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['association_survey_categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AssociationSurveyCategories->getPrimaryKeys();
    $values = $this->getValue('association_survey_categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AssociationSurveyCategories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AssociationSurveyCategories', array_values($link));
    }
  }

  public function saveAssociationCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['association_categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AssociationCategories->getPrimaryKeys();
    $values = $this->getValue('association_categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AssociationCategories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AssociationCategories', array_values($link));
    }
  }

}
