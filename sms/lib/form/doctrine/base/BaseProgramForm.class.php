<?php

/**
 * Program form base class.
 *
 * @method Program getObject() Returns the current form's model object
 *
 * @package    sms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProgramForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
      'code'         => new sfWidgetFormInputText(),
      'start'        => new sfWidgetFormDateTime(),
      'end'          => new sfWidgetFormDateTime(),
      'participants' => new sfWidgetFormInputText(),
      'responder_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Responder'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'code'         => new sfValidatorInteger(array('required' => false)),
      'start'        => new sfValidatorDateTime(array('required' => false)),
      'end'          => new sfValidatorDateTime(array('required' => false)),
      'participants' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'responder_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Responder'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('program[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Program';
  }

}
