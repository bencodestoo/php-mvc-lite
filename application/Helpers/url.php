<?php
function get_ben(){
	echo "Hello Ben. This text is from a Helper located in: application/Helpers/url.php";
}

function site_url($params = NULL){
	$APP =& get_instance();
	return $APP->config->site_url.'/'.$params;
}

function get_active_controller(){
	$APP =& get_instance();
	return $APP->segment;
}

function get_active_method(){
	$APP =& get_instance();
	return $APP->func;
}

function get_active_method_args(){
	$APP =& get_instance();
	return $APP->args;
}
?>
