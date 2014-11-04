<?php

if (!defined(_ACCESS_FILE)) 
{
  header('HTTP/1.0 403 Forbidden');
  exit("direct access not permitted");
}

class Server_Controller {

	public function getStatus ()
	{       		
		return Server_Model::getStatus();
	}
	
	public function getToken ()
	{
		return Server_Model::getToken();
	}
	
	public function checkToken ()
	{
		return Server_Model::checkToken();
	}
}