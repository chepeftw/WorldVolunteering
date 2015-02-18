<?php

/**
 * Association filter form base class.
 *
 * @package    quehagoporti
 * @subpackage filter
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAssociationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'department_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'town'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'departments'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mision'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vision'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'about_us'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'what_we_do'              => new sfWidgetFormFilterInput(),
      'legal_person'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'legal_person_type'       => new sfWidgetFormFilterInput(),
      'legal_person_type_other' => new sfWidgetFormFilterInput(),
      'partner1_name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'partner1_email'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'partner1_mobile'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'partner2_name'           => new sfWidgetFormFilterInput(),
      'partner2_email'          => new sfWidgetFormFilterInput(),
      'partner2_mobile'         => new sfWidgetFormFilterInput(),
      'sat_registry'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'email'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone1'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone2'                  => new sfWidgetFormFilterInput(),
      'website'                 => new sfWidgetFormFilterInput(),
      'facebook_page'           => new sfWidgetFormFilterInput(),
      'twitter_user'            => new sfWidgetFormFilterInput(),
      'logo'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'founded'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'history'                 => new sfWidgetFormFilterInput(),
      'quantity_perm_men'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'quantity_perm_women'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'quantity_temp_men'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'quantity_temp_women'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'requirements'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'commitment_type'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'commitment_type_other'   => new sfWidgetFormFilterInput(),
      'commitment'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mechanism_commitment'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'compensation'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'compensation_type'       => new sfWidgetFormFilterInput(),
      'compensation_type_other' => new sfWidgetFormFilterInput(),
      'training'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'training_type'           => new sfWidgetFormFilterInput(),
      'training_type_other'     => new sfWidgetFormFilterInput(),
      'donations'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'method'                  => new sfWidgetFormFilterInput(),
      'utilization'             => new sfWidgetFormFilterInput(),
      'ip_address'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'random_value'            => new sfWidgetFormFilterInput(),
      'approved'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_active'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'categories_list'         => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Category')),
      'departments_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Department')),
    ));

    $this->setValidators(array(
      'name'                    => new sfValidatorPass(array('required' => false)),
      'address'                 => new sfValidatorPass(array('required' => false)),
      'country_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Country'), 'column' => 'id')),
      'department_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Department'), 'column' => 'id')),
      'town'                    => new sfValidatorPass(array('required' => false)),
      'departments'             => new sfValidatorPass(array('required' => false)),
      'mision'                  => new sfValidatorPass(array('required' => false)),
      'vision'                  => new sfValidatorPass(array('required' => false)),
      'about_us'                => new sfValidatorPass(array('required' => false)),
      'what_we_do'              => new sfValidatorPass(array('required' => false)),
      'legal_person'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'legal_person_type'       => new sfValidatorPass(array('required' => false)),
      'legal_person_type_other' => new sfValidatorPass(array('required' => false)),
      'partner1_name'           => new sfValidatorPass(array('required' => false)),
      'partner1_email'          => new sfValidatorPass(array('required' => false)),
      'partner1_mobile'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'partner2_name'           => new sfValidatorPass(array('required' => false)),
      'partner2_email'          => new sfValidatorPass(array('required' => false)),
      'partner2_mobile'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sat_registry'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'email'                   => new sfValidatorPass(array('required' => false)),
      'phone1'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'phone2'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'website'                 => new sfValidatorPass(array('required' => false)),
      'facebook_page'           => new sfValidatorPass(array('required' => false)),
      'twitter_user'            => new sfValidatorPass(array('required' => false)),
      'logo'                    => new sfValidatorPass(array('required' => false)),
      'founded'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'history'                 => new sfValidatorPass(array('required' => false)),
      'quantity_perm_men'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quantity_perm_women'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quantity_temp_men'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quantity_temp_women'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'requirements'            => new sfValidatorPass(array('required' => false)),
      'commitment_type'         => new sfValidatorPass(array('required' => false)),
      'commitment_type_other'   => new sfValidatorPass(array('required' => false)),
      'commitment'              => new sfValidatorPass(array('required' => false)),
      'mechanism_commitment'    => new sfValidatorPass(array('required' => false)),
      'compensation'            => new sfValidatorPass(array('required' => false)),
      'compensation_type'       => new sfValidatorPass(array('required' => false)),
      'compensation_type_other' => new sfValidatorPass(array('required' => false)),
      'training'                => new sfValidatorPass(array('required' => false)),
      'training_type'           => new sfValidatorPass(array('required' => false)),
      'training_type_other'     => new sfValidatorPass(array('required' => false)),
      'donations'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'method'                  => new sfValidatorPass(array('required' => false)),
      'utilization'             => new sfValidatorPass(array('required' => false)),
      'ip_address'              => new sfValidatorPass(array('required' => false)),
      'user_id'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'random_value'            => new sfValidatorPass(array('required' => false)),
      'approved'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_active'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'categories_list'         => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Category', 'required' => false)),
      'departments_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Department', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('association_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addCategoriesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.AssociationCategory AssociationCategory')
      ->andWhereIn('AssociationCategory.category_id', $values)
    ;
  }

  public function addDepartmentsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('AssociationDepartment.department_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Association';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'name'                    => 'Text',
      'address'                 => 'Text',
      'country_id'              => 'ForeignKey',
      'department_id'           => 'ForeignKey',
      'town'                    => 'Text',
      'departments'             => 'Text',
      'mision'                  => 'Text',
      'vision'                  => 'Text',
      'about_us'                => 'Text',
      'what_we_do'              => 'Text',
      'legal_person'            => 'Boolean',
      'legal_person_type'       => 'Text',
      'legal_person_type_other' => 'Text',
      'partner1_name'           => 'Text',
      'partner1_email'          => 'Text',
      'partner1_mobile'         => 'Number',
      'partner2_name'           => 'Text',
      'partner2_email'          => 'Text',
      'partner2_mobile'         => 'Number',
      'sat_registry'            => 'Boolean',
      'email'                   => 'Text',
      'phone1'                  => 'Number',
      'phone2'                  => 'Number',
      'website'                 => 'Text',
      'facebook_page'           => 'Text',
      'twitter_user'            => 'Text',
      'logo'                    => 'Text',
      'founded'                 => 'Date',
      'history'                 => 'Text',
      'quantity_perm_men'       => 'Number',
      'quantity_perm_women'     => 'Number',
      'quantity_temp_men'       => 'Number',
      'quantity_temp_women'     => 'Number',
      'requirements'            => 'Text',
      'commitment_type'         => 'Text',
      'commitment_type_other'   => 'Text',
      'commitment'              => 'Text',
      'mechanism_commitment'    => 'Text',
      'compensation'            => 'Text',
      'compensation_type'       => 'Text',
      'compensation_type_other' => 'Text',
      'training'                => 'Text',
      'training_type'           => 'Text',
      'training_type_other'     => 'Text',
      'donations'               => 'Boolean',
      'method'                  => 'Text',
      'utilization'             => 'Text',
      'ip_address'              => 'Text',
      'user_id'                 => 'ForeignKey',
      'random_value'            => 'Text',
      'approved'                => 'Boolean',
      'is_active'               => 'Boolean',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
      'categories_list'         => 'ManyKey',
      'departments_list'        => 'ManyKey',
    );
  }
}
