<?php

/**
* 
*/
class Logout extends MY_Controller
{
	
	function index()
	{
		if(isset($_SESSION['user']))
		{
			$data= array();
			$this->session->unset_userdata('user');
			//echo "<script> alert('You logged out');</script>";
			redirect(base_url());
		}
	}
}
	/*if(isset($_SESSION['user']))
	{
		$data= array();
		$this->session->unset_userdata('user');
		$data['temp']= 'site/home/index';
		$this->load->view('site/layout',$data);
	}*/
?>