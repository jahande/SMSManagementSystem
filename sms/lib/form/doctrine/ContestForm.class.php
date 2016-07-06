<?php

/**
 * Contest form.
 *
 * @package    sms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContestForm extends BaseContestForm
{
  /**
   * @see ProgramForm
   */
  public function configure()
  {
    parent::configure();
    unset($this['participants'], $this['responder_id'], $this['answer_id'], $this['performed']);
  }
}
