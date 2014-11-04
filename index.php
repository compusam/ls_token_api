<?php

define('_ACCESS_FILE', 'true');

define('ROOT', dirname(__DIR__) . '/ls_token_api');

require ROOT . '/app/autoload.php';

$app = require_once ROOT . '/app/start.php';

$app->map(
	'/',
	function () use ($app) {

		$app->render('main.php');
	}
)->via('GET')->name('index');

// not found (custom 404)
$app->notFound(function () use ($app) {
	
	$app->render('404.php');

});

$app->run();