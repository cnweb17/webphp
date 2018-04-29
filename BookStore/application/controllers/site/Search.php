<?php
/**
* 
*/
class Search extends MY_Controller
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
		$query = $this->input->get('query');
			if($query)
			{
				$input['like'] = array('name', $query);
				$input['or_like'] = array('author', $query);
			}
			$list= $this->Book_Model->get_list($input);
			$this->data['list']= $list;

			$this->data['temp']= 'site/search/index';
			$this->load->view('site/layout',$this->data);
	}

}
?>