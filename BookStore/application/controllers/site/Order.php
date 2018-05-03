<?php
/**
* 
*/
class Order extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('login') == NULL)
		{
			redirect(base_url('site/login'));
		}
		
	}

	function index()
	{

		$carts = $this->cart->contents();
		$total_items = $this->cart->total_items();
		if($total_items <= 0 )
		{
			redirect();
		}

		$username= $this->session->userdata('username_logged_in');
		//echo $username;
		$this->load->model('Customer_Model');
		$where=  array('username'=> $username);
		$info = $this->Customer_Model->get_info_rule($where);
		$this->data['info'] = $info;


		$this->data['temp'] = 'site/order/index';
		$this->load->view('site/layout',$this->data);
	}

	function checkout()
	{

		$username= $this->session->userdata('username_logged_in');
		//echo $username;
		$this->load->model('Customer_Model');
		$where=  array('username'=> $username);
		$info = $this->Customer_Model->get_info_rule($where);
		$this->data['info'] = $info;

		$this->load->library('form_validation');
		$this->load->helper('form');

		
		$this->form_validation->set_rules('name','Họ tên', 'required');
		$this->form_validation->set_rules('phone_number','Số điện thoại','required|numeric');
		$this->form_validation->set_rules('address','Địa chỉ','required');

		if($this->form_validation->run() == FALSE)
		{
			$this->data['temp']= 'site/order/index';
			$this->load->view('site/layout',$this->data);
		}

		//echo date("m/d/y H:i:s<br>", time());
	}
}
?>