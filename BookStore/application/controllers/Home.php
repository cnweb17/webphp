<?php

	/**
	* 
	*/
	class Home extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Book_Model');
			$this->load->model('admin/Type_Model');
			$types = $this->Type_Model->get_list();
			$this->data['types']= $types;
			
		}
		function index()
		{	
			$total = $this->Book_Model->get_total();
			$this->data['total']= $total;

			$this->load->library('pagination');
			$config = array();
			$config['base_url']    = base_url('home/index');
			$config['total_rows']  = $total;
			$config['per_page']    = 12;
			$config['uri_segment'] = 3;
			$config['next_link']   = "Trang kế";
			$config['prev_link']   = "Trang trước";
			$config['last_link']   = ">>";
			$config['first_link']   = "<<";
			$this->pagination->initialize($config);

			$segment= $this->uri->segment(3);
			$segment = intval($segment);
			$input= array();
			$input['limit']= array($config['per_page'], $segment);

			
			//tim kiem
			$query = $this->input->get('query');
			if($query)
			{
				$input['like'] = array('name', $query);
				$input['or_like'] = array('author', $query);
			}


			$list= $this->Book_Model->get_list($input);
			$this->data['list']= $list;

			$this->data['message'] = $this->session->flashdata('message');

			$this->data['temp']= 'site/home/index';
			$this->load->view('site/layout',$this->data);
		}


		function type()
		{
			$id_type = $this->uri->segment(3);
			
			//$this->load->model('admin/Type_Model');
			$type= $this->Type_Model->get_info($id_type);
			$this->data['type'] = $type;
			

			$input = array();
			$input['where'] = array();
			$input['where']['id_type']= $id_type;

			$list= $this->Book_Model->get_list($input);
			$this->data['list']= $list;

			$this->data['temp'] = 'site/home/type';
			$this->load->view('site/layout',$this->data);
		}

		function search()
		{
			$query = $this->input->get('query');
			if($query)
			{
				$input['like'] = array('name', $query);
				$input['or_like'] = array('author', $query);
			}
			$list= $this->Book_Model->get_list($input);
			$this->data['list']= $list;

			$this->data['temp']= 'site/home/index';
			$this->load->view('site/layout',$this->data);

		}
	}
?>