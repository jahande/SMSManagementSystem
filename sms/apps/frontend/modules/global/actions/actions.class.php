<?php

/**
 * global actions.
 *
 * @package    sms
 * @subpackage global
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class globalActions extends sfActions{
	public function executeIndex(sfWebRequest $request){
		$this->unread = Doctrine::getTable('GlobalSMS')->findByUnread(0);
		$this->read   = Doctrine::getTable('GlobalSMS')->findByUnread(1);
	}
	
	public function executeView(sfWebRequest $request){
		$this->sms = Doctrine::getTable('GlobalSMS')->find($request->getParameter('id'));
		$this->forward404Unless($this->sms);
		$this->sms->unread = false;
		$this->sms->save();
	}

	public function executeGetMessage(sfWebRequest $request){
		$g = new GlobalSMS();
		$g->sender = $request->getParameter('from');
		$g->text = $request->getParameter('subject');
		$g->unread = true;
		$g->save();
	}
}
