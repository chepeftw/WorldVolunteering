<?php

/**
 * BaseLibraryComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property text $comment
 * @property integer $library_id
 * @property Library $Library
 * 
 * @method string         getName()       Returns the current record's "name" value
 * @method text           getComment()    Returns the current record's "comment" value
 * @method integer        getLibraryId()  Returns the current record's "library_id" value
 * @method Library        getLibrary()    Returns the current record's "Library" value
 * @method LibraryComment setName()       Sets the current record's "name" value
 * @method LibraryComment setComment()    Sets the current record's "comment" value
 * @method LibraryComment setLibraryId()  Sets the current record's "library_id" value
 * @method LibraryComment setLibrary()    Sets the current record's "Library" value
 * 
 * @package    quehagoporti
 * @subpackage model
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLibraryComment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('library_comment');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('comment', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('library_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Library', array(
             'local' => 'library_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}