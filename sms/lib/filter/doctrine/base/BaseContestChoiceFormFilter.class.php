<?php

/**
 * ContestChoice filter form base class.
 *
 * @package    sms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContestChoiceFormFilter extends ChoiceFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['contest_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Contest'), 'add_empty' => true));
    $this->validatorSchema['contest_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Contest'), 'column' => 'id'));

    $this->widgetSchema->setNameFormat('contest_choice_filters[%s]');
  }

  public function getModelName()
  {
    return 'ContestChoice';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'contest_id' => 'ForeignKey',
    ));
  }
}
