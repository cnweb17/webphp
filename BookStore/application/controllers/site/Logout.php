<?php

/**
* 
*/
class Logout extends MY_Controller
{
	
	function index()
	{
		
		if($this->session->userdata('login'))
		{
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('username_logged_in');
		}

		redirect(base_url());
	}
}
?>