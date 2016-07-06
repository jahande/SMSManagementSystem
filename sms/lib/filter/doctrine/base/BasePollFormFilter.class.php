<?php

/**
 * Poll filter form base class.
 *
 * @package    sms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePollFormFilter extends ProgramFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('poll_filters[%s]');
  }

  public function getModelName()
  {
    return 'Poll';
  }
}
