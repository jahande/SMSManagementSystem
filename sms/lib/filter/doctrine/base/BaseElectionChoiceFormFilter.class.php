<?php

/**
 * ElectionChoice filter form base class.
 *
 * @package    sms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseElectionChoiceFormFilter extends ChoiceFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['election_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Election'), 'add_empty' => true));
    $this->validatorSchema['election_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Election'), 'column' => 'id'));

    $this->widgetSchema->setNameFormat('election_choice_filters[%s]');
  }

  public function getModelName()
  {
    return 'ElectionChoice';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'election_id' => 'ForeignKey',
    ));
  }
}
