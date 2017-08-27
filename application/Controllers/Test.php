<?php
class Test extends Controller {
	
	public function index(){
		echo "Testing complete from controller Test, method index()";
	}
	
	public function testing($name, $age, $location){
		$this->load->helper('url');
		echo '<h1>PHP MVC Lite</h1>';
		echo "This is an example to show args sent to a method from the URI";
		echo "<br />The following args are from the URL. Still, there's alot to do<br /><hr />";
		echo $name.'<br/>';
		echo $age.'<br/>';
		echo $location.'<br/>';
		echo '<a href="'.site_url('home').'">Back Home</a>';
	}
}
?>
