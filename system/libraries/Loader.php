<?php
class Loader {
	protected $ob_level;
	
	public function library($class, $config = NULL){
		static $_classes = array();
		$name = FALSE;
		$class = ucwords($class);
		foreach (array(APP.'/Libraries', SYSTEM.'/libraries') as $path)
		{
			if (file_exists($path.'/'.$class.'.php'))
			{
				$name = $class;

				if (class_exists($class, FALSE) === FALSE)
				{
					require_once($path.'/'.$class.'.php');
				}

				break;
			}
		}
		if($name == FALSE){
			exit("Class '".$class."' does not exist");
		}
		$APP =& get_instance();
		$class = strtolower($class);
		return $APP->$class = isset($config)
			? new $class($config)
			: new $class();
	}
	
	public function helper($helpers = array()){
		is_array($helpers) OR $helpers = array($helpers);
		foreach($helpers as &$helper){
			$helper = strtolower($helper);
			foreach (array(HELPERS, SYSTEM.'/helpers') as $path)
			{
				if (file_exists($path.'/'.$helper.'.php'))
				{
					include_once($path.'/'.$helper.'.php');
					break;
				}else{
					die("Helper '".$helper."' was not found");
				}
			}
		}
	}
		
	public function model($name){
		echo "Loading model '".$name."'. Find this class in ".dirname(__FILE__);
	}
		
	public function view($name, $data = NULL){
		//echo "Loading view ".$name.". Find this class in ".dirname(__FILE__);
		$view_path = VIEWS;
		if(!file_exists($view_path.'/'.$name.'.php')){
			die("View file named '".$name."' does not exist");
		}
		$APP =& get_instance();
		$file = $view_path.'/'.$name.'.php';
		ob_start();

		include($file); // include() vs include_once() allows for multiple views with the same name

		if (ob_get_level() > $this->ob_level + 1)
		{
			ob_end_flush();
		}
		else
		{
			$APP->output->append_output(ob_get_contents());
			@ob_end_clean();
		}

		return $this;
	}
		
	public function config($name){
		//echo "Loading view ".$name.". Find this class in ".dirname(__FILE__);
		if(!file_exists(BASEPATH.DIRECTORY_SEPARATOR.'Config/'.$name.'.php')){
			die("Configuration file '".$name."' does not exists");
		}
		require_once(BASEPATH.DIRECTORY_SEPARATOR.'Config/'.$name.'.php');
		if(!isset($config) || !is_array($config)){
			die("Configuration file '".$name."' exists but does not implement the config array");
		}
		
		return (object) $config;
	}
}
?>
