<?php
/**
* 
*/
class Transaction extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Order_Model');
	}

	function index()
	{
		$input= array();
		


		$id_orders= $this->input->get('id_orders');
		$id_orders = intval($id_orders);
		$input['where'] = array();
		if($id_orders > 0)
		{
			$input['where']['id_orders']= $id_orders; 
		};

		$id_cus= $this->input->get('id_cus');
		$id_cus = intval($id_cus);
		if($id_cus > 0)
		{
			$input['where']['id_cus']= $id_cus; 
		};

		$status = $this->input->get('status');
		$status= intval($status);
		//$input['where'] = array();
		if($status>0)
		{
			$input['where']['status'] = $status-10;
		}

		$list = $this->Order_Model->get_list($input);
		$total = $this->Order_Model->get_total();
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['list'] = $list;
		$this->data['total'] = $total;
		$this->data['temp'] = 'admin/transaction/index';
		$this->load->view('admin/main', $this->data);
	}

	function detail()
	{
		$id_orders = $_GET['id'];
		$id_orders = intval($id_orders);
		$this->load->model('Order_Detail_Model');
		$info = $this->Order_Detail_Model->get_info($id_orders);
		if($info == FALSE)
		{
			$this->session->set_flashdata('message','Không tồn tại giao dịch');
		}

		$str = "SELECT id_detail, order_detail.id_orders, order_detail.id_book, order_detail.quantity, book.name, book.price, book.link_image, order_detail.quantity*book.price as money from order_detail, book WHERE order_detail.id_book= book.id_book AND order_detail.id_orders = ".$id_orders." GROUP BY id_detail DESC ";

		if($query = $this->db->query($str))
		{
			$list = $query->result();
		}
		else
		{
			return FALSE;
			$this->session->set_flashdata('message','Có lỗi xảy ra, vui lòng thực hiện lại');
			redirect(base_url('admin/transaction'));
		}


		$id_cus= $_GET['id_cus'];
		$this->load->model('Customer_Model');
		$cus_info=  $this->Customer_Model->get_info($id_cus);
		$cus_name = $cus_info->name;

		$orders_info= $this->Order_Model->get_info($id_orders);
		$time = $orders_info->time;
		
		$this->data['time'] = $time;
		$this->data['cus_name'] = $cus_name;
		$this->data['id_orders'] = $id_orders;
		$this->data['list'] = $list;
		$this->data['temp'] = 'admin/transaction/detail';
		$this->load->view('admin/main', $this->data);

	}

	function delete()
	{
		$id_orders = $this->uri->segment(4);
		$id_orders= intval($id_orders);

		if($this->Order_Model->delete($id_orders))
			{
				$this->session->set_flashdata('message','Xóa thành công');
			}
			else
			{
				$this->session->set_flashdata('message','Không xóa được');
			}
			redirect(base_url('admin/transaction'));
	}


	function change_status()
	{
		$id_orders= $_GET['id_orders'];
		$status =$_GET['status'];
		$id_orders= intval($id_orders);
		$status= intval($status);

		$new_status= 0;
		if($status==0)
		{
			$new_status =1;
		}

		$input= array('id_orders'=> $id_orders, 'status'=> $new_status);

		if( $this->Order_Model->update($id_orders, $input ) )
		{
			$this->session->set_flashdata('message','Cập nhật thành công');
		}
		else
		{
			$this->session->set_flashdata('message','Cập nhật thất bại');
		}

		redirect(base_url('admin/transaction'));
	}
	
	
}

?>