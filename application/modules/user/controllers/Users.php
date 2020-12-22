<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Users extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->Currency_Converter = new Currency_Converter();
        $this->load->helper('url');

        if ($this->session->userdata('site_lang') == "indonesia") {
            $this->lang->load("msg","indonesia");
        }else{
        	$this->lang->load("msg","english");	
        }

		$this->load->model('category/category');
		$this->load->model('product/product');
		$this->load->model('user/user');
	}
	public function index()
	{
		echo "User";
	}
	public function login_member()
	{
		$data['title'] = " Login Member | Generasi Juara";
		$data['category'] = $this->category->get_category();

		$data['js'][] = "public/js/jquery.validate.js";
		// $data['js'][] = "public/js/custom/login.js";

		$this->load->view('include/header', $data);
		$this->load->view('member/login');
		$this->load->view('include/footer');
	}
	public function login_post()
	{
		$form_login = array('email' => $this->input->post('email'),
							'password' => md5($this->input->post('password')));
		$this->form_validation->set_rules('email', 'Email Field', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password Field', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('login_error', 1);
	        redirect('login','refresh');
	    	echo "Harus diisi";
	    }else{
	    	$data_login = $this->user->users_login($form_login);
	    	if ($this->uri->segment(2) != "checkout") {
	    		if ($data_login->num_rows() > 0) {
		    		$data_session = $data_login->row();
		    		$array_session = array(
		    			'data_session' => $data_session
		    		);
		    		$this->session->set_userdata($array_session);
		    		redirect('','refresh');
		    	}else{
					$this->session->set_flashdata('login_error', 2);
			        redirect('login','refresh');
		    	}
	    	}else{
	    		if ($data_login->num_rows() > 0) {
		    		$data_session = $data_login->row();
		    		$array_session = array(
		    			'data_session' => $data_session
		    		);
		    		$this->session->set_userdata($array_session);
		    		echo json_encode(array("status_login"=>"Success Login", "code"=>200));
		    	}else{
		    		echo json_encode(array("status_login"=>"Failed Login", "code"=>403));
		    	}
	    	}
	    }
	}
	public function signout()
	{
		$this->session->unset_userdata('data_session');
		redirect('');
	}
	public function register_member()
	{
		$data['title'] = " Login Member | Generasi Juara";
		$data['category'] = $this->category->get_category();

		$data['js'][] = "public/js/jquery.validate.js";
		$data['css'][] = "public/css/select2.min.css";
		$data['js'][] = "public/js/select2.min.js";
		$data['js'][] = "public/js/custom/user.js";

		if ($this->input->get('from') == 'checkout') {
			$data['register'] = site_url('register?from=checkout');
		}else{
			$data['register'] = site_url('register');
		}
		$this->load->view('include/header', $data);
		$this->load->view('member/register');
		$this->load->view('include/footer');
	}
	public function register_post()
	{
		// print_r($this->input->post());
		if ($this->db->insert('user', $this->input->post())) {
			$id_user = $this->db->insert_id();
			$get_user = $this->db->get_where('user',array('user_id'=>$id_user));
			$data_session = $get_user->row();
    		$array_session = array(
    			'data_session' => $data_session
    		);
    		$this->session->set_userdata($array_session);
    		$data_member['name'] = $this->input->post('surname');
			$data_member['phone'] = $this->input->post('phone');
			$data_member['email'] = $this->input->post('email');
			$data_member['password'] = md5($this->input->post('password'));
			$data_member['role'] = 2;
			$this->db->insert('admin', $data_member);
			if ($this->input->get('from') == 'checkout') {
				redirect('checkout','refresh');
			}else{
				redirect('','refresh');
			}
		}else{
			echo "gagal";
		}
	}
}

/* End of file Users.php */
/* Location: ./application/modules/user/controllers/Users.php */