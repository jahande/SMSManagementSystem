<?php

/**
 * send actions.
 *
 * @package    sms
 * @subpackage send
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sendActions extends sfActions
{	
	public function executeSendToOne(sfWebRequest $request)
	{
		if ($request->isMethod(sfRequest::POST)){
			$send = $request->getParameter('send');
			SMS::send(new PQL($send['phones']), $send['message']);
			
			$log = new Sent();
			$log->sender = 'get sf user';
			$log->text = $send['message'];
			$log->receiver = $send['phones'];
			$log->Status = Doctrine::getTable('Status')->findOneByName('Sent');
			
			$this->setTemplate('sent');
		}
	}

	public function executeSendToGroup(sfWebRequest $request)
	{
		if ($request->isMethod(sfRequest::POST)){
			$send = $request->getParameter('send');
//			var_dump($send['groups']);
			$to = PQL::create($send['groups']);
			
			$log = new Sent();
			$log->sender = 'get sf user';
			$log->text = $send['message'];
			$log->receiver = $to;
			
			
			if (isset($send['later']) && $send['later']){
				$log->Status = Doctrine::getTable('Status')->findOneByName('Later');
				$log->send_date = $time;
			} else {
				SMS::send($to, $send['message']);
				$log->Status = Doctrine::getTable('Status')->findOneByName('Sent'); 
				
				if (isset($send['email']) && $send['email']){
					EMail::send($to, 'AJH SMS System Email', $send['message']);
				}
			}
			
			$log->save();
			$this->setTemplate('sent');
		}
	}
}
