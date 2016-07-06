<?php

/**
 * BasePerson
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $email
 * @property string $phone
 * @property Doctrine_Collection $Groups
 * @property Doctrine_Collection $GroupPeople
 * @property Doctrine_Collection $ProgramData
 * 
 * @method string              getFirstName()   Returns the current record's "first_name" value
 * @method string              getLastName()    Returns the current record's "last_name" value
 * @method string              getUsername()    Returns the current record's "username" value
 * @method string              getEmail()       Returns the current record's "email" value
 * @method string              getPhone()       Returns the current record's "phone" value
 * @method Doctrine_Collection getGroups()      Returns the current record's "Groups" collection
 * @method Doctrine_Collection getGroupPeople() Returns the current record's "GroupPeople" collection
 * @method Doctrine_Collection getProgramData() Returns the current record's "ProgramData" collection
 * @method Person              setFirstName()   Sets the current record's "first_name" value
 * @method Person              setLastName()    Sets the current record's "last_name" value
 * @method Person              setUsername()    Sets the current record's "username" value
 * @method Person              setEmail()       Sets the current record's "email" value
 * @method Person              setPhone()       Sets the current record's "phone" value
 * @method Person              setGroups()      Sets the current record's "Groups" collection
 * @method Person              setGroupPeople() Sets the current record's "GroupPeople" collection
 * @method Person              setProgramData() Sets the current record's "ProgramData" collection
 * 
 * @package    sms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePerson extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('person');
        $this->hasColumn('first_name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('last_name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('username', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('email', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('phone', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Group as Groups', array(
             'refClass' => 'GroupPerson',
             'local' => 'person_id',
             'foreign' => 'group_id'));

        $this->hasMany('GroupPerson as GroupPeople', array(
             'local' => 'id',
             'foreign' => 'person_id'));

        $this->hasMany('ProgramData', array(
             'local' => 'id',
             'foreign' => 'person_id'));
    }
}