<?php
/**
* 
*/
class Admin extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_Model');
	}

	function index()
	{
		$input= array();
		$list= $this->Admin_Model->get_list($input);
		$this->data['list']= $list;
		$total = $this->Admin_Model->get_total();
		$this->data['total']= $total;
		$this->data['temp'] = 'admin/admin/index';

		$message = $this->session->flashdata('message');
		$this->data['message']= $message;

		$this->load->view('admin/main',$this->data);
	}
	function load_add_view()
	{
		$this->data['temp']= 'admin/admin/addemployee';
		$this->load->view('admin/main',$this->data);
	}
	/*
	* kiem tra username ton tai hay chua
	*/
	function check_username()
	{
		$username= $this->input->post('username');
		$where= array();
		$where['username']= $username;
		if($this->Admin_Model->check_exists($where))
		{
			$this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
			return FALSE;
		}
		return true;
	}

	/*
	* Thuc hien them du lieu
	*/
	function add()
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
		$this->form_validation->set_rules('email','Email', 'required|valid_email');
		$this->form_validation->set_rules('phone','Số điện thoại', 'required|numeric');
		$this->form_validation->set_rules('position','Vị trí', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->data['temp']= 'admin/admin/addemployee';
			$this->load->view('admin/main',$this->data);
		}
		else
		{
			$input = array('username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'Name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'phonenumber' => $this->input->post('phone'),
				'position' => $this->input->post('position')
			);

			//$result = $this->Admin_Model->create($input);

			if($this->Admin_Model->create($input))
			{
				$this->session->set_flashdata('message','Thêm mới thành công');
			}
			else
			{
				$this->session->set_flashdata('message','Thêm mới thất bại');
			}

			redirect(base_url('admin/admin'));
		}
	}

	function load_edit()
	{
		$id= $this->uri->segment(4);
		$info = $this->Admin_Model->get_info($id);
		$this->data['info']= $info;


		$this->data['temp']= 'admin/admin/editemployee';
		$this->load->view('admin/main',$this->data);
	}

	function edit()
	{
		$id= $this->uri->segment(4);
		$info = $this->Admin_Model->get_info($id);
		$this->data['info']= $info;

		$this->load->library('form_validation');
		$this->load->helper('form');

		
		$this->form_validation->set_rules('name','Họ tên', 'required');
		$this->form_validation->set_rules('address','Địa chỉ', 'required');
		$this->form_validation->set_rules('email','Email', 'required|valid_email');
		$this->form_validation->set_rules('phone','Số điện thoại', 'required|numeric');
		$this->form_validation->set_rules('position','Vị trí', 'required');

		$password= $this->input->post('password');
		if($password)
		{
			$this->form_validation->set_rules('password','Mật khẩu', 
				'required|min_length[6]');
			$this->form_validation->set_rules('repassword','Nhập lại mật khẩu', 
			'required|matches[password]');
		}
		$username= $this->input->post('username');
		if($username != $info->username)
		{
			$this->form_validation->set_rules('username','Tên đăng nhập', 
			'required|callback_check_username');
		}

		if($this->form_validation->run() == FALSE)
		{
			$this->data['temp']= 'admin/admin/editemployee';
			$this->load->view('admin/main',$this->data);
		}
		else
		{
			$input = array(
				'Name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'phonenumber' => $this->input->post('phone'),
				'position' => $this->input->post('position')
			);
			/*'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),*/
			if($password)
			{
				$input['password']= $password;
			}
			if($this->Admin_Model->update($info->idemployee,$input))
			{
				$this->session->set_flashdata('message','Cập nhật thành công');
			}
			else
			{
				$this->session->set_flashdata('message','Cập nhật thất bại');
			}

			redirect(base_url('admin/admin'));
		}
	}


}
?>