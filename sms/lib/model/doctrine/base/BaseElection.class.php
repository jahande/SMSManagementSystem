<?php

/**
 * BaseElection
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Doctrine_Collection $Choices
 * 
 * @method Doctrine_Collection getChoices() Returns the current record's "Choices" collection
 * @method Election            setChoices() Sets the current record's "Choices" collection
 * 
 * @package    sms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseElection extends Program
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('election');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('ElectionChoice as Choices', array(
             'local' => 'id',
             'foreign' => 'election_id'));
    }
}