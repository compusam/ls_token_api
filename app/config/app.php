<?php

if (!defined(_ACCESS_FILE)) 
{
  header('HTTP/1.0 403 Forbidden');
  exit("direct access not permitted");
}

/*
* (Slim) Application Config
*/

define('_APP_NAME', 'Token');

define('_APP_COOKIE_LIFE', '20 minutes');

define('_TIME_ZONE', 'America/Mexico_City');

define('_OAUTH_INTERVAL', '60');

define('SLIM_MODE_DEV', 'development');

define('SLIM_MODE_PRO', 'production');

define('SLIM_MODE', SLIM_MODE_DEV);

return array(
    'mode' => SLIM_MODE,
	'debug' => false,
    'cookies.encrypt' => SLIM_MODE !== SLIM_MODE_DEV,
    'cookies.path' => ROOT . '/app/cookies',
    'cookies.lifetime' => _APP_COOKIE_LIFE,
    'cookies.secret_key' => md5('appsecretkey'),
    'http.version' => '1.0',
    'templates.path' => ROOT . '/app/views',   
    'debug' => SLIM_MODE === SLIM_MODE_DEV,
    'log.enabled' => SLIM_MODE === SLIM_MODE_DEV,
    'log.level' => 4,
    'log.path' => ROOT . '/app/logs'
);