<?php

/**
 * RegisterData filter form base class.
 *
 * @package    sms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRegisterDataFormFilter extends ProgramDataFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['register_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Register'), 'add_empty' => true));
    $this->validatorSchema['register_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Register'), 'column' => 'id'));

    $this->widgetSchema->setNameFormat('register_data_filters[%s]');
  }

  public function getModelName()
  {
    return 'RegisterData';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'register_id' => 'ForeignKey',
    ));
  }
}
