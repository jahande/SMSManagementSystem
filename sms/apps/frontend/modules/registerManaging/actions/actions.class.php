<?php

require_once dirname(__FILE__).'/../lib/registerManagingGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/registerManagingGeneratorHelper.class.php';

/**
 * registerManaging actions.
 *
 * @package    sms
 * @subpackage registerManaging
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerManagingActions extends autoRegisterManagingActions
{
	public function executeGetMessage(sfWebRequest $request)
	{
		$smsText = $request->getParameter('subject');
		//phone number of sender
		$senderNumber  = $request->getParameter('from');
		$code = $request->getParameter('code');
		$array = strtok($smsText,' ');
		$senderPerson  = PersonTable::getInstance()->findOneByPhone($senderNumber);
		$rd = new RegisterData();
		$rd->setPersonId($senderPerson->getId());





		$this->state = $smsText."ed";
		if($smsText=='register'){
			$register = Doctrine_Query::create()
			->select('r.*')
			->from('register r')
			->where('r.code=?', $code)
			->andWhere('r.start < ? ', RJUtils::getNowTimestamp())
			->andWhere('r.end > ? ', RJUtils::getNowTimestamp())
			->fetchOne();
			if(isset($register) && $register){
				$pql = 	$register->getParticipants();
				if($pql->isPersonAuthorized($senderPerson)){
					$rd->setRegisterId($register->getId());
					$rd->setCreatedAt(RJUtils::getNowTimestamp());
					$rd->setUpdatedAt(RJUtils::getNowTimestamp());
					$rd->trySave();
				}
			}

		}else if($smsText=='abort'){

			$register = RegisterTable::getInstance()->findOneByCode($code);
			$rd->setRegisterId($register->getId());
			$rd->delete();
		}
		return sfView::SUCCESS;
	}
	public function executeShowStatistics(sfWebRequest $request){
		$this->showCheckBox = false;
		$this->address= 'registerManaging/showStatistics';
		$this->registers = RegisterTable::getInstance()->findAll();
		$registerId = $request->getParameter('registerId','none');
		if($registerId!='none'){
			$this->showCheckBox = true;
			$register = RegisterTable::getInstance()->findOneById($registerId);
			$this->r = $register;
			$this->registredDatas = RegisterDataTable::getInstance()->findByRegisterId($registerId);
			$this->registredPersons =
			Doctrine_Query::create()
			->select('count(*) as cnt , p.* , rd.*')
			->from('RegisterData rd')
			->innerJoin('rd.Person p')
			->where('rd.register_id = ?', $registerId)
			->orderBy('rd.created_at ASC')
			->fetchArray();
			$this->countBefore = $this->registredPersons[0]['cnt'];
			$this->count = $this->countBefore;
			if(!isset($this->count)){
				$this->count = $this->registredPersons['cnt'];
			}
			if($request->getParameter('doRandom','false')=='true'){
				$cap = $register->getCapacity();
				$luckiesPersonIds = array();
				$this->orders = $this->weightRandom($cap,$this->count);
				for ($i = 0; $i < $this->count; $i++) {
					if(!$this->orders[$i]){
						if(false){
						$toRemove  = new RegisterData();
						$toRemove->setId($this->registredDatas[$i]->getPerson()->getId());
						$toRemove->delete();
						}else{
							$this->registredDatas[$i]->delete();
							$this->registredDatas[$i] = null;
							$this->count --;
						}
							//$this->registredPersons[$i]
					}
				}
			}
		}
		return sfView::SUCCESS;
	}
	private function  weightRandom($cap,$all){
		$participants = 0;
		$result = array();
		//initialize to false
		for ($i = 0; $i < $all; $i++) {
			$result[$i] = false;//false show that he can't participate
		}
		//processing
		for ($i = 0; $i < $all; $i++) {
			if($cap <= $participants){
				break;
			}
			if($cap - $participants>= $all-$i){
				for ($j = $i; $j < $all; $j++) {
					//array_push($result,$j);
					$result[$j] = true;
					$participants++;
				}
				break;
			}
			$r = rand(0, $all);
			if($r<$all-$i){
				//array_push($result,$i);
				$result[$i] = true;
				$participants++;
			}

		}
		return $result;
	}
//	private function invers($array , $size){
//
//	}
}
