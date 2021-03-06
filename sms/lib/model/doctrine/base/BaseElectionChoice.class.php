<?php

/**
 * BaseElectionChoice
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $election_id
 * @property Election $Election
 * @property Doctrine_Collection $ElectionData
 * 
 * @method integer             getElectionId()   Returns the current record's "election_id" value
 * @method Election            getElection()     Returns the current record's "Election" value
 * @method Doctrine_Collection getElectionData() Returns the current record's "ElectionData" collection
 * @method ElectionChoice      setElectionId()   Sets the current record's "election_id" value
 * @method ElectionChoice      setElection()     Sets the current record's "Election" value
 * @method ElectionChoice      setElectionData() Sets the current record's "ElectionData" collection
 * 
 * @package    sms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseElectionChoice extends Choice
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('election_choice');
        $this->hasColumn('election_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Election', array(
             'local' => 'election_id',
             'foreign' => 'id'));

        $this->hasMany('ElectionData', array(
             'local' => 'id',
             'foreign' => 'choice_id'));
    }
}