<?php

if (!defined(_ACCESS_FILE)) 
{
  header('HTTP/1.0 403 Forbidden');
  exit("direct access not permitted");
}

/**
* Database Config
*/

define('_DRIVER', 'mysql');

define('_HOST', 'localhost');

define('_BASE', 'ls_token_api');

define('_USER', 'root');

define('_PASSWORD', 'toor');

define('_CHARSET', 'utf8');

define('_COLLATION', 'utf8_general_ci');

define('_PREFIX', '');

define('_INTERVAL', 'INTERVAL 30 MINUTE');

define('_LIMIT', 'LIMIT 5');