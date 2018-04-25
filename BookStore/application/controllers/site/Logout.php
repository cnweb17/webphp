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
		}

		redirect(base_url());
	}
}
?>