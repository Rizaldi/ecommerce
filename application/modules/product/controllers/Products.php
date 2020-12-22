<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Products extends MX_Controller
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
		$data['title'] = "List Product | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
	}
	public function product_detail()
	{
		// echo $this->mycrypt->decryptIt($this->input->get('afl'));
		$data['title'] = " Detail | Generasi Juara";
		$data['category'] = $this->category->get_category();
		if (!$this->uri->segment(4)) {
			$segment = $this->uri->segment(3);
		}else{
			$segment = $this->uri->segment(4);
		}
		$data['product_detail'] = $this->product->get_detail_product($segment);

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/cart.js";

		$this->load->view('include/header', $data);
		$this->load->view('product_view/index');
		$this->load->view('include/footer');
		// echo json_encode($data['product_detail']);
	}
	public function product_category()
	{
		$data['title'] = " Category | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";

		$this->load->view('include/header', $data);
		$this->load->view('product_category/index');
		$this->load->view('include/footer');	
	}

	public function search_product()
	{
		if ($this->input->get('p')) {
			// echo $this->input->get('p');
			$product = $this->input->get('p');
			$this->db->like('title', $product, 'BOTH');
			$this->db->limit(5);
			$res_product = $this->db->get('product')->result();
			$data['product_category'] = $res_product;
			$data['title'] = "Generasi Juara";
			$data['category'] = $this->category->get_category();

			$this->load->view('include/header', $data);
			$this->load->view('product_list/index');
			$this->load->view('include/footer');
		}else{
			$product = $this->input->get('product');
			$this->db->like('title', $product, 'BOTH');
			$this->db->limit(5);

			$data['product_category'] = $this->db->get('product')->result();
			$this->load->view('include/header', $data);
			$this->load->view('product_list/index');
			$this->load->view('include/footer');
		
			// echo json_encode($this->db->get('product')->result());	
		}
	}
}

/* End of file Product.php */
/* Location: ./application/modules/dashboard/controllers/Product.php */