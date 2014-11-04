<?php

if (!defined(_ACCESS_FILE))
{
	header('HTTP/1.0 403 Forbidden');
	exit("direct access not permitted");
}

$mem = null;

if ( ($mem_host = config(_CACHE_HOST)) && ($mem_port = config(_CACHE_PORT)) ) {
	
	$mem = new Memcached;
	
	$mem->addServer(config(_CACHE_HOST), config(_CACHE_PORT));
}

function memset($key, $value, $timeout = 0) {
	
	global $mem;
	
	if (is_null($mem)) {
		return false;
	}
	
	$key = _CACHE_PREFIX . md5($key);
	
	return $mem->set($key, $value, $timeout);
}

function memget($key, $default = false) {
	
	global $mem;
	
	if (is_null($mem)) {
		return false;
	}
	
	$key = _CACHE_PREFIX . md5($key);
	
	$value = $mem->get($key);
	
	return is_null($value) ? $default : $value;
}

function memdel($key) {
	
	global $mem;
	
	if (is_null($mem)) {
		return false;
	}
	
	$key = _CACHE_PREFIX . md5($key);
	
	return $mem->delete($key);
}