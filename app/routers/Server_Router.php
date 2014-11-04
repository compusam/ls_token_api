<?php

if (!defined(_ACCESS_FILE)) 
{
  header('HTTP/1.0 403 Forbidden');
  exit("direct access not permitted");
}

$app->map(
    '/server/getStatus',
    function () use ($app) {

    	$app->response()->header('Content-Type', 'application/json');

    	echo json_encode(Server_Controller::getStatus());
        
    }    
)->via('GET')->name('getStatusServers');


$app->map(
	'/server/getToken',
	function () use ($app) {

		$app->response()->header('Content-Type', 'application/json');

		Server_Controller::getToken();

	}
)->via('POST')->name('getNewToken');


$app->map(
	'/server/checkToken',
	function () use ($app) {

		$app->response()->header('Content-Type', 'application/json');

		Server_Controller::checkToken();

	}
)->via('POST')->name('checkIsValidToken');