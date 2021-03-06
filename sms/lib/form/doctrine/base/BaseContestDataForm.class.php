<?php

/**
 * ContestData form base class.
 *
 * @method ContestData getObject() Returns the current form's model object
 *
 * @package    sms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContestDataForm extends ProgramDataForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['choice_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Choice'), 'add_empty' => true));
    $this->validatorSchema['choice_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Choice'), 'required' => false));

    $this->widgetSchema->setNameFormat('contest_data[%s]');
  }

  public function getModelName()
  {
    return 'ContestData';
  }

}
