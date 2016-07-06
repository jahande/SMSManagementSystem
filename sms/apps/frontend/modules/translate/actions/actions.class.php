<?php

/**
 * translate actions.
 *
 * @package    sms
 * @subpackage translate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class translateActions extends sfActions
{
	public function translate($text, $senderPhone){
		$url = "http://translate.google.com/translate_a/t?client=t&text=".urlencode($text)."&hl=en&sl=en&tl=ar&multires=1&otf=1&sc=1";
		$c = new curlHandler($url);
		$j = json_decode($c->execute(), true);
		
		$result = $j['0']['0']['0'];

		SMS::send($senderPhone, $result);
		
		return $this->renderText("<h1>Translation Processed</h1><p>$result</p>");
	}
	
	public function executeGetMessage(sfWebRequest $request){
		$this->translate($request->getParameter('subject'), $request->getParameter('from'));
	}
}
