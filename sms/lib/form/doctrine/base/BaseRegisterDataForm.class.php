<?php

/**
 * RegisterData form base class.
 *
 * @method RegisterData getObject() Returns the current form's model object
 *
 * @package    sms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRegisterDataForm extends ProgramDataForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['register_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Register'), 'add_empty' => true));
    $this->validatorSchema['register_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Register'), 'required' => false));

    $this->widgetSchema->setNameFormat('register_data[%s]');
  }

  public function getModelName()
  {
    return 'RegisterData';
  }

}
