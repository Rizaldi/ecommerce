<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Admins extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('admin/adminz');
	}
	public function login()
	{
		if ($this->session->userdata('isAdmin') != 1) {
			$data['title'] = "Admin | Generasi Juara";

			$data['css'][] = "public/css/custom-margin-padding.css";
			$this->load->view('login');
		}else{
			redirect($this->uri->segment(1));
		}
	}
	public function login_action()
	{
		$data['email'] = $this->input->post('email');
		$data['password'] = md5($this->input->post('password'));

		$get_admin = $this->adminz->get_admin($data);

		if ($get_admin->num_rows() > 0) {
			$this->session->set_userdata('isAdmin', 1);
			$this->session->set_userdata('dataAdmin', $get_admin->row());
			redirect($this->uri->segment(1));
		}else{
			$this->session->set_userdata('isAdmin', 0);
			redirect($this->uri->segment(1));
		}
	}
	public function index()
	{
		if ($this->session->userdata('isAdmin') == 1) {
			$data['title'] = "Admin | Generasi Juara";

			$data['css'][] = "public/css/custom-margin-padding.css";
			$this->load->view('include/admin/header', $data);
			$this->load->view('admin/index');
			$this->load->view('include/admin/footer');
		}else{
			redirect('admin-jb-brg/login','refresh');
		}	
	}
	public function category()
	{
		$data['title'] = "Admin | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/admin/category.js";
		$this->load->view('include/admin/header', $data);
		$this->load->view('category/index');
		$this->load->view('include/admin/footer');
	}
	public function add_category()
	{
		$data['title'] = "Category | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/admin/category.js";
		$this->load->view('include/admin/header', $data);
		$this->load->view('category/add');
		$this->load->view('include/admin/footer');
	}
	public function add_category_post()
	{
		$data['category_name'] = $this->input->post('category_name');
		$data['category_slug'] = strtolower(str_replace(" ","-",$this->input->post('category_slug')));
		$data['description'] = $this->input->post('description');
		if ($this->adminz->add_category($data)) {
			$this->session->set_flashdata('status', 1);
			redirect($this->uri->segment(1).'/'.$this->uri->segment(2),'refresh');
		}
	}
	public function add_affiliate()
	{
		$data['title'] = "Affiliate | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/admin/category.js";
		$this->load->view('include/admin/header', $data);
		$this->load->view('affiliate/add');
		$this->load->view('include/admin/footer');
	}
	public function add_affiliate_post()
	{
		$data['category_name'] = $this->input->post('category_name');
		$data['category_slug'] = strtolower(str_replace(" ","-",$this->input->post('category_slug')));
		$data['description'] = $this->input->post('description');
		if ($this->adminz->add_category($data)) {
			$this->session->set_flashdata('status', 1);
			redirect($this->uri->segment(1).'/'.$this->uri->segment(2),'refresh');
		}
	}
	public function sub_category()
	{
		$data['title'] = "Admin | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/admin/sub_category.js";
		$this->load->view('include/admin/header', $data);
		$this->load->view('sub_category/index');
		$this->load->view('include/admin/footer');
	}
	public function add_sub_category()
	{
		$data['title'] = "sub category | Generasi Juara";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/admin/sub_category.js";
		$this->load->view('include/admin/header', $data);
		$this->load->view('sub_category/add');
		$this->load->view('include/admin/footer');
	}
	public function add_sub_category_post()
	{
		$data['sub_category_name'] = $this->input->post('sub_category_name');
		$data['sub_category_slug'] = strtolower(str_replace(" ","-",$this->input->post('sub_category_slug')));
		$data['category'] = $this->input->post('category');
		if ($this->adminz->add_sub_category($data)) {
			$this->session->set_flashdata('status', 1);
			redirect($this->uri->segment(1).'/'.$this->uri->segment(2),'refresh');
		}
	}
	public function product()
	{
		$data['title'] = "Admin | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/admin/product.js";
		$this->load->view('include/admin/header', $data);
		$this->load->view('product/index');
		$this->load->view('include/admin/footer');
	}
	public function add_product()
	{
		$data['title'] = "Product | Generasi Juara";

		$data['css'][] = "public/plugins/froala/css/froala_editor.css";
		// $data['css'][] = "public/plugins/froala/css/froala_style.css";
		$data['css'][] = "public/plugins/froala/css/plugins/code_view.css";
		$data['css'][] = "public/plugins/froala/css/plugins/colors.css";
		// $data['css'][] = "public/plugins/froala/css/plugins/emoticons.css";
		$data['css'][] = "public/plugins/froala/css/plugins/image_manager.css";
		$data['css'][] = "public/plugins/froala/css/plugins/image.css";
		$data['css'][] = "public/plugins/froala/css/plugins/line_breaker.css";
		$data['css'][] = "public/plugins/froala/css/plugins/table.css";
		$data['css'][] = "public/plugins/froala/css/plugins/char_counter.css";
		// $data['css'][] = "public/plugins/froala/css/plugins/video.css";
		$data['css'][] = "public/plugins/froala/css/plugins/fullscreen.css";
		// $data['css'][] = "public/plugins/froala/css/plugins/file.css";
		$data['css'][] = "public/plugins/froala/css/plugins/quick_insert.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/admin/product.js";

		$data['js'][] = "public/plugins/froala/js/froala_editor.min.js";

		$data['js'][] = "public/plugins/froala/js/plugins/align.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/char_counter.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/colors.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/draggable.min.js";
		// $data['js'][] = "public/plugins/froala/js/plugins/emoticons.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/entities.min.js";
		// $data['js'][] = "public/plugins/froala/js/plugins/file.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/font_size.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/fullscreen.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/image.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/image_manager.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/line_breaker.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/inline_style.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/paragraph_format.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/paragraph_style.min.js";

		$data['js'][] = "public/js/jquery.number.js";

		$this->load->view('include/admin/header', $data);
		$this->load->view('product/add');
		$this->load->view('include/admin/footer');
	}
	public function category_select()
	{
		$category_id = $this->input->post('category_id');

		$data_category = $this->adminz->get_category($category_id);

		echo json_encode($data_category->result());
	}
	public function add_product_post()
	{
		$arr['title'] = $this->input->post('title');
		$arr['title_slug'] = str_replace(" ", "-", $this->input->post('title_slug'));
		$arr['category'] = $this->input->post('category');	
		$arr['sub_category'] = $this->input->post('sub_category');
		$arr['short_description'] = $this->input->post('short_description');
		$arr['sale_price'] = str_replace(".", "", $this->input->post('sale_price'));
		$arr['weight'] = $this->input->post('weight');
		$arr['current_stock'] = $this->input->post('current_stock');
		$arr['description'] = $this->input->post('description');
		$arr['on_sale'] = ($this->input->post('on_sale') == 'on') ? 1 : 0 ;

		// $arr['front_image'] = ($this->input->post('on_sale') == 'on') ? 1 : 0 ;

		if (!empty($_FILES['front_img']['name'][0])) {
            if ($this->upload_files('public/img/product/' ,$arr['title'], $_FILES['front_img']) === FALSE){
                $data_front_img['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
            }
        }
        if (!isset($data_front_img['error'])) {
        	$arr['front_image'] = str_replace(" ", "_", $arr['title'] .'_'. $_FILES['front_img']['name']);
        	if ($this->db->insert('product', $arr)) {
        		if (!empty($_FILES['img_product']['name'][0])) {
	                if ($this->multiple_upload_files($this->db->insert_id() ,'public/img/product/' ,str_replace(" ", "_", $arr['title']), $_FILES['img_product']) === FALSE) {
	                    $data_img_product['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
	                }else{
                		$this->session->set_flashdata('status', 1);
						redirect($this->uri->segment(1).'/'.$this->uri->segment(2),'refresh');
	                }
	            }

	            if (!isset($data_img_product['error'])) {

	            }else{
	            	print_r($data_img_product['error']);
	            }	
        	}else{
        		echo "gagal insert";
        	}
        }else{
            print_r($data_front_img['error']);
        }


	}


	private function multiple_upload_files($product ,$path, $title, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png|jpeg',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['img_product[]']['name']= $files['name'][$key];
            $_FILES['img_product[]']['type']= $files['type'][$key];
            $_FILES['img_product[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['img_product[]']['error']= $files['error'][$key];
            $_FILES['img_product[]']['size']= $files['size'][$key];

            $fileName = $title .'_'. $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_product[]')) {
                $this->upload->data();
            } else {
                return false;
            }

            $data_insert['product'] = $product;
            $data_insert['product_image'] = str_replace(" ", "_", $fileName);

            $this->db->insert('product_image', $data_insert);
        }

        return $images;
    }
    private function upload_files($path, $title, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png|jpeg',
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
    public function transaction()
    {
    	$data['title'] = "Admin | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/transaction.js";
		$data['css'][] = "public/css/toastr.min.css";

		$data['js'][] = "public/js/toastr.min.js";
		$this->load->view('include/admin/header', $data);
		$this->load->view('transaction/index');
		$this->load->view('include/admin/footer');
    }
    public function affiliate()
    {
    	$data['title'] = "Admin | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/transaction.js";
		$data['css'][] = "public/css/toastr.min.css";

		$data['js'][] = "public/js/toastr.min.js";
		$this->load->view('include/admin/header', $data);
		$this->load->view('affiliate/index');
		$this->load->view('include/admin/footer');
    }
    public function transaction_detail()
    {
    	$trans_id = $this->mycrypt->decryptIt($this->uri->segment(4));

    	$data['title'] = "Admin | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/transaction.js";
		$data['transaction'] = $this->db->get_where('transaction',array('trans_id'=>$trans_id))->row();
		$this->load->view('include/admin/header', $data);
		$this->load->view('transaction/detail/index');
		$this->load->view('include/admin/footer');	
    }
    public function transaction_tracking()
    {
    	$trans_id = $this->mycrypt->decryptIt($this->uri->segment(4));

    	$data['title'] = "Admin | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/transaction.js";
		$data['transaction'] = $this->db->get_where('transaction',array('trans_id'=>$trans_id))->row();
		$data['tracking'] = $this->db->get_where('tracking', array('transaction'=>$data['transaction']->trans_id))->row();
		
		$this->load->view('include/admin/header', $data);
		$this->load->view('transaction/tracking/index');
		$this->load->view('include/admin/footer');	
    }
    public function transaction_tracking_post()
    {
    	$trans_id = $this->input->post('transaction');
    	$tracking = $this->db->get_where('tracking', array('transaction'=>$trans_id));
    	if ($tracking->num_rows() > 0) {
    		$this->db->update('tracking', $this->input->post(), array('transaction'=>$trans_id));
    		redirect($this->uri->segment(1).'/'.$this->uri->segment(2),'refresh');
    	}else{
    		$this->db->insert('tracking', $this->input->post());
    		redirect($this->uri->segment(1).'/'.$this->uri->segment(2),'refresh');
    	}
    }
    public function contact()
    {
    	$data['title'] = "Admin | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/custom/admin/contact.js";
		$this->load->view('include/admin/header', $data);
		$this->load->view('contact/index');
		$this->load->view('include/admin/footer');
    }
    public function update_status_transaction()
    {
    	$param['trans_id'] = $this->input->post('trans');
    	$data['transaction_status'] = $this->input->post('status');
    	
    	if ($this->db->update('transaction', $data, $param)) {
    		echo json_encode(array('success'=>1, 'message'=>'update success'));
    	}
    }
    public function currency()
    {
    	$data['title'] = "Admin | Generasi Juara";

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/toastr.min.css";

		$data['js'][] = "public/js/toastr.min.js";
		$data['js'][] = "public/js/custom/admin/currency.js";
		$this->load->view('include/admin/header', $data);
		$this->load->view('currency/index');
		$this->load->view('include/admin/footer');
    }
    public function edit_currency_post()
    {
    	foreach ($this->input->post() as $key => $value) {
			$field = strip_tags(trim($key));
			$val = $value;

			$exp = explode(':', $field);
			$curr_id = $exp[1];
			$field = $exp[0];

			if (!empty($curr_id) && !empty($field) && !empty($value)) {
				$this->db->update("currency_converter", array('rates'=>$val), array('id'=>$curr_id));
				echo "Success Updated";
			}
			else{
				echo "Gagal";
			}

		}
    }
}

/* End of file Admin.php */
/* Location: ./application/modules/admin/controllers/Admin.php */