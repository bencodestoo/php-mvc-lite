<?php
defined('BASEPATH') or exit("Direct script access is not allowed");

if(!function_exists('load_class')){
	function &load_class($class, $params = NULL){
		static $_classes = array();
		$name = FALSE;
		$class = ucwords($class);
		foreach (array(APP.'/Libraries', SYSTEM.'/libraries') as $path)
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

if ( ! function_exists('get_config'))
{
	function &get_config()
	{
		static $config;

		if (empty($config))
		{
			$file_path = BASEPATH.'config/config.php';
			$found = FALSE;
			if (file_exists($file_path))
			{
				$found = TRUE;
				require($file_path);
			}

			if (file_exists($file_path = BASEPATH.'/config/config.php'))
			{
				require($file_path);
			}
			elseif ( ! $found)
			{
				set_status_header(503);
				echo 'The configuration file does not exist.';
				exit(); // EXIT_CONFIG
			}

			// Does the $config array exist in the file?
			if ( ! isset($config) OR ! is_array($config))
			{
				set_status_header(503);
				echo 'Your config file does not appear to be formatted correctly.';
				exit(); // EXIT_CONFIG
			}
		}

		return $config;
	}
}
?>
