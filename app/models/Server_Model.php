<?php

if (!defined(_ACCESS_FILE)) 
{
  header('HTTP/1.0 403 Forbidden');
  exit("direct access not permitted");
}

class Server_Model {
	
	public function getStatus ()
	{
		$status = array(
				'date' => date('d/m/Y h:i:s a', time()),
				);

		return $status;
	}

	public function getToken ()
	{
		require_once ROOT . '/app/system/helpers/OAuth2_Helper.php';
		
		$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();
	}
	
	public function checkToken ()
	{
		require_once ROOT . '/app/system/helpers/OAuth2_Helper.php';

		if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
		    $server->getResponse()->send();
		    die;		    
		}		
		
		echo json_encode(array('code' => 0, 'response' => true, 'message' => null));
	}
	
}