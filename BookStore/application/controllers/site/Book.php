<?php
/**
* 
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
		$id_book = $_GET['id'];
		$info= $this->Book_Model->get_info($id_book);
		$this->data['info']= $info; 
		
		//rut gon noi dung sach
		$shortcut = "";
		if(strlen($info->description) >=500)
		{
			$shortcut = substr($info->description, 0, 500);
		}
		else
		{
			$shortcut = $info->description;
		}
		$this->data['shortcut'] = $shortcut;

		//lay ten thể loại
		$this->load->model('admin/Type_Model');
		$type= $this->Type_Model->get_info($info->id_type);
		$type_name= $type->name;

		//lay danh sach sách cùng thể loại
		$input['where']= array();
		$input['where']['id_type']= $info->id_type;
		$input['where']['id_book !=']= $id_book;
		$input['limit'] = array(5,1);
		$list = $this->Book_Model->get_list($input);
		$this->data['list'] = $list;

		$this->data['type_name']= $type_name;

		$this->data['temp']= 'site/book/index';
		$this->load->view('site/layout',$this->data);
	}
}
?>