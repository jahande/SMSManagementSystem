<?php
class RJUtils{
	public static function getModuleFromCode($code){
		return Program::getTypeByCode($code);
		return 'poll';
	}
	public static function getNowTimestamp($alterSeconds=null) {
		if(!$alterSeconds){
			return date('Y-m-d H:i:s');
		}else{
			return date('Y-m-d H:i:s', time() +$alterSeconds);
		}

	}
	public static function sendResponse($phoneNumber,$code,$tableInstance){
		//$senderPerson  = PersonTable::getInstance()->findOneByPhone($senderNumber);
		$response = $tableInstance->findOneByCode($code)->Responder->getText();
		$pql = new PQL($phoneNumber);
		SMS::send($pql,$response);
	}
	public static function sendSave($to,$text,$time){
		$log = new Sent();
		$log->sender = 'get sf user';
		$log->text = $send['message'];
		$log->receiver = $to;
			
			
		$log->Status = Doctrine::getTable('Status')->findOneByName('Later');
		$log->send_date = $time;
	}
	public static function startDownload($fullPath){
		//echo $fullPath;
		if ($fd = fopen ($fullPath, "r")) {

			$fsize = filesize($fullPath);
			$path_parts = pathinfo($fullPath);
			$ext = strtolower($path_parts["extension"]);
			switch ($ext) {
				case "pdf":
					header("Content-type: application/pdf"); // add here more headers for diff. extensions
					header("Content-Disposition: attachment; filename=\"".$fullPath."\""); // use 'attachment' to force a download
					break;

				case "jar":
					header("Content-type: application/jar"); // add here more headers for diff. extensions
					header("Content-Disposition: attachment; filename=\"".$fullPath."\""); // use 'attachment' to force a download
					break;

				default:
					header("Content-type: application/octet-stream");
					header("Content-Disposition: filename=\"".$fullPath."\"");
			}
			header("Content-length: $fsize");
			header("Cache-control: private"); //use this to open files directly
			while(!feof($fd)) {
				$buffer = fread($fd, 8);
				echo $buffer;
			}
			fclose ($fd);
		}

		//	exit;
	}
}