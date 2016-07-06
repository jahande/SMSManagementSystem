<?php

/**
 * Sent form base class.
 *
 * @method Sent getObject() Returns the current form's model object
 *
 * @package    sms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'sender'     => new sfWidgetFormInputText(),
      'receiver'   => new sfWidgetFormInputText(),
      'send_date'  => new sfWidgetFormInputText(),
      'text'       => new sfWidgetFormInputText(),
      'status_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sender'     => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'receiver'   => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'send_date'  => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'text'       => new sfValidatorPass(array('required' => false)),
      'status_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sent[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sent';
  }

}
