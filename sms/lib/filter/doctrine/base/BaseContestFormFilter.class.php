<?php

/**
 * Contest filter form base class.
 *
 * @package    sms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContestFormFilter extends ProgramFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['winners_count'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['winners_count'] = new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false)));

    $this->widgetSchema   ['answer_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Answer'), 'add_empty' => true));
    $this->validatorSchema['answer_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Answer'), 'column' => 'id'));

    $this->widgetSchema   ['auto_result'] = new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no')));
    $this->validatorSchema['auto_result'] = new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0)));

    $this->widgetSchema   ['performed'] = new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no')));
    $this->validatorSchema['performed'] = new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0)));

    $this->widgetSchema->setNameFormat('contest_filters[%s]');
  }

  public function getModelName()
  {
    return 'Contest';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'winners_count' => 'Number',
      'answer_id' => 'ForeignKey',
      'auto_result' => 'Boolean',
      'performed' => 'Boolean',
    ));
  }
}
