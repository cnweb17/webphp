<?php
/**
* 
*/
class Login extends MY_Controller
{
	
	function index()
	{
		$data= array();
		if($this->session->userdata('user') == NULL)
		{
			$data['temp']= 'site/login/index';
			$this->load->view('site/layout',$data);
		}
		else
		{
			redirect(base_url());
		}
	}

	function check_login()
	{
		if(isset($_POST['submit']))
		{
			$data= array();
			$id= $_POST['username'];
			$pw= $_POST['password'];
			
			$where = array('username' => $id, 'password' => $pw);
			$query= $this->db->get_where('user', $where );
			if(count($query->result())>0)
			{
				foreach ($query->result_array() as $row) {
					$name= $row['Name'];
				}
				$this->session->set_userdata('user', $name);
				redirect(base_url());
			}
			else
			{
				$data['temp'] = 'site/login/index';
				$data['err'] = "Sai tên đăng nhập hoặc mật khẩu!";
				$this->load->view('site/layout', $data);
			}
		}
	}
}

?>