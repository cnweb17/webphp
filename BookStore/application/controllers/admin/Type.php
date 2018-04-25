<?php
/**
* 
*/
class Type extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Type_Model');
	}

	function index()
	{
		$input= array();
		$list= $this->Type_Model->get_list($input);
		$this->data['list']= $list;
		$total = $this->Type_Model->get_total();
		$this->data['total']= $total;

		$message= $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/type/index';
		$this->load->view('admin/main', $this->data);
	}

	function load_add_view()
	{
		$this->data['temp'] = 'admin/type/addtype';
		$this->load->view('admin/main', $this->data);
	}


	/*
	* kiem tra username ton tai hay chua
	*/
	function check_id_type()
	{
		$id_type= $this->input->post('id_type');
		$where= array();
		$where['id_type']= $id_type;
		if($this->Type_Model->check_exists($where))
		{
			$this->form_validation->set_message(__FUNCTION__,'Mã thể loại đã tồn tại');
			return FALSE;
		}
		return true;
	}

	function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('id_type','Mã thể loại', 
			'required|callback_check_id_type');
		$this->form_validation->set_rules('name','Tên thể loại', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->data['temp']= 'admin/type/addtype';
			$this->load->view('admin/main',$this->data);
		}
		else
		{
			$input = array('id_type' => $this->input->post('id_type'),
				'name' => $this->input->post('name')
			);

			//$result = $this->Admin_Model->create($input);

			if($this->Type_Model->create($input))
			{
				$this->session->set_flashdata('message','Thêm mới thành công');
			}
			else
			{
				$this->session->set_flashdata('message','Thêm mới thất bại');
			}

			redirect(base_url('admin/type/index'));
		}
	}

	function load_edit()
	{
		$id= $this->uri->segment(4);
		$info = $this->Type_Model->get_info($id);
		if($info == FALSE){
			$this->session->set_flashdata('message','Không tồn tại Thể loại');
			redirect(base_url('admin/type/index'));
		}
		else
		{
			$this->data['info']= $info;
			$this->data['temp']= 'admin/type/edittype';
			$this->load->view('admin/main',$this->data);
		}
	}

	function edit()
	{
		$id= $this->uri->segment(4);
		$info = $this->Type_Model->get_info($id);
		$this->data['info']= $info;

		$this->load->library('form_validation');
		$this->load->helper('form');

		
		$this->form_validation->set_rules('name','Tên thể loại', 'required');

		$id_type= $this->input->post('id_type');
		if($id_type != $info->id_type)
		{
			$this->form_validation->set_rules('id_type','Mã thể loại', 
			'required|callback_check_id_type');
		}

		if($this->form_validation->run() == FALSE)
		{
			$this->data['temp']= 'admin/type/edittype';
			$this->load->view('admin/main',$this->data);
		}
		else
		{
			$input = array(
				'name' => $this->input->post('name'),
			);
			if($id_type != $info->id_type)
			{
				$input['id_type'] = $id_type;
			}
			if($this->Type_Model->update($info->id_type,$input))
			{
				$this->session->set_flashdata('message','Cập nhật thành công');
			}
			else
			{
				$this->session->set_flashdata('message','Cập nhật thất bại');
			}

			redirect(base_url('admin/type/index'));
		}
	}


	function delete()
	{
		$id= $this->uri->segment(4);
		$info = $this->Type_Model->get_info($id);
		
		if($info == FALSE){
			$this->session->set_flashdata('message','Không tồn tại thể loại');
			redirect(base_url('admin/type/index'));
		}
		else
		{
			if($this->Type_Model->delete($id))
			{
				$this->session->set_flashdata('message','Xóa thành công');
			}
			else
			{
				$this->session->set_flashdata('message','Không xóa được');
			}
			redirect(base_url('admin/type/index'));
		}
	}
}
?>