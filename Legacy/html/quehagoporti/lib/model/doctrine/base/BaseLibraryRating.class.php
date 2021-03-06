<?php

/**
 * BaseLibraryRating
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $ip
 * @property integer $library_id
 * @property Library $Library
 * 
 * @method string        getIp()         Returns the current record's "ip" value
 * @method integer       getLibraryId()  Returns the current record's "library_id" value
 * @method Library       getLibrary()    Returns the current record's "Library" value
 * @method LibraryRating setIp()         Sets the current record's "ip" value
 * @method LibraryRating setLibraryId()  Sets the current record's "library_id" value
 * @method LibraryRating setLibrary()    Sets the current record's "Library" value
 * 
 * @package    quehagoporti
 * @subpackage model
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLibraryRating extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('library_rating');
        $this->hasColumn('ip', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('library_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));

        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
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