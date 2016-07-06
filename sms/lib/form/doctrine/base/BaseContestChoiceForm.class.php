<?php

/**
 * ContestChoice form base class.
 *
 * @method ContestChoice getObject() Returns the current form's model object
 *
 * @package    sms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContestChoiceForm extends ChoiceForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['contest_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Contest'), 'add_empty' => true));
    $this->validatorSchema['contest_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Contest'), 'required' => false));

    $this->widgetSchema->setNameFormat('contest_choice[%s]');
  }

  public function getModelName()
  {
    return 'ContestChoice';
  }

}
