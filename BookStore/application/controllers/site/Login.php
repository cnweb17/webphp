<?php
/**
* 
*/
class Login extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_Model');
	}

	function index()
	{
		if($this->session->userdata('login') == NULL)
		{
			$this->data['temp']= 'site/login/index';
			$this->load->view('site/layout',$this->data);
		}
		else
		{
			redirect(base_url());
		}
	}
	
	function check_login()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		if($this->input->post('submit'))
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$where= array('username' => $username, 'password' => md5($password));

			if($this->Customer_Model->check_exists($where))
			{
				//$this->session->set_userdata('admin_login', 'ok');
				$input= array('username' => $username); 
				$info = $this->Customer_Model->get_info_rule($input);
				$this->session->set_userdata('login', $info->name);

				redirect(base_url());
			}
			else
			{
				$this->data['error'] = 'Đăng nhập thất bại';
				$this->data['temp']= 'site/login/index';

				$this->load->view('site/layout',$this->data);

			}
		}
		else
		{
			redirect(base_url());
		}
	}
	
}

?>