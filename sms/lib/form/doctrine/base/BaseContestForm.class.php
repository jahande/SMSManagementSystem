<?php

/**
 * Contest form base class.
 *
 * @method Contest getObject() Returns the current form's model object
 *
 * @package    sms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContestForm extends ProgramForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['winners_count'] = new sfWidgetFormInputText();
    $this->validatorSchema['winners_count'] = new sfValidatorInteger(array('required' => false));

    $this->widgetSchema   ['answer_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Answer'), 'add_empty' => true));
    $this->validatorSchema['answer_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Answer'), 'required' => false));

    $this->widgetSchema   ['auto_result'] = new sfWidgetFormInputCheckbox();
    $this->validatorSchema['auto_result'] = new sfValidatorBoolean(array('required' => false));

    $this->widgetSchema   ['performed'] = new sfWidgetFormInputCheckbox();
    $this->validatorSchema['performed'] = new sfValidatorBoolean(array('required' => false));

    $this->widgetSchema->setNameFormat('contest[%s]');
  }

  public function getModelName()
  {
    return 'Contest';
  }

}
