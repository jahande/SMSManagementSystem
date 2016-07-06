<?php
class PQL{
	public $data;

	public function __toString(){
		if (!isset($this->data['groups'])) $this->data['groups'] = array();
		if (!isset($this->data['people'])) $this->data['people'] = array();
		if (!isset($this->data['phones'])) $this->data['phones'] = array();
		$a = array();
		foreach ($this->data['groups'] as $group){
			$g = Doctrine::getTable('Group')->find($group->id);
			array_push($a, ".{$g->name}");
		}
		foreach ($this->data['people'] as $person){
			$p = Doctrine::getTable('Person')->find($person->id);
			array_push($a, "#{$p->last_name}");
		}
		foreach ($this->data['phones'] as $phone){
			array_push($a, "{$phone}");
		}
		return implode(',', $a);
	}

	public function __construct($string){
		$this->data = array('groups'=>array(), 'people'=>array(), 'phones'=>array());
		$a = explode(',', $string);
		foreach ($a as $s){
			if (strpos($s, '.')===0){
				$this->data['groups'][] = Doctrine::getTable('Group')->findOneByName(substr($s, 1));
			}
			else if (strpos($s, '#')===0){
				$this->data['people'][] = Doctrine::getTable('Person')->findOneByLastName(substr($s, 1));
			} else {
				$this->data['phones'][] = $s;
			}
		}
	}
	
	public function isPersonAuthorized($person){
		return (array_search($person->name, $this->data['people'])!==false) ||
		(array_search($person->Group->name, $this->data['groups'])!==false);
	}
	
	public static function formatString($pql){
		//FIXME type check PQL
		return $pql;
	}
	
	public static function create($groups = array(), $people=array(), $phones=array()){
		$a = array();
		foreach ($groups as $group){
			$g = Doctrine::getTable('Group')->find($group);
			array_push($a, ".{$g->name}");
		}
		foreach ($people as $person){
			$p = Doctrine::getTable('Person')->find($person);
			array_push($a, "#{$p->last_name}");
		}
		foreach ($phones as $phone){
			array_push($a, "{$phone}");
		}
		return new PQL(implode(',', $a));
	}
}