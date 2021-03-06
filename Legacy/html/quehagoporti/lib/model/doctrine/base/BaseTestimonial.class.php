<?php

/**
 * BaseTestimonial
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property text $description
 * @property string $picture
 * @property integer $association_id
 * @property boolean $is_active
 * @property Association $Association
 * 
 * @method string      getTitle()          Returns the current record's "title" value
 * @method text        getDescription()    Returns the current record's "description" value
 * @method string      getPicture()        Returns the current record's "picture" value
 * @method integer     getAssociationId()  Returns the current record's "association_id" value
 * @method boolean     getIsActive()       Returns the current record's "is_active" value
 * @method Association getAssociation()    Returns the current record's "Association" value
 * @method Testimonial setTitle()          Sets the current record's "title" value
 * @method Testimonial setDescription()    Sets the current record's "description" value
 * @method Testimonial setPicture()        Sets the current record's "picture" value
 * @method Testimonial setAssociationId()  Sets the current record's "association_id" value
 * @method Testimonial setIsActive()       Sets the current record's "is_active" value
 * @method Testimonial setAssociation()    Sets the current record's "Association" value
 * 
 * @package    quehagoporti
 * @subpackage model
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTestimonial extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('testimonial');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('picture', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('association_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));

        $this->option('orderBy', 'created_at ASC');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Association', array(
             'local' => 'association_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}