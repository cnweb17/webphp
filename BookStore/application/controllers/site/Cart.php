<?php
/**
* 
*/
class Cart extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Cart_Model');
		if($this->session->userdata('username_logged_in') == NULL)
		{
			redirect('site/login');
		}
	}

	function add()
	{
		$id_book = $this->uri->segment(4);
		$id_book = intval($id_book);
		$this->load->model('admin/Book_Model');
		$info = $this->Book_Model->get_info($id_book);

		if(!$info)
		{
			redirect(base_url());
		}

			$data = array();
			$qty = 1;
			$data['id']= $info->id_book;
			$data['qty']= $qty;
			$data['price'] = $info->price;
			$data['name'] = url_title($info->name,' ');
			$data['link_image'] = $info->link_image;
			$data['author']= $info->author;

			$this->cart->insert($data);

		redirect(base_url('site/cart/index'));
	}

	function index()
	{
		$carts = $this->cart->contents();
		$total_items = $this->cart->total_items();

		
		$this->data['cart'] = $carts;
		$this->data['total_items'] = $total_items;
		
		$this->data['temp'] = 'site/cart/index';
		$this->load->view('site/layout',$this->data);
	}

	function update()
	{
		$carts = $this->cart->contents();
		foreach ($carts as $key => $value) {
			$new_qty = $this->input->post('qty_'.$value['id']);
			$data= array();
			$data['rowid'] = $key;
			$data['qty'] = $new_qty;
			print_r($data);
			$this->cart->update($data);
		}
		redirect(base_url('site/cart'));
	}

	function del()
	{
		$id = $this->uri->segment(4);
		$id = intval($id);

		if($id>0)
		{
			$carts = $this->cart->contents();
			foreach ($carts as $key => $value) {
				if($value['id'] == $id)
				{
					$data= array();
					$data['rowid']= $key;
					$data['qty']=0;
					$this->cart->update($data);
				}
			}
		}
		else
		{
			$this->cart->destroy();
		}

		redirect(base_url('site/cart'));
	}
}
?>