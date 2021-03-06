<?php

/**
 * BasePollChoice
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $poll_id
 * @property Poll $Poll
 * @property Doctrine_Collection $PollData
 * 
 * @method integer             getPollId()   Returns the current record's "poll_id" value
 * @method Poll                getPoll()     Returns the current record's "Poll" value
 * @method Doctrine_Collection getPollData() Returns the current record's "PollData" collection
 * @method PollChoice          setPollId()   Sets the current record's "poll_id" value
 * @method PollChoice          setPoll()     Sets the current record's "Poll" value
 * @method PollChoice          setPollData() Sets the current record's "PollData" collection
 * 
 * @package    sms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePollChoice extends Choice
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('poll_choice');
        $this->hasColumn('poll_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Poll', array(
             'local' => 'poll_id',
             'foreign' => 'id'));

        $this->hasMany('PollData', array(
             'local' => 'id',
             'foreign' => 'choice_id'));
    }
}