<?php

/**
 * atest actions.
 *
 * @package    sms
 * @subpackage atest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class atestActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->forward('default', 'module');
	}

	/**
	 * Object Creation
	 */
	public function executeT1(sfWebRequest $request){
		$this->exPoll(10);
		if(false){
			$g = new Group();
			$g->name = 'New Group';
			$g->save();
			//$g = Doctrine::getTable('Group')->find(1);

			$p = new Person();
			$p->Groups[] = $g;
			$p->first_name = "Amir Ali";
			$p->last_name = "Akbari";
			$p->email = "amiraliakbari@gmail.com";
			$p->phone = "09151022395";
			$p->save();
			//$p = Doctrine::getTable('Person')->find(1);

			$c = new Contest();
			$c->code = 1;
			$c->save();
			//$c = Doctrine::getTable('Contest')->find(1);

			$cc = new ContestChoice();
			$cc->name = "بد";
			$cc->Contest = $c;
			$cc->save();
			//$cc = Doctrine::getTable('ContestChoice')->find(2);

			$cd = new ContestData();
			$cd->Person = $p;
			$cd->Choice = $cc;
			$cd->save();

		}
	}
	public function exPoll($n){
		for ($i = 1; $i < 2*$n; $i++) {
			$this->samplePerson($i);
		}
		for ($i = 1; $i < $n; $i++) {
			$this->sampleGroup($i);
		}
		for ($i = 1; $i < $n; $i++) {
			$this->sampleResponder($i);
		}
		for ($i = 1; $i < $n; $i++) {
			$this->sampleRegister($i);
		}
		for ($i = 1; $i < $n; $i++) {
			$this->samplePoll($i);
		}
		for ($i = 1; $i < $n; $i++) {
			$this->samplePollChoice($i);
		}
		
		for ($i = 2; $i < floor($n/2); $i++) {
			$this->samplePollData($i);
		}
	for ($i = 1; $i < floor($n/2); $i++) {
			$this->sampleRegisterData($i);
		}


	}
	public function sampleResponder($i){
		$r = new Responder();
		$r->setName("respon$i");
		$r->setResponse('responssssss'.$i);
		$r->trySave();
	}
	public function sampleRegisterData($i){
		$rd = new RegisterData();
		$rd->setPersonId($i);
		$rd->setRegisterId(1);
		$rd->setCreatedAt(RJUtils::getNowTimestamp(170*$i));
		$rd->setUpdatedAt(RJUtils::getNowTimestamp(170*$i));
		$rd->trySave();
	}
	public function samplePollData($i){
		$pd= new PollData();
		$pd->setPersonId(1);
		$pd->setChoiceId(1);
//		$pd->setPollId(1);
		$pd->setCreatedAt(RJUtils::getNowTimestamp(170*$i));
		$pd->setUpdatedAt(RJUtils::getNowTimestamp(170*$i));
		$pd->trySave();
	}
	public function samplePerson($i){
		$p = new Person();
		$p->setFirstName('fn'.$i);
		$p->setLastName('ln'.$i);
		$p->setUsername('un'.$i);
		$p->setPhone(19009*$i);
		$p->setEmail("fnlnu$i@gmail.com");
		$p->trySave();


	}
	public function sampleRegister($i){
		$r = new Register();
		$r->setName('register'.$i);
		$r->setCode(16+$i*5);
		$r->setStart('2006-01-02 01:01:00');
		$r->setEnd('2010-01-02 01:01:00');
		$r->setParticipants(".g$i, #Akbari");
		$r->setResponderId(2);
		$r->setCapacity(50);
		$r->trySave();
	}
	public function samplePoll($i){
		$poll = new Poll();
		$poll->setName('poll1'.$i);
		$poll->setCode(15+$i*5);
		$poll->setStart('2006-01-02 01:01:00');
		$poll->setEnd('2010-01-02 01:01:00');
		$poll->setParticipants(".g$i, #Akbari");
		$poll->setResponderId(1);
		$poll->trySave();
	}
	public function samplePollChoice($i){
		$c = new PollChoice();
		$c->setName('c'.$i);
		$c->setPollId(1);
		//	$c->setPollData();

	}
	public function sampleGroup($i){
		$g = new Group();
		$g->setName('g'.(5*$i));
		//$poll->setCode(15+$i*5);
		//$poll->setStart('2006-01-02 01:01:00');
		//		$poll->setEnd('2010-01-02 01:01:00');
		//		$poll->setParticipants(".g$i, #Akbari");
		$g->trySave();
	}
	/**
	 * PQL Read and write
	 *
	 */
	public function executeT2(sfWebRequest $request){

		$g = Doctrine::getTable('Group')->find(1);
		$p = Doctrine::getTable('Person')->find(1);
		$c = new Contest();
		$c->code = 1;
		$c->participants = array('groups'=>array($g),
								'people'=>array($p),
								'phones'=>array('12'));
		$c->save();

		echo "Group Name: ".$c->participants['groups'][0]->name;
		echo "<br/>Person Name: ".$c->participants['people'][0]->last_name;
		echo "<br/>Phone: ".$c->participants['phones'][0];
	}
}
