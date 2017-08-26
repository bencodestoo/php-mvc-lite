<?php
class Home extends Controller {
	public function index(){
		echo "<h1>PHP MVC Lite</h1>";
		echo "You're seeing this text from application/Controllers/Home.php <br/>";
		echo '<a href="home/test">Test</a>';
	}
	
	public function test(){
		echo "<h1>PHP MVC Lite</h1>";
		echo "You're seeing this text from application/Controllers/Home.php in the test() function<br/>";
	}
}
?>
