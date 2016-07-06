<?php
class EMail{
	private static function _send($email, $subject, $text){
		$fh = fopen("/log/email_log.txt", 'a');
		fwrite($fh, "Email sent to $email (".substr($subject, 0, 5).")\n");
		fclose($fh);
		
		$email = new activeMailLib();
		$email->From("r.jahande@gmail.com");
		$email->To($email);
		$email->Subject($subject);
		$email->Message($text);
		$email->Send();
		return true; //TODO verify send
	}
	
	public static function send($pql, $subject, $text){
		foreach ($pql->data['phones'] as $phone){
			EMail::_send($phone, Parser::process($subject), Parser::process($text));
		}
		foreach ($pql->data['people'] as $p){
			EMail::_send($p->email, Parser::process($subject, $p), Parser::process($text, $p));
		}
		foreach ($pql->data['groups'] as $g){
			foreach ($g->People as $p)
				Email::_send($p->email, Parser::process($subject, $p), Parser::process($text, $p));
		}
	}
}
