<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Categories extends MX_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->Currency_Converter = new Currency_Converter();

		if ($this->session->userdata('site_lang') == "indonesia") {
            $this->lang->load("msg","indonesia");
        }else{
        	$this->lang->load("msg","english");	
        }
		$this->load->model('category/category');
		$this->load->model('product/product');
	}
	public function index()
	{
		$data['title'] = "Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$this->load->view('include/header', $data);
		$this->load->view('category/index');
		$this->load->view('include/footer');
	}
	public function list_product_category()
	{
		$data['title'] = "Generasi Juara";
		$data['category'] = $this->category->get_category();


		$data['js'][] = "public/js/custom/cart.js";

		$count_product_category = $this->product->count_product_category($this->uri->segment(2));
		$this->load->library('pagination');
		// pagination product category
		$config['base_url'] = base_url().'category/'.$this->uri->segment(2);
		$config['total_rows'] = $count_product_category;
		$config['per_page'] = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
		$config['full_tag_open'] = '<div class="paginations"><ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['full_tag_close'] = '</ul></div>';
		
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['product_category'] = $this->product->get_product_category($this->uri->segment(2), $this->uri->segment(3), $config['per_page'], $from, $this->input->get('order'));
		// end
		$this->load->view('include/header', $data);
		$this->load->view('category_list/index');
		$this->load->view('include/footer');
	}
}

/* End of file Categories.php */
/* Location: ./application/modules/dashboard/controllers/Categories.php */