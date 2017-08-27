<?php
/****************************************
 * 
 * This class is loaded if no controller
 * has been specified in the URL
 * 
 * **************************************/
 
 
class Home extends Controller {
	
	public function index(){
		//~ $this->load->library('test');
		//~ echo $this->test->echo_it("Benja");
		$this->load->helper(array('url'));
		$this->load->view('home');
		$this->load->view('test');
		$this->load->view('footer');
	}
	
	public function test(){
		$this->load->helper(array('url'));
		echo "<h1>PHP MVC Lite</h1>";
		echo "You're seeing this text from application/Controllers/Home.php in the test() function<br/>";
		echo '<a href="'.site_url('home').'">Home</a>';
	}
}
?>
