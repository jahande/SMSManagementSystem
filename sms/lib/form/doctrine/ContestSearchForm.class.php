<?php

class ContestSearchForm extends BaseForm
{
  public function setup()
  {
    $this->setWidgets(array(
      'filtered'           => new sfWidgetFormInputHidden(array(), array('value'=>'true')),
      'name'               => new sfWidgetFormInput(),
      'from'               => new sfWidgetFormDate(),
      'to'                 => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'filtered'           => new sfValidatorPass(),
      'name'               => new sfValidatorString(),
      'from'               => new sfValidatorDate(),
      'to'                 => new sfValidatorDate(),
    ));

    $this->widgetSchema->setNameFormat('contest_filter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }
  
}
