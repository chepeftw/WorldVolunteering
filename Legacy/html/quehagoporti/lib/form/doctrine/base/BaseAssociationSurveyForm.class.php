<?php

/**
 * AssociationSurvey form base class.
 *
 * @method AssociationSurvey getObject() Returns the current form's model object
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAssociationSurveyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'name'                    => new sfWidgetFormInputText(),
      'address'                 => new sfWidgetFormInputText(),
      'country_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => false)),
      'department_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => false)),
      'town'                    => new sfWidgetFormInputText(),
      'departments'             => new sfWidgetFormInputText(),
      'mision'                  => new sfWidgetFormInputText(),
      'vision'                  => new sfWidgetFormInputText(),
      'about_us'                => new sfWidgetFormInputText(),
      'what_we_do'              => new sfWidgetFormInputText(),
      'legal_person'            => new sfWidgetFormInputCheckbox(),
      'legal_person_type'       => new sfWidgetFormInputText(),
      'legal_person_type_other' => new sfWidgetFormInputText(),
      'partner1_name'           => new sfWidgetFormInputText(),
      'partner1_email'          => new sfWidgetFormInputText(),
      'partner1_mobile'         => new sfWidgetFormInputText(),
      'partner2_name'           => new sfWidgetFormInputText(),
      'partner2_email'          => new sfWidgetFormInputText(),
      'partner2_mobile'         => new sfWidgetFormInputText(),
      'sat_registry'            => new sfWidgetFormInputCheckbox(),
      'email'                   => new sfWidgetFormInputText(),
      'phone1'                  => new sfWidgetFormInputText(),
      'phone2'                  => new sfWidgetFormInputText(),
      'website'                 => new sfWidgetFormInputText(),
      'facebook_page'           => new sfWidgetFormInputText(),
      'twitter_user'            => new sfWidgetFormInputText(),
      'logo'                    => new sfWidgetFormInputText(),
      'founded'                 => new sfWidgetFormDate(),
      'history'                 => new sfWidgetFormInputText(),
      'quantity_perm_men'       => new sfWidgetFormInputText(),
      'quantity_perm_women'     => new sfWidgetFormInputText(),
      'quantity_temp_men'       => new sfWidgetFormInputText(),
      'quantity_temp_women'     => new sfWidgetFormInputText(),
      'requirements'            => new sfWidgetFormInputText(),
      'commitment_type'         => new sfWidgetFormInputText(),
      'commitment_type_other'   => new sfWidgetFormInputText(),
      'commitment'              => new sfWidgetFormInputText(),
      'mechanism_commitment'    => new sfWidgetFormInputText(),
      'compensation'            => new sfWidgetFormInputText(),
      'compensation_type'       => new sfWidgetFormInputText(),
      'compensation_type_other' => new sfWidgetFormInputText(),
      'training'                => new sfWidgetFormInputText(),
      'training_type'           => new sfWidgetFormInputText(),
      'training_type_other'     => new sfWidgetFormInputText(),
      'donations'               => new sfWidgetFormInputCheckbox(),
      'method'                  => new sfWidgetFormInputText(),
      'utilization'             => new sfWidgetFormInputText(),
      'ip_address'              => new sfWidgetFormInputText(),
      'random_value'            => new sfWidgetFormInputText(),
      'approved'                => new sfWidgetFormInputCheckbox(),
      'is_active'               => new sfWidgetFormInputCheckbox(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
      'deleted_at'              => new sfWidgetFormDateTime(),
      'categories_list'         => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Category')),
      'departments_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Department')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                    => new sfValidatorString(array('max_length' => 255)),
      'address'                 => new sfValidatorPass(),
      'country_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'))),
      'department_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'))),
      'town'                    => new sfValidatorString(array('max_length' => 255)),
      'departments'             => new sfValidatorPass(),
      'mision'                  => new sfValidatorPass(),
      'vision'                  => new sfValidatorPass(),
      'about_us'                => new sfValidatorPass(),
      'what_we_do'              => new sfValidatorPass(array('required' => false)),
      'legal_person'            => new sfValidatorBoolean(),
      'legal_person_type'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'legal_person_type_other' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'partner1_name'           => new sfValidatorString(array('max_length' => 255)),
      'partner1_email'          => new sfValidatorEmail(array('max_length' => 255)),
      'partner1_mobile'         => new sfValidatorInteger(),
      'partner2_name'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'partner2_email'          => new sfValidatorEmail(array('max_length' => 255, 'required' => false)),
      'partner2_mobile'         => new sfValidatorInteger(array('required' => false)),
      'sat_registry'            => new sfValidatorBoolean(),
      'email'                   => new sfValidatorEmail(array('max_length' => 255)),
      'phone1'                  => new sfValidatorInteger(),
      'phone2'                  => new sfValidatorInteger(array('required' => false)),
      'website'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'facebook_page'           => new sfValidatorPass(array('required' => false)),
      'twitter_user'            => new sfValidatorPass(array('required' => false)),
      'logo'                    => new sfValidatorString(array('max_length' => 255)),
      'founded'                 => new sfValidatorDate(),
      'history'                 => new sfValidatorPass(array('required' => false)),
      'quantity_perm_men'       => new sfValidatorInteger(),
      'quantity_perm_women'     => new sfValidatorInteger(),
      'quantity_temp_men'       => new sfValidatorInteger(),
      'quantity_temp_women'     => new sfValidatorInteger(),
      'requirements'            => new sfValidatorPass(),
      'commitment_type'         => new sfValidatorString(array('max_length' => 255)),
      'commitment_type_other'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'commitment'              => new sfValidatorPass(),
      'mechanism_commitment'    => new sfValidatorPass(),
      'compensation'            => new sfValidatorString(array('max_length' => 255)),
      'compensation_type'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'compensation_type_other' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'training'                => new sfValidatorString(array('max_length' => 255)),
      'training_type'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'training_type_other'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'donations'               => new sfValidatorBoolean(array('required' => false)),
      'method'                  => new sfValidatorPass(array('required' => false)),
      'utilization'             => new sfValidatorPass(array('required' => false)),
      'ip_address'              => new sfValidatorString(array('max_length' => 255)),
      'random_value'            => new sfValidatorPass(array('required' => false)),
      'approved'                => new sfValidatorBoolean(array('required' => false)),
      'is_active'               => new sfValidatorBoolean(array('required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
      'deleted_at'              => new sfValidatorDateTime(array('required' => false)),
      'categories_list'         => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Category', 'required' => false)),
      'departments_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Department', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'AssociationSurvey', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'AssociationSurvey', 'column' => array('email'))),
        new sfValidatorDoctrineUnique(array('model' => 'AssociationSurvey', 'column' => array('website'))),
      ))
    );

    $this->widgetSchema->setNameFormat('association_survey[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AssociationSurvey';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['categories_list']))
    {
      $this->setDefault('categories_list', $this->object->Categories->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['departments_list']))
    {
      $this->setDefault('departments_list', $this->object->Departments->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveCategoriesList($con);
    $this->saveDepartmentsList($con);

    parent::doSave($con);
  }

  public function saveCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Categories->getPrimaryKeys();
    $values = $this->getValue('categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Categories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Categories', array_values($link));
    }
  }

  public function saveDepartmentsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['departments_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Departments->getPrimaryKeys();
    $values = $this->getValue('departments_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Departments', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Departments', array_values($link));
    }
  }

}
