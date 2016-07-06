<?php

/**
 * exec actions.
 *
 * @package    sms
 * @subpackage exec
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class execActions extends sfActions
{
	public function run($cmd, $senderPhone){
		$user = Doctrine::getTable('UserDetail')->findOneByPhone($senderPhone);
		$this->forward404Unless($user, 'Unknown phone number');
		
		if (!$this->getUser()->hasPermission('exec')){
			return $this->renderText("<h1>Access Denied</h1><p>You are not allowed to perform exec remotely.</p>");
		}
		
		$co = array();
		exec($cmd, $co, $ec);
		
		$result = "Returned $ec.";
		if (count($co)>0){
			$result .= "\nOutput:\n".implode('\n', $co);
		}
		
		SMS::send($senderPhone, $result);
		
		return $this->renderText("<h1>Command Executed</h1><p>$result</p>");
	}
	
	public function executeGetMessage(sfWebRequest $request){
		$this->run($request->getParameter('subject'), $request->getParameter('from'));
	}
  
}
