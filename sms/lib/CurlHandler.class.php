<?php
class CurlHandler
{
	protected $con;
		
	public function __construct($url)
	{
		$this->con= curl_init($url);
	}

	
	public function readCookie($name)
	{
		curl_setopt($this->con,CURLOPT_COOKIEFILE,$name);
	}
	
	public function setCookie($name)
	{
		curl_setopt($this->con,CURLOPT_COOKIEJAR,$name);
	}
	
	public function postData($post_data) 
	{
		curl_setopt($this->con,CURLOPT_POSTFIELDS,$post_data);
	}
	
	
	public function execute()
	{
		curl_setopt($this->con,CURLOPT_RETURNTRANSFER,true);
		return curl_exec($this->con);
	}
	
	
	public function close()
	{
		curl_close($this->con);
	}

}

