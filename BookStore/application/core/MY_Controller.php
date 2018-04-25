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
					$this->_check_login();
					break;
				
				default:
					//xu li ngoai admin
					break;
			}
		}

		function _check_login()
		{
			$crl = $this->uri->segment(2);
			$login = $this->session->userdata('admin_login');

			if(($login!= 'ok')&& ($crl != 'login'))
			{
				redirect(base_url('admin/login'));
			}
			if(($login == 'ok') && ($crl == 'login'))
			{
				redirect(base_url('admin/home'));
			}
		}

	}






?>