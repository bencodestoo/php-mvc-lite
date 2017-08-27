<?php
	defined('BASEPATH') or exit("Direct script access is not allowed");

	if(file_exists(BASEPATH.'/config.php')){
		require 'config.php';
	}else{
		die("Configuration file is not available");
	}

	include(CORE.'/Common.php');
	include(CORE.'/URI.php');
	include(CORE.'/Controller.php');

	function &get_instance()
	{
		return Controller::get_instance();
	}

	$_url = _get_urlsegments();

	// WORKING WITH CONTROLLERS
	if($_url->controller == NULL){
		$_url->controller = "Home";
	}
	$controller = APP . '/Controllers/'.$_url->controller.'.php';
	if(!file_exists($controller)){
		die("Controler '".$_url->controller."' does not exist");
	}
	require_once($controller);
	if(!class_exists($_url->controller)){
		die("Controler '".$_url->controller."' does not have class '".$_url->controller."'");
	}

	// WORKING WITH METHODS
	if($_url->method == NULL){
		$_url->method = "index";
	}
	$method = "";
	$method .= $_url->method;
	
	$controller = new $_url->controller();
	
	//SET UP CURRENT URLS
	$controller->segment = $_url->controller;
	$controller->func = $method;
	$controller->args = implode(',', $_url->params);
	// WORKING WITH PARAMS
	if(isset($_url->params)){
		call_user_func_array(array($controller, $method), $_url->params);
		
	}else{
		$controller->$method();
	}
?>
