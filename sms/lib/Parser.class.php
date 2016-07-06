<?php
class Parser{
	public static function process($text, $person){
		if (!isset($person)){
			return $text;
		}
		$patterns = Doctrine::getTable('pattern')->findAll();
		foreach ($patterns as $p){
			$text = str_replace("#{$p->text}#", $person[$p->field], $text);
		}
		return $text;
	}
}