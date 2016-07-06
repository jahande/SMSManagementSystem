<?php

require_once dirname(__FILE__).'/../lib/pollManagingGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/pollManagingGeneratorHelper.class.php';

/**
 * pollManaging actions.
 *
 * @package    sms
 * @subpackage pollManaging
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pollManagingActions extends autoPollManagingActions
{
	public function executeShowStatistics(sfWebRequest $request){
		$this->address = 'pollManaging/showStatistics';
		$this->show = false;
		$pollToStatId = $request->getParameter('pollId','none');
		//phone number of sender
		$this->polls = PollTable::getInstance()->findAll();
		$this->data = array();
		$this->choiceDetails = array();

		if($pollToStatId!='none'){
			$pollToStat = PollTable::getInstance()->findOneById($pollToStatId);
			$this->show = true;
			$n = 0;
			foreach ($pollToStat->Choices as $ch){
				$q = Doctrine_Query::create()
				->select('count(*) as cnt')
				->from('PollData d')
				->where('choice_id=?', $ch->id)
				->fetchArray();
				$c = $q[0]['cnt'];
				$n += $c;
				$this->data[$ch->name] = $c;
				$this->choiceDetails[$ch->name] = $c;
			}

			$this->details = array();
			$this->details["Poll Name"] = $pollToStat->name;

			$this->details["OpenianCount"] = $n;
			/**
			 * 
			 */
			//$this->data['a']= 5;
			//$this->data['b']= 7;

		}

		return sfView::SUCCESS;
	}
	public function executeGetMessage(sfWebRequest $request){
		$smsText = $request->getParameter('subject');
		//phone number of sender
		$senderNumber  = $request->getParameter('from');
		$code = $request->getParameter('code');
		$array = strtok($smsText,' ');
		$senderPerson  = PersonTable::getInstance()->findOneByPhone($senderNumber);
		//$poll = PollTable::getInstance()->findOneByCode($code);
		//creating and saving
		$poll =  Doctrine_Query::create()
		->select('p.*')
		->from('poll p')
		->where('p.code=?', $code)
		->andWhere('p.start < ? ', RJUtils::getNowTimestamp())
		->andWhere('p.end > ? ', RJUtils::getNowTimestamp())
		->fetchOne();
		if(isset($poll) && $poll){
			$pollData = new PollData();
			$pollData->setChoiceId($array[0]);
			$pollData->setPerson($senderPerson);
			$pollData->setCreatedAt(RJUtils::getNowTimestamp());
			$pollData->setUpadatedAt(RJUtils::getNowTimestamp());
			$pollData->trySave();
			//$pollData->set

		}
		return sfView::SUCCESS;
	}
	public function executeSendResults(sfWebRequest $request){
		$this->address = 'pollManaging/sendResults';
		$pollToStatId = $request->getParameter('pollId','none');
		//phone number of sender
		$this->polls = PollTable::getInstance()->findAll();
		$this->data = array();
		$this->choiceDetails = array();

		if($pollToStatId!='none'){
			$pollToStat = PollTable::getInstance()->findOneById($pollToStatId);

			foreach ($pollToStat->Choices as $ch){
				$q = Doctrine_Query::create()
				->select('count(*) as cnt')
				->from('PollData d')
				->where('choice_id=?', $ch->id)
				->fetchArray();
				$c = $q[0]['cnt'];
				$n += $c;
				$this->data[$ch->name] = $c;
				$this->choiceDetails[$ch->name] = $c;
			}
			$max = 0;
			$mName = '';
			foreach ($this->data as $name => $value) {
				if($value>$max){
					$max = $value;
					$mName = $name;
				};
			}
			$response = "top: $name for $value openien";
			foreach ($pollToStat->Choices as $ch){
				SMS::send(new PQL($ch->Person->getPhone()),$response);

			}
			//			$this->details = array();


		}


		return sfView::SUCCESS;
	}
}
