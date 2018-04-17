<?php
	/**
	* 
	*/
	class MY_Controller extends CI_Controller
	{
		var $data = array();
		function __construct()
		{
			parent::__construct();

			$controller= $this->uri->segment(1);
			
			switch ($controller) {
				case 'admin':
					//xu li du lieu khi truy cap vao trang admin
					break;
				
				default:
					//xu li ngoai admin
					break;
			}
		}

		function check_admin()
		{
			
		}

	}






?>