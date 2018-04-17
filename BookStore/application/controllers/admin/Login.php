<?php
/**
* 
*/
class Login extends MY_Controller
{
	
	function index()
	{
		//echo $this->uri->segment(1);
		$this->load->view('admin/login/index');
	}
}

?>