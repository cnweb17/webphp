<?php
/**
* san pham
*/
class Book extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Book_Model');
	}

	function index()
	{
		$total = $this->Book_Model->get_total();
		$this->data['total']= $total;

		$this->load->library('pagination');
		$config = array();
		$config['base_url']    = base_url('admin/book/index');
		$config['total_rows']  = $total;
		$config['per_page']    = 10;
		$config['uri_segment'] = 4;
		$config['next_link']   = "Trang kế";
		$config['prev_link']   = "Trang trước";
		$this->pagination->initialize($config);

		$segment= $this->uri->segment(4);
		$segment = intval($segment);
		$input= array();
		$input['limit']= array($config['per_page'], $segment);

		// lay danh sách các thể loại
		$this->load->model('admin/Type_Model');
		$types = $this->Type_Model->get_list();
		$this->data['types']= $types; ////////////////////

		

		//tim kiem theo id
		$id = $this->input->get('id');
		$id = intval($id);
		$input['where'] = array();
		if($id > 0)
		{
			$input['where']['id_book']= $id; 
		}

		//tim theo ten
		$name = $this->input->get('name');
		//$input['like'] = array();
		if($name)
		{
			$input['like']= array('name', $name);
		}

		// tim theo the loai
		$id_type= $this->input->get('type');
		if($id_type)
		{
			$input['where']['id_type']= $id_type; 
		}
		/////////////////////////////////////////////////

		$list= $this->Book_Model->get_list($input);
		$this->data['list']= $list;

		//dat thong diep tra ve
		$message = $this->session->flashdata('message');
		$this->data['message']= $message;

		$this->data['temp']= 'admin/book/index';
		$this->load->view('admin/main',$this->data);
	}


	function bookdetails()
	{
		$id_book = $this->uri->segment(4);
		$id_book = intval($id_book);

		if($this->Book_Model->get_info($id_book) == FALSE)
		{
			$this->session->set_flashdata('message','Sách không có trong kho');
		}

		$info= $this->Book_Model->get_info($id_book);
		$this->data['info']= $info;

		$this->load->model('admin/Type_Model');
		$type= $this->Type_Model->get_info($info->id_type);
		$type_name= $type->name;

		$this->data['type_name']= $type_name;

		$this->data['temp'] = 'admin/book/bookdetails';
		$this->load->view('admin/main',$this->data);
	}

	function load_add_view()
	{

		// lay danh sách các thể loại
		$this->load->model('admin/Type_Model');
		$types = $this->Type_Model->get_list();
		$this->data['types']= $types; ////////////////////
		
		$this->data['temp'] = 'admin/book/add';
		$this->load->view('admin/main',$this->data); 
	}

	function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('name','Tên sách', 'required');
		$this->form_validation->set_rules('price','Giá sách', 'required|numeric');
		$this->form_validation->set_rules('author','Tác giả', 'required');
		$this->form_validation->set_rules('description','Nội dung', 'required');
		

		if($this->form_validation->run() == FALSE)
		{
			$this->data['temp']= 'admin/admin/addemployee';
			$this->load->view('admin/main',$this->data);
		}
		else
		{
			$name = $_FILES['image']['name'];
			$tmp_name = $_FILES['image']['tmp_name'];
			$dir= './public/site/images/book/';
			$destination = $dir.$name;

			if(move_uploaded_file($tmp_name, $destination))
			{
					$input = array('name' => $this->input->post('name'),
						'author' => $this->input->post('author'),
						'publish_year' => $this->input->post('publish_year'),
						'description' => $this->input->post('description'),
						'id_type' => $this->input->post('id_type'),
						'price' => $this->input->post('price'),
						'link_image' => $name
					);

					if(!$this->Book_Model->create($input))
					{
						$this->session->set_flashdata('message','Thêm mới thất bại');
					}
					else
					{
						$this->session->set_flashdata('message','Thêm mới thành công');
					}
			}
			else
			{
				$this->session->set_flashdata('message','Thêm mới thất bại');
			}

				
		}
		

		redirect(base_url('admin/book/index'));
	}

	function load_edit_view()
	{
		$id= $this->uri->segment(4);
		$info = $this->Book_Model->get_info($id);
		$this->data['info'] = $info;


		// lay danh sách các thể loại
		$this->load->model('admin/Type_Model');
		$types = $this->Type_Model->get_list();
		$this->data['types']= $types; ////////////////////

		
		$this->data['temp'] = 'admin/book/editbook';
		$this->load->view('admin/main',$this->data);
	}

	function edit()
	{
		$id= $this->uri->segment(4);
		$info = $this->Book_Model->get_info($id);
		$this->data['info']= $info;
		echo $id;

		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('name','Tên sách', 'required');
		$this->form_validation->set_rules('author','Tác giả', 'required');
		$this->form_validation->set_rules('price','Giá sách', 'required|numeric');
		$this->form_validation->set_rules('description','Nội dung', 'required');

		$input = array('name' => $this->input->post('name'),
						'author' => $this->input->post('author'),
						'publish_year' => $this->input->post('publish_year'),
						'description' => $this->input->post('description'),
						'id_type' => $this->input->post('id_type'),
						'price' => $this->input->post('price')
					);
		if($this->form_validation->run() == FALSE)
			{
				$this->data['temp']= 'admin/book/addbook';
				$this->load->view('admin/main',$this->data);
			}
		else
		{
			if(!empty($_FILES['image']) && ($_FILES['image']['name']!="") )
			{
				$name = $_FILES['image']['name'];
				$tmp_name = $_FILES['image']['tmp_name'];
				$dir= './public/site/images/book/';
				$destination = $dir.$name;

				echo $name." ".$tmp_name." ".$destination;

				if(move_uploaded_file($tmp_name, $destination))
				{
					
					$input['link_image'] = $name;

					if($this->Book_Model->update($id,$input))
					{
						$this->session->set_flashdata('message','Cập nhật thành công');
						//echo "Thành công 1";
					}
					else
					{
						$this->session->set_flashdata('message','Cập nhật thất bại');
						//echo "Thất bại 1";

					}
				}
				else
				{
					$this->session->set_flashdata('message','Cập nhật thất bại');
					//echo "Thất bại 2";
				}

			}
			else
			{
				//print_r($input);
				if(!$this->Book_Model->update($id,$input))
					{
						$this->session->set_flashdata('message','Cập nhật thất bại');
						//echo "Thất bại 3";
					}
					else
					{
						$this->session->set_flashdata('message','Cập nhật thành công');
						//echo "Thanh cong 2";
					}
			}
			
			redirect(base_url('admin/book/index'));
		}
		
	}

	function delete()
	{
		$id= $this->uri->segment(4);
		$info = $this->Book_Model->get_info($id);

		if($info == FALSE){
			$this->session->set_flashdata('message','Sách không tồn tại');
			redirect(base_url('admin/book/index'));
		}
		else
		{
			if($this->Book_Model->delete($id))
			{
				$this->session->set_flashdata('message','Xóa thành công');
			}
			else
			{
				$this->session->set_flashdata('message','Không xóa được');
			}
			redirect(base_url('admin/book/index'));
		}
	}
}

?>