<?php
class Schedule{
	public static function check(){
		$now = RJUtils::getNowTimestamp();
		
		$lid = Doctrine::getTable('Status')->findOneByName('Later')->id;
		$queue = Doctrine::getTable('Sent')->findByStatusId($lid);
		foreach ($queue as $q){
			if ($q->send_date > $now) continue;
			$q->Status = Doctrine::getTable('Status')->findOneByName('Sent');
			SMS::send(new PQL($q->receiver), $q->text);
			$q->save();
		}
		
		$queue = Doctrine::getTable('Contest')->findByAutoResult(1);
		foreach ($queue as $q){
			if (($q->performed) || ($q->end > $now)) continue;
			echo "<p><a href='".url_for("contest/perform")."/{$q->id}'>A contest is finished...</a></p>";
		}
	}
}