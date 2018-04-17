<?php
	/**
	* 
	*/
	class User extends MY_Controller
	{
		
		function index()
		{
			$this->load->model('user/User_model');
			$data= array();
			$data['roll_no']= "20151234";
			$data['Name']= "Dang Hang";	
			if($this->User_model->create($data))
			{
				echo "them thanh cong";
			}	
			else
			{
				echo "Khong thanh cong";
			}
		}
		function delete_user()
		{
			$this->load->model('user/User_model');
			if($this->User_model->delete(20151589))
			{
				echo "Xoa thanh cong";
			}
			else
			{
				echo "Khong thanh cong";
			}
		}

		function get_user()
		{
			$this->load->model('user/User_model');
			$rs= $this->User_model->get_info(20154153);
			print_r($rs);
		}
	}
?>