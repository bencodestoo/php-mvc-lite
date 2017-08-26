<?php
class Loader {
	public function library($name){
		echo "Loading library ".$name.". Find this class in ".dirname(__FILE__);
	}
	
	public function helper($name){
		echo "Loading Helper ".$name.". Find this class in ".dirname(__FILE__);
	}
		
	public function model($name){
		echo "Loading model ".$name.". Find this class in ".dirname(__FILE__);
	}
		
	public function view($name){
		echo "Loading view ".$name.". Find this class in ".dirname(__FILE__);
	}
}
?>
