<?php

/**
 * BaseSent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $sender
 * @property string $receiver
 * @property string $send_date
 * @property text $text
 * @property integer $status_id
 * @property Status $Status
 * 
 * @method string  getSender()    Returns the current record's "sender" value
 * @method string  getReceiver()  Returns the current record's "receiver" value
 * @method string  getSendDate()  Returns the current record's "send_date" value
 * @method text    getText()      Returns the current record's "text" value
 * @method integer getStatusId()  Returns the current record's "status_id" value
 * @method Status  getStatus()    Returns the current record's "Status" value
 * @method Sent    setSender()    Sets the current record's "sender" value
 * @method Sent    setReceiver()  Sets the current record's "receiver" value
 * @method Sent    setSendDate()  Sets the current record's "send_date" value
 * @method Sent    setText()      Sets the current record's "text" value
 * @method Sent    setStatusId()  Sets the current record's "status_id" value
 * @method Sent    setStatus()    Sets the current record's "Status" value
 * 
 * @package    sms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sent');
        $this->hasColumn('sender', 'string', 25, array(
             'type' => 'string',
             'length' => 25,
             ));
        $this->hasColumn('receiver', 'string', 25, array(
             'type' => 'string',
             'length' => 25,
             ));
        $this->hasColumn('send_date', 'string', 25, array(
             'type' => 'string',
             'length' => 25,
             ));
        $this->hasColumn('text', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('status_id', 'integer', null, array(
             'type' => 'integer',
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Status', array(
             'local' => 'status_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}