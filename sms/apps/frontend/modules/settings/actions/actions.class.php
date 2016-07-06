<?php

/**
 * settings actions.
 *
 * @package    sms
 * @subpackage settings
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class settingsActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->address = 'settings/index';
		// $this->forward('default', 'module');
		$l = $request->getParameter('language');
		if(isset($l) && $l!=''){
			$this->getResponse()->setCookie('languageC',$l );
			$this->getUser()->setCulture($l);
		}
		//$this->getUser()->setCulture('fa_IR');
		return sfView::SUCCESS;
	}
}
