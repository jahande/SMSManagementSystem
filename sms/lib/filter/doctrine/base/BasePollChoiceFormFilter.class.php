<?php

/**
 * PollChoice filter form base class.
 *
 * @package    sms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePollChoiceFormFilter extends ChoiceFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['poll_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'), 'add_empty' => true));
    $this->validatorSchema['poll_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Poll'), 'column' => 'id'));

    $this->widgetSchema->setNameFormat('poll_choice_filters[%s]');
  }

  public function getModelName()
  {
    return 'PollChoice';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'poll_id' => 'ForeignKey',
    ));
  }
}
