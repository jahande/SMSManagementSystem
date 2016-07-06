<?php

/**
 * Register filter form base class.
 *
 * @package    sms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRegisterFormFilter extends ProgramFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['capacity'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['capacity'] = new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false)));

    $this->widgetSchema->setNameFormat('register_filters[%s]');
  }

  public function getModelName()
  {
    return 'Register';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'capacity' => 'Number',
    ));
  }
}
