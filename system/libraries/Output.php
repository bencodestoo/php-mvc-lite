<?php
class Output {
	public $final_output;
	
	public function append_output($output)
	{
		$this->final_output .= $output;
		return $this;
	}
}
?>
