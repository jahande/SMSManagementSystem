<?php

/**
 * router actions.
 *
 * @package    sms
 * @subpackage router
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class routerActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$smsContent = $request->getParameter('content','');
		$smsType = substr($smsContent,1,1);
		//$smsType= '';
		switch($smsType){

			case 'c'://competition
				break;
			case 'p'://polls
				break;
			case 'm'://program
				break;
					
		}
		//$this->forward('default', 'module');
		return sfView::SUCCESS;
	}
	public function executeBaseReciver(sfWebRequest $request){
		$this->subject = $request->getParameter('subject','');
		$this->from  = $request->getParameter('from','');
		$this->time = RJUtils::getNowTimestamp();
		$this->array = strtok($this->subject,' ');
		$mainPart = strlen($this->array[0]);
		$mainPart = substr($this->subject,$mainPart+1);
		$request->setParameter('subject',$mainPart);
		$request->setParameter('code',$this->array[0]);
		//$this->module = RJUtils::getModuleFromCode($this->array[0]);

		if($this->array[0]=='emailByName'){
			$person = Person::getInstanceByFirstNAndLastName($this->array[1],$this->array[2]);
			if(isset($person) && $person){
				$id = $person->getId();
				EMail::send(PQL::create(array(),array($id),array()),"Emailed from SMS system",$this->subject);
			}
		}else if($this->array[0]=='emailByEmailAddress'){
			EMail::send(new PQL($this->array[0]),"Emailed from SMS system",$this->subject);
		}else if($this->array[0]=='sms'){
			$person = Person::getInstanceByFirstNAndLastName($this->array[1],$this->array[2]);
			if(isset($person) && $person){
				$id = $person->getId();
				SMS::send(PQL::create(array(),array($id),array()),$this->subject);
			}
		}else if($this->array[0]=='translate'){
			
		}else if($this->array[0]=='exec'){
			
		}
		else{
			$this->module = Program::getTypeByCode($this->array[0]);
			$this->forward($this->module,'getMessage');
		}

		//		$format = '%d/%m/%Y %H:%M:%S';
		//		$strf = strftime($format);
		//		$db = new DB_MySQL();
		//		$vfrom=$_GET['from'];
		//		$vsubject=$_GET['subject'];
		//		$db->query("insert into message_in (subject, mobile, receive_time) values ('" . mysql_escape_string($vsubject) . "', '" . mysql_escape_string($vfrom) ."','".$vsubject."')");
		//		$db->close();
		//return sfView::SUCCESS;
		//$this->forward404()
		//TODO save this sms to invalid sms table
		return sfView::ERROR;
	}
	public function executeVirtualSender(sfWebRequest $request){
		return sfView::SUCCESS;
	}


}