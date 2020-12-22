<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Home extends MX_Controller
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

		$this->ongkir_province = "https://api.rajaongkir.com/starter/province";

		$this->ongkir_city = "https://api.rajaongkir.com/starter/city";

		$this->ongkir_cost = "https://api.rajaongkir.com/starter/cost";

		$this->key_auth = "5a2f3bbc0a8f7f629122a0e60660c584";
	}
	
	public function index()
	{
		$data['title'] = "Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/easy-autocomplete.css";
		$data['css'][] = "public/css/easy-autocomplete.themes.css";
		
		// $data['js'][] = "public/js/jquery.easy-autocomplete.js";
		// $data['js'][] = "public/js/custom/search.js";

		$data['category'] = $this->category->get_category();
		$data['slide'] = $this->db->get('slider')->result();
		$data['new_product'] = $this->product->get_product_new();
		$data['on_sale'] = $this->product->get_product_onsale();
		$data['best_product'] = $this->product->get_product_best();

		$this->load->view('include/header', $data);
		$this->load->view('home');
		$this->load->view('include/footer');
	}
	public function shipping_cost()
	{
		if ($this->uri->segment(1) == 'province') {
			$data['province'] = $this->curl_request->curl_get($this->ongkir_province, '', $this->key_auth);
			echo json_encode($data['province']['rajaongkir']['results']);
		}elseif ($this->uri->segment(1) == 'city') {
			$province_id = $this->input->post('province_id');
			$data['city'] = $this->curl_request->curl_get($this->ongkir_city, '?province='.$province_id, $this->key_auth);
			echo json_encode($data['city']['rajaongkir']['results']);
		}elseif ($this->uri->segment(1) == 'shipping') {
			$shipping_origin = 115;
			$shipping_destination = $this->input->post('city_id');
			$weight = 0;
			foreach ($this->session->userdata('cart_item') as $item_cart) {
				$weight += $item_cart['weight'];
			}
			$send_data_jne = array('origin'=>$shipping_origin, 'destination'=>$shipping_destination, 'weight'=>$weight, 'courier'=>'jne');
			$data['shipping_jne'] = $this->curl_request->curl_post($this->ongkir_cost, $send_data_jne, $this->key_auth);
			$send_data_pos = array('origin'=>$shipping_origin, 'destination'=>$shipping_destination, 'weight'=>$weight, 'courier'=>'pos');
			$data['shipping_pos'] = $this->curl_request->curl_post($this->ongkir_cost, $send_data_pos, $this->key_auth);
			$send_data_tiki = array('origin'=>$shipping_origin, 'destination'=>$shipping_destination, 'weight'=>$weight, 'courier'=>'tiki');
			$data['shipping_tiki'] = $this->curl_request->curl_post($this->ongkir_cost, $send_data_tiki, $this->key_auth);
			
			echo json_encode(array_merge_recursive($data['shipping_jne']['rajaongkir']['results'],$data['shipping_pos']['rajaongkir']['results'], $data['shipping_tiki']['rajaongkir']['results']));
		}
	}

	public function contact_us_post()
	{
        	// print_r($this->input->post());
        	$data['name'] = $this->input->post('name');
        	$data['email'] = $this->input->post('email');
        	$data['subject'] = $this->input->post('subject');
        	$data['description'] = $this->input->post('description');
        	$data['file'] = $this->upload_files('public/img/contact/' ,'contact'.rand(), $_FILES['file']);

        	$this->db->insert('contact', $data);
        	$this->session->set_flashdata('contact', 1);
        	redirect('contact-us','refresh');
	}
	function switch_language($language = "") {
        $language = ($language != "") ? $language : "indonesia";
        $this->session->set_userdata('site_lang', $language);
        redirect(base_url());
    }
    function switch_currency($currency ="")
    {
    	$currency = ($currency != "") ? $currency : "IDR";
        $this->session->set_userdata('format_currency', $currency);
        redirect(base_url());	
    }
    public function contact_us()
    {
		$data['title'] = "Contact | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/toastr.min.css";

		$data['js'][] = "public/js/toastr.min.js";
		if ($this->session->flashdata('contact') == 1) {
			$data['js'][] = "public/js/custom/contact.js";
		}
		$data['category'] = $this->category->get_category();
    	$this->load->view('include/header', $data);
		$this->load->view('contact/contact_us');
		$this->load->view('include/footer');
    }
    public function blog()
    {
    	$data['title'] = "Contact | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['category'] = $this->category->get_category();
    	$this->load->view('include/header', $data);
		$this->load->view('blog/blog');
		$this->load->view('include/footer');
    }
    private function upload_files($path, $title, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png|jpeg|docx|pdf|xls|ppt',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        $images = array();

        $_FILES['front_img']['name']= $files['name'];
        $_FILES['front_img']['type']= $files['type'];
        $_FILES['front_img']['tmp_name']= $files['tmp_name'];
        $_FILES['front_img']['error']= $files['error'];
        $_FILES['front_img']['size']= $files['size'];

        $fileName = $title .'_'. $_FILES['front_img']['name'];

        $images = $fileName;

        $config['file_name'] = $fileName;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('front_img')) {
            $this->upload->data();
        } else {
            return false;
        }
        return $images;
    }
    public function transaction_list()
    {
     	$data['title'] = "Transaction List | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/toastr.min.css";
		$data['css'][] = "public/css/site.css";
		$data['css'][] = "public/css/upload.css";

		$data['js'][] = "public/js/site.js?v=1.4.8";
		$data['js'][] = "public/js/core.js";
		$data['js'][] = "public/js/upload.js";
		$data['js'][] = "public/js/upload_trans.js";
		$data['js'][] = "public/js/toastr.min.js";
		if ($this->session->flashdata('contact') == 1) {
			$data['js'][] = "public/js/custom/contact.js";
		}
		$data['category'] = $this->category->get_category();
    	$this->load->view('include/header', $data);
		$this->load->view('transaction/transaction_list');
		$this->load->view('include/footer');   
    }
}

/* End of file Home.php */
/* Location: ./application/modules/dashboard/controllers/Home.php */