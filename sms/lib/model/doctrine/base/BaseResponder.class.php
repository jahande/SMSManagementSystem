<?php

/**
 * BaseResponder
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property text $response
 * @property Doctrine_Collection $Program
 * 
 * @method string              getName()     Returns the current record's "name" value
 * @method text                getResponse() Returns the current record's "response" value
 * @method Doctrine_Collection getProgram()  Returns the current record's "Program" collection
 * @method Responder           setName()     Sets the current record's "name" value
 * @method Responder           setResponse() Sets the current record's "response" value
 * @method Responder           setProgram()  Sets the current record's "Program" collection
 * 
 * @package    sms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseResponder extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('responder');
        $this->hasColumn('name', 'string', 25, array(
             'type' => 'string',
             'length' => 25,
             ));
        $this->hasColumn('response', 'text', null, array(
             'type' => 'text',
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Program', array(
             'local' => 'id',
             'foreign' => 'responder_id'));
    }
}