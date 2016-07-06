<?php

require_once dirname(__FILE__).'/../lib/pollChoiceManagingGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/pollChoiceManagingGeneratorHelper.class.php';

/**
 * pollChoiceManaging actions.
 *
 * @package    sms
 * @subpackage pollChoiceManaging
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pollChoiceManagingActions extends autoPollChoiceManagingActions
{
	public function executeAddMultipleChoice(sfWebRequest $request){
		$this->address = 'pollChoiceManaging/addChoice';
		$this->polls = PollTable::getInstance()->findAll();
		//$groupId = $request->getParameter('groupId');
		$pollIdToAdd = $request->getParameter('pollId');
		$string = $request->getParameter('choice');
		$choicesStrings = strtok($string , ',');
		//$pollsToAdd  = PollTable::getInstance()->findById($pollsIdToAdd);
		if(isset($pollId) && isset($string) && $string!=''){
//			$choices = array();
			foreach ($choicesStrings as $cs) {
				$choice = new PollChoice();
				$choice->setName($cs);
				$choice->setPollId($pollIdToAdd);
				$choice->trySave();
			}
		}
		return sfView::SUCCESS;
	}	
	//public function executeShowStatistics(sfWebRequest $request){
}
