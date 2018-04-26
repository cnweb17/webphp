<?php
/**
* 
*/
class Signup extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_Model');
	}

	function index()
	{
		$this->data['temp'] = 'site/signup/index';
		$this->load->view('site/layout',$this->data);
	}

	function signup()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('username','Tên đăng nhập', 
			'required|callback_check_username');
		$this->form_validation->set_rules('password','Mật khẩu', 'required|min_length[6]');
		$this->form_validation->set_rules('repassword','Nhập lại mật khẩu', 
			'required|matches[password]');
		$this->form_validation->set_rules('name','Họ tên', 'required');
		$this->form_validation->set_rules('address','Địa chỉ', 'required');
		$this->form_validation->set_rules('birthday','Ngày sinh', 'required');
		$this->form_validation->set_rules('phone_number','Số điện thoại', 'required|numeric');


		if($this->form_validation->run() == FALSE)
		{
			$this->data['temp']= 'site/signup/index';
			$this->load->view('site/layout',$this->data);
		}
		else
		{
			
			$input = array('username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'name' => $this->input->post('name'),
				'address' =>$this->input->post('address'),
				'phone_number' => $this->input->post('phone_number'),
				'birthday' => $this->input->post('birthday')

			);

			//$result = $this->Admin_Model->create($input);

			if($this->Customer_Model->create($input))
			{
				$this->session->set_flashdata('message','Đăng kí thành công');
			}
			else
			{
				$this->session->set_flashdata('message','Đăng kí thất bại');
			}

			redirect(base_url());
			
		}
	}

	function check_username()
	{
		$username= $this->input->post('username');
		$where= array();
		$where['username']= $username;
		if($this->Customer_Model->check_exists($where))
		{
			$this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
			return FALSE;
		}
		return true;
	}
}
?>