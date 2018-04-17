<?php

	/**
	* 
	*/
	class Home extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$data= array();
			$data['temp']= 'site/home/index';
			$this->load->view('site/layout',$data);
		}
	}
?>