<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller {
	
	public $segment;
	public $func;
	public $args;
	private static $instance;

	public function __construct()
	{
		self::$instance =& $this;
		//Initialize loader, to access it in controllers like $this->loader->$category($file)
		$this->load =& load_class('Loader');
		$this->config = $this->load->config('config');
		$this->load->library('output');

	}
	public static function &get_instance()
	{
		return self::$instance;
	}

}
