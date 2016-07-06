<?php

/**
 * PollChoice form base class.
 *
 * @method PollChoice getObject() Returns the current form's model object
 *
 * @package    sms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePollChoiceForm extends ChoiceForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['poll_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'), 'add_empty' => true));
    $this->validatorSchema['poll_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'), 'required' => false));

    $this->widgetSchema->setNameFormat('poll_choice[%s]');
  }

  public function getModelName()
  {
    return 'PollChoice';
  }

}
