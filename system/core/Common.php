<?php
defined('BASEPATH') or exit("Direct script access is not allowed");

if(!function_exists('load_class')){
	function &load_class($class, $params = NULL){
		static $_classes = array();
		$name = FALSE;
		$class = ucwords($class);
		foreach (array(APP.'/libraries', SYSTEM.'/libraries') as $path)
		{
			if (file_exists($path.'/'.$class.'.php'))
			{
				$name = $class;

				if (class_exists($name, FALSE) === FALSE)
				{
					require_once($path.'/'.$class.'.php');
				}

				break;
			}
		}
		if($name == FALSE){
			exit("Class '".$class."' does not exist");
		}
		$_classes[$class] = isset($param)
			? new $name($param)
			: new $name();
		return $_classes[$class];
	}
}

?>
