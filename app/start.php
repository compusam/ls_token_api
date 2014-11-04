<?php

if (!defined(_ACCESS_FILE)) 
{
  header('HTTP/1.0 403 Forbidden');
  exit("direct access not permitted");
}

require_once ROOT . '/core/Slim/Slim.php';
require_once ROOT . '/app/config/db.php';
require_once ROOT . '/app/dbloader.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(require_once ROOT . '/app/config/app.php');	

$app->setName(_APP_NAME);

date_default_timezone_set(_TIME_ZONE);

// For native PHP session
session_cache_limiter(false);
session_start();

$resourceUri = $_SERVER['REQUEST_URI'];

$rootUri = $app->request()->getRootUri();

$assetUri = $rootUri;

$app->view()->appendData(
	array(	'app' => $app,
	'rootUri' => $rootUri,
	'assetUri' => $assetUri,
	'resourceUri' => $resourceUri
));

// Determine method to create UUIDs
$app->uuid = function () {
    return exec('uuidgen');
};

foreach(glob(ROOT . '/app/routers/*.php') as $router) {
	include $router;
}	
          
return $app;