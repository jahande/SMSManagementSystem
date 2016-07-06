<?php

/**
 * ContestData filter form base class.
 *
 * @package    sms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContestDataFormFilter extends ProgramDataFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['choice_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Choice'), 'add_empty' => true));
    $this->validatorSchema['choice_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Choice'), 'column' => 'id'));

    $this->widgetSchema->setNameFormat('contest_data_filters[%s]');
  }

  public function getModelName()
  {
    return 'ContestData';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'choice_id' => 'ForeignKey',
    ));
  }
}
