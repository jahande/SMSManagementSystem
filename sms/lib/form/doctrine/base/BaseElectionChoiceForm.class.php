<?php

/**
 * ElectionChoice form base class.
 *
 * @method ElectionChoice getObject() Returns the current form's model object
 *
 * @package    sms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseElectionChoiceForm extends ChoiceForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['election_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Election'), 'add_empty' => true));
    $this->validatorSchema['election_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Election'), 'required' => false));

    $this->widgetSchema->setNameFormat('election_choice[%s]');
  }

  public function getModelName()
  {
    return 'ElectionChoice';
  }

}
