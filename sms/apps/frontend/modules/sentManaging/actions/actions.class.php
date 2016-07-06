<?php

require_once dirname(__FILE__).'/../lib/sentManagingGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sentManagingGeneratorHelper.class.php';

/**
 * sentManaging actions.
 *
 * @package    sms
 * @subpackage sentManaging
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sentManagingActions extends autoSentManagingActions
{
	public function executeBatchResend(sfWebRequest $request)
	{

		$ids = $request->getParameter('ids');
		$toResends = SentTable::getInstance()->findById($ids);
		foreach ($toResends as $toResend) {
			//$toResend->resend();
		}
		$this->getUser()->setFlash('notice', 'The selected items have been resent successfully.');
	}
	public function executeBatchSendByEmail(sfWebRequest $request)
	{
		//$s = new Sent();
		$ids = $request->getParameter('ids');
		$toResends = SentTable::getInstance()->findById($ids);
		foreach ($toResends as $toResend) {
			$toResend->email();
		}
		$this->getUser()->setFlash('notice', 'The selected items have been mailed successfully.');
	}
}
