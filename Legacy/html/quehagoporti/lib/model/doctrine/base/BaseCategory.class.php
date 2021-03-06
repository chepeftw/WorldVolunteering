<?php

/**
 * BaseCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Doctrine_Collection $AssociationSurveyCategories
 * @property Doctrine_Collection $AssociationSurveyCategory
 * @property Doctrine_Collection $AssociationCategory
 * @property Doctrine_Collection $AssociationCategories
 * 
 * @method string              getName()                        Returns the current record's "name" value
 * @method Doctrine_Collection getAssociationSurveyCategories() Returns the current record's "AssociationSurveyCategories" collection
 * @method Doctrine_Collection getAssociationSurveyCategory()   Returns the current record's "AssociationSurveyCategory" collection
 * @method Doctrine_Collection getAssociationCategory()         Returns the current record's "AssociationCategory" collection
 * @method Doctrine_Collection getAssociationCategories()       Returns the current record's "AssociationCategories" collection
 * @method Category            setName()                        Sets the current record's "name" value
 * @method Category            setAssociationSurveyCategories() Sets the current record's "AssociationSurveyCategories" collection
 * @method Category            setAssociationSurveyCategory()   Sets the current record's "AssociationSurveyCategory" collection
 * @method Category            setAssociationCategory()         Sets the current record's "AssociationCategory" collection
 * @method Category            setAssociationCategories()       Sets the current record's "AssociationCategories" collection
 * 
 * @package    quehagoporti
 * @subpackage model
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('category');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));

        $this->option('orderBy', 'name ASC');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AssociationSurvey as AssociationSurveyCategories', array(
             'refClass' => 'AssociationSurveyCategory',
             'local' => 'category_id',
             'foreign' => 'association_survey_id'));

        $this->hasMany('AssociationSurveyCategory', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $this->hasMany('AssociationCategory', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $this->hasMany('Association as AssociationCategories', array(
             'refClass' => 'AssociationCategory',
             'local' => 'category_id',
             'foreign' => 'association_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $nestedset0 = new Doctrine_Template_NestedSet(array(
             'hasManyRoots' => true,
             'rootColumnName' => 'root_id',
             ));
        $this->actAs($timestampable0);
        $this->actAs($nestedset0);
    }
}