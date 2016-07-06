<?php

/**
 * BaseGroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Doctrine_Collection $People
 * @property Doctrine_Collection $GroupPeople
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method Doctrine_Collection getPeople()      Returns the current record's "People" collection
 * @method Doctrine_Collection getGroupPeople() Returns the current record's "GroupPeople" collection
 * @method Group               setName()        Sets the current record's "name" value
 * @method Group               setPeople()      Sets the current record's "People" collection
 * @method Group               setGroupPeople() Sets the current record's "GroupPeople" collection
 * 
 * @package    sms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGroup extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('groop');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Person as People', array(
             'refClass' => 'GroupPerson',
             'local' => 'group_id',
             'foreign' => 'person_id'));

        $this->hasMany('GroupPerson as GroupPeople', array(
             'local' => 'id',
             'foreign' => 'group_id'));
    }
}