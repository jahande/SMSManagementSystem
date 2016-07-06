<?php

require_once dirname(__FILE__).'/../lib/personManagingGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/personManagingGeneratorHelper.class.php';

/**
 * personManaging actions.
 *
 * @package    sms
 * @subpackage personManaging
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class personManagingActions extends autoPersonManagingActions
{
	public function executeExportPhoneNumbers(sfWebRequest $request){
		$this->address = 'personManaging/exportPhoneNumbers';
		//return sfView::SUCCESS;
		$groupId = $request->getParameter('groupId','-2');
		$this->link = true;
		
		$this->groups =  GroupTable::getInstance()->getAllAsArray();
		if($groupId=='-1'){
			$this->people = PersonTable::getInstance()->findAll();
		}
		else if($groupId!='-2'){
			$g = GroupTable::getInstance()->findOneById(0+$groupId);
			$this->people = $g->getPeople();
		}else{
			$this->link = false;
		}
		$this->phoneNumbersString = '';
		if($this->link){
			$this->makeString();
			//$this->writeResultToFile($this->phoneNumbersString);
		}
		return sfView::SUCCESS;
	}
	public function executeGiveFile(sfWebRequest $request){
		return sfView::SUCCESS;
	}
	private function makeString(){
		foreach ($this->people as $person) {
			//$person = new Person();
			$this->phoneNumbersString .= $person->getId().'-'.$person->getFirstName().' '.$person->getLastName().' '. $person->getPhone()."\n";
		}
	}
	private function writeResultToFile($string){
		$myFile = "../lib/rj/testFile.txt";
		//$myFile = "testFile.txt";
		$fh = fopen($myFile, 'w') or die("can't open fffffffffffile");
		//$stringData = "Floppy Jalopy\n";
		fwrite($fh, $string);
		//$stringData = "Pointy Pinto\n";
		//fwrite($fh, $stringData);
		fclose($fh);
	}
}
