<?php

/**
 * Person
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Person extends BasePerson
{
	public function getName(){
		return "{$this->first_name} {$this->last_name}";
	}
	public static function getInstanceByFirstNAndLastName($fName,$lName){
		return  Doctrine_Query::create()
				->select('p.*')
				->from('Person p')
				->where('p.first_name = ?', $fName)
				->andWhere('p.last_name = ?', $lName)
				->fetchOne();
	}
	public function __toString(){
		return "{$this->name} ({$this->phone})";
	}
}
