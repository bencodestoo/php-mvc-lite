<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller {

	private static $instance;

	public function __construct()
	{
		self::$instance =& $this;
		//Initialize loader, to access it in controllers like $this->loader->$category($file)
		$this->load =& load_class('Loader');
		//$this->load->theme('default');

	}
	public static function &get_instance()
	{
		return self::$instance;
	}

}
