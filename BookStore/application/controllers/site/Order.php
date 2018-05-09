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

		$this->data['message'] = $this->session->flashdata('message');
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
			$total_money= 0;
			$carts = $this->cart->contents();
			foreach ($carts as $row) {
				$total_money = $total_money + $row['subtotal'];
			}


			$data1 = array();
			$data1['id_cus'] = $info->id_cus;
			$data1['total_money'] =  $total_money + 30 ;
			$data1['address'] = $this->input->post('address');
			$data1['phone_number'] = $this->input->post('phone_number');
			$data1['status'] = 0;

			$this->load->model('Order_Model');
			$this->Order_Model->create($data1);

			$id_orders = $this->db->insert_id();

			$this->load->model('Order_Detail_Model');
			foreach ($carts as $row) {
				$data2 = array(
					'id_orders' => $id_orders,
					'id_book' => $row['id'],
					'quantity'=> $row['qty']
				);

				$this->Order_Detail_Model->create($data2);
			}

			/// xoa danh sach trong gio hang
			$this->cart->destroy();

			$this->session->set_flashdata('message','Đặt sách thành công, vui lòng đợi sách được chuyển đến.');

			redirect();
	}
}
?>