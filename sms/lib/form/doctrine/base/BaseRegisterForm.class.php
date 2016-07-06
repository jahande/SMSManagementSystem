<?php

/**
 * Register form base class.
 *
 * @method Register getObject() Returns the current form's model object
 *
 * @package    sms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRegisterForm extends ProgramForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['capacity'] = new sfWidgetFormInputText();
    $this->validatorSchema['capacity'] = new sfValidatorInteger(array('required' => false));

    $this->widgetSchema->setNameFormat('register[%s]');
  }

  public function getModelName()
  {
    return 'Register';
  }

}
