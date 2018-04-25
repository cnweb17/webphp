<?php
/**
* 
*/
class Customer extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_Model');
	}

	function index()
	{
		$input= array();
		$list= $this->Customer_Model->get_list($input);
		$this->data['list']= $list;
		$total = $this->Customer_Model->get_total();
		$this->data['total']= $total;
		$this->data['temp'] = 'admin/customer/index';

		$message = $this->session->flashdata('message');
		$this->data['message']= $message;

		$this->load->view('admin/main',$this->data);
	}

	function delete()
	{
		$id_cus = $this->uri->segment(4);
		$info = $this->Customer_Model->get_info($id_cus);

		if($info == FALSE){
			$this->session->set_flashdata('message','Không tồn tại khách hàng');
			redirect(base_url('admin/customer'));
		}
		else
		{
			if($this->Admin_Model->delete($id))
			{
				$this->session->set_flashdata('message','Xóa thành công');
			}
			else
			{
				$this->session->set_flashdata('message','Không xóa được');
			}
			redirect(base_url('admin/customer'));
		}
	}

}
?>