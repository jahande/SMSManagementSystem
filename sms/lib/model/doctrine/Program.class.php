<?php

/**
 * Program
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    sms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Program extends BaseProgram
{
	/**
	 * @param $pql
	 */
	function setParticipants($pql){
		$this->_set('participants', PQL::formatString($pql)); 
	}
	
	function getParticipants(){
		return new PQL($this->_get('participants'));
	}

	function isActiveNow(){
		$now = date("Y-m-d h:i:s");
		return ($this->start <= $now) && ($now < $this->end);
	}

	/**
	 *
	 * @param $person a Person object
	 * @return boolean
	 */
	function isPersonAuthorized($person){
		return $this->participants->isPersonAuthorized($person);
	}

	/**
	 *
	 * @param $person a Person object
	 * @return boolean
	 */
	function canParticipate($person){
		return $this->isActiveNow() && $this->isPersonAuthorized($person);
	}
	
	public static function getTypeByCode($code){
		$c = Doctrine_Query::create()->select('COUNT(*) AS cnt')
			->from('contest')->where('code=?', $code)->fetchArray();
		if (($c[0]['cnt'])>0) return "contest";
		
		$c = Doctrine_Query::create()->select('COUNT(*) AS cnt')
			->from('election')->where('code=?', $code)->fetchArray();
		if (($c[0]['cnt'])>0) return "election";
		
		$c = Doctrine_Query::create()->select('COUNT(*) AS cnt')
			->from('poll')->where('code=?', $code)->fetchArray();
		if (($c[0]['cnt'])>0) return "poll";
		
		$c = Doctrine_Query::create()->select('COUNT(*) AS cnt')
			->from('register')->where('code=?', $code)->fetchArray();
		if (($c[0]['cnt'])>0) return "register";
		
		return "global";
	}
}