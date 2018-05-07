<?php
/**
* 
*/
class Login extends MY_Controller
{
	
	function index()
	{
		$this->load->view('admin/login/index');
	}

	function check_login()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model('admin/Admin_Model');
		$where= array('username' => $username, 'password' => md5($password));

		if($this->Admin_Model->check_exists($where))
		{
			$this->session->set_userdata('admin_login', 'ok');
			redirect(base_url('admin/transaction'));
		}
		else
		{
			$data= array();
			$data['error'] = "Đăng nhập thất bại!";
			$this->load->view('admin/login/index',$data);
		}
	}
	
}

?>