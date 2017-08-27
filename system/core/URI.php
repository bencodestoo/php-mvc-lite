<?php
defined('BASEPATH') or exit("Direct script access is not allowed");

function _get_urlsegments(){
	
	// Expected URL : https://example.com/index.php/controller/method/param1/param2
	
	$url = explode('/', $_SERVER['REQUEST_URI']);
	$url = array_diff($url, array('', 'index.php'));
	$url = array_values($url);
	
	//Get controller and controller method
	$_controller = isset($url[0]) ? $url[0] : NULL;
	$_method = isset($url[1]) ? $url[1] : NULL;
	
	
	unset($url[0], $url[1]);
	
	//Get controller method params. 
	$_params = array_values($url);
	return (object) array('controller' => ucfirst($_controller), 'method' => $_method, 'params' => $_params);
}
?>
