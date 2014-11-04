<?php

if (!defined(_ACCESS_FILE)) 
{
  header('HTTP/1.0 403 Forbidden');
  exit("direct access not permitted");
}

spl_autoload_register(function ($class) {
	
	/*if (0 !== strpos($class, '_Model') || 
		0 !== strpos($class, '_Controller') ||
		0 !== strpos($class, '_System')) {
		return;
	}*/
		
	if (is_file($file = ROOT . '/app/models/' . $class . '.php') || 
		is_file($file = ROOT . '/app/controllers/' . $class . '.php') ||
		is_file($file = ROOT . '/app/system/helpers/' . $class . '.php') ||
		is_file($file = ROOT . '/app/system/objects/' . $class . '.php') ||
		is_file($file = ROOT . '/app/' . $class . '.php')) {			
		require $file;
	}
});
