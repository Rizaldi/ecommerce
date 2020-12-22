<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends MX_Controller
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
		$data['title'] = "Jual Beli Produk .com";
		$data['category'] = $this->category->get_category();

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/toastr.min.css";
		$data['js'][] = "public/js/jquery.number.js";
		$data['js'][] = "public/js/toastr.min.js";
		$data['js'][] = "public/js/custom/cart.js";
		// $product_id = array();
		// foreach ($this->session->userdata('cart_item') as $product_cart) {
		// 	$product_id[] = $product_cart['product_id'];
		// }
		// $product_id = implode(',', $product_id);
		// $data['product_cart'] = $this->product->get_product_cart($product_id)->result();
		$this->load->view('include/header', $data);
		$this->load->view('index');
		$this->load->view('include/footer');
	}
	public function add_to_cart()
	{
		// print_r($this->input->post('afl'));
		$afl = $this->input->post('afl');
		$product_id = $this->input->post('product_id');
		$price_product = $this->input->post('price_product');
		$qty = $this->input->post('qty');
		$product = $this->product->get_product_cart($product_id)->row();
		$itemArray = array($product->product_id=>array('title'=>$product->title, 'product_id'=>$product->product_id, 'quantity'=>$qty, 'price'=>$product->sale_price, 'afl' => $afl, 'price_quantity' => $qty * $product->sale_price, 'front_image' => $product->front_image, 'product_encrypted_id'=>$this->mycrypt->encryptIt($product->product_id), 'weight'=> $product->weight * $qty));

		if(!empty($qty)) {
			if(!empty($this->session->userdata('cart_item'))) {
				if(in_array($product->product_id,array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
						if($product->product_id == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] += $qty;
							$_SESSION["cart_item"][$k]["afl"] += $afl;
							$_SESSION["cart_item"][$k]["price_quantity"] += $product->sale_price * $qty;
							$_SESSION["cart_item"][$k]["weight"] += $product->weight * $qty;
						}
					}
				} else {
					$_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
				}
				print_r($this->session->userdata('cart_item'));
			} else {
				print_r($itemArray);
				print_r($this->session->userdata('cart_item'));
				$this->session->set_userdata('cart_item',$itemArray);
			}
		}
		print_r($this->session->userdata('cart_item'));
		echo json_encode("add to cart");
	}
	public function update_cart()
	{
		$product_id = $this->input->post('product_id');
		$price_product = $this->input->post('price_product');
		$qty = $this->input->post('qty');
		$product = $this->product->get_product_cart($product_id)->row();
		$itemArray = array($product->product_id=>array('title'=>$product->title, 'product_id'=>$product->product_id, 'quantity'=>$qty, 'price'=>$product->sale_price, 'price_quantity' => $qty * $product->sale_price, 'front_image' => $product->front_image, 'product_encrypted_id'=>$this->mycrypt->encryptIt($product->product_id), 'weight'=> $product->weight * $qty));

		if(!empty($qty)) {
			
			if(!empty($this->session->userdata('cart_item'))) {
				if(in_array($product->product_id,array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
						if($product->product_id == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] = $qty;
							$_SESSION["cart_item"][$k]["price_quantity"] = $product->sale_price * $qty;
							$_SESSION["cart_item"][$k]["weight"] = $product->weight * $qty;
						}
					}
				} else {
					$_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
				}
			} else {
				$this->session->set_userdata('cart_item',$itemArray);
			}
		}
		echo json_encode("Update Success");
	}
	public function delete_cart()
	{
		$product_id = $this->mycrypt->decryptIt($this->uri->segment(3));
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
				if($product_id == $k)
					unset($_SESSION["cart_item"][$k]);				
				if(empty($_SESSION["cart_item"]))
					unset($_SESSION["cart_item"]);
			}
		}
		$this->session->set_flashdata('toast_delete_cart', 1);
		redirect('cart','refresh');
	}
	public function checkout()
	{

		$data['title'] = "Jual Beli Produk .com";
		$data['category'] = $this->category->get_category();
		// $data['data_city'] = $this->curl_request->curl_get($this->ongkir_city, '', $this->key_auth);

		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/select2.min.css";
		$data['js'][] = "public/js/select2.min.js";
		$data['js'][] = "public/js/jquery.number.js";
		$data['js'][] = "public/js/custom/checkout.js";
		
		$this->load->view('include/header', $data);
		$this->load->view('checkout/index');
		$this->load->view('include/footer');
	}
	public function checkout_token()
	{
		$params = array('server_key' => 'SB-Mid-server-IlzQT8rnF_eSourOyOe4g9Zu', 'production' => false);

	    $this->load->library('midtrans');
	    $this->midtrans->config($params);        

	    $id_book = $this->input->post('id_book');
	    $url_redirect = $this->input->post('url_redirect');

        // $transaction_details = array(
        //   'order_id' => rand(),
        //   'gross_amount' => 5000,
        // );
        // $customer_details = array(
        //     'email'            => $this->session->userdata('data_session')->email
        // );
        // $transaction = array(
        //   'transaction_details' => $transaction_details,
        //   'customer_details' => $customer_details
        // );

        $transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $this->session->userdata('cart_item')['total_product_checkout'],
		);

		// Optional
		// $item1_details = array(
		//   'id' => 'a1',
		//   'price' => 15999000,
		//   'quantity' => 2,
		//   'name' => "ACER SWIFT 3 INFINITY WAR IRON MAN"
		// );

		// // Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 14799000,
		//   'quantity' => 3,
		//   'name' => "Acer Nitro 5 THANOS Edition"
		// );

		// // $item1_details = array(
		// //   'id' => 'a1',
		// //   'price' => 15000,
		// //   'quantity' => 2,
		// //   'name' => "ACER SWIFT 3 INFINITY WAR IRON MAN"
		// // );

		// // // Optional
		// // $item2_details = array(
		// //   'id' => 'a2',
		// //   'price' => 14000,
		// //   'quantity' => 3,
		// //   'name' => "Acer Nitro 5 THANOS Edition"
		// // );
		// // $item = [];
		// // foreach ($this->session->userdata('cart_item') as $item_cart) {
		// // 	$data_item['id'] 	   = $item_cart['product_encrypted_id'];
		// // 	$data_item['price']    = $item_cart['price'];
		// // 	$data_item['quantity'] = $item_cart['quantity'];
		// // 	$data_item['name']     = $item_cart['title'];
		// // 	$item[]				   = $data_item;
		// // }


		// // Optional
		// $item_details = array($item1_details, $item2_details);

		// // foreach ($this->session->userdata('data_session') as $session_data) {
		// 	$data_session['first_name'] 	   = $this->session->userdata('data_session')->username;
		// 	$data_session['last_name']    = $this->session->userdata('data_session')->surname;
		// 	$data_session['address'] = $this->session->userdata('data_session')->address1;
		// 	$data_session['city']     = 'Papua';
		// 	$data_session['phone']     = $this->session->userdata('data_session')->phone;
		// 	$data_session['country_code']     = 'IDN';
		// 	$billing_address[]				   = $data_session;
		// 	$shipping_address[]				   = $data_session;
		// // }
		// // Optional
		$billing_address = array(
		  'first_name'    => (!$this->session->userdata('data_session')) ? $this->input->post('username') : $this->session->userdata('data_session')->username,
		  'last_name'     => (!$this->session->userdata('data_session')) ? $this->input->post('surname') : $this->session->userdata('data_session')->surname,
		  'address'       => (!$this->session->userdata('data_session')) ? $this->input->post('email') : $this->session->userdata('data_session')->address1,
		  'city'          => "Papua",
		  'phone'         => (!$this->session->userdata('data_session')) ? $this->input->post('phone') : $this->session->userdata('data_session')->phone,
		  'country_code'  => 'IDN'
		);

		// // Optional
		$shipping_address = array(
		  'first_name'    => (!$this->session->userdata('data_session')) ? $this->input->post('username') : $this->session->userdata('data_session')->username,
		  'last_name'     => (!$this->session->userdata('data_session')) ? $this->input->post('surname') : $this->session->userdata('data_session')->surname,
		  'address'       => (!$this->session->userdata('data_session')) ? $this->input->post('email') : $this->session->userdata('data_session')->address1,
		  'city'          => "Depok",
		  'phone'         => (!$this->session->userdata('data_session'))  ? $this->input->post('phone') : $this->session->userdata('data_session')->phone,
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => (!$this->session->userdata('data_session')) ? $this->input->post('username') : $this->session->userdata('data_session')->username,
		  'last_name'     => (!$this->session->userdata('data_session')) ? $this->input->post('surname') : $this->session->userdata('data_session')->surname,
		  'email'         => (!$this->session->userdata('data_session')) ? $this->input->post('email') : $this->session->userdata('data_session')->email,
		  'phone'         => (!$this->session->userdata('data_session'))  ? $this->input->post('phone') : $this->session->userdata('data_session')->phone,
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Fill transaction details
		$transaction = array(
		  'transaction_details' => $transaction_details,
		  'customer_details' => $customer_details
		);

        $snapToken = $this->midtrans->getSnapToken($transaction);
        error_log($snapToken);
        echo $snapToken;
        // print_r($item);
	}
	public function checkout_shipping_total()
	{
		// $data_shipping_id = $this->input->post('data_shipping_id');
		// $data_shipping_text = $this->input->post('data_shipping_text');

		// $resval_shipping = (array)json_decode($data_shipping_id, true);
		$total_product = 0;
		foreach ($this->session->userdata('cart_item') as $product_cart) {
			$total_product += ($product_cart["price"]*$product_cart["quantity"]);
		}

		$total_product_checkout = $total_product;
		$total_product_shipping = 0;
		$total_product_cost = 0;

		$_SESSION["cart_item"]['total_product_checkout'] = $total_product_checkout;
		$_SESSION["shipping"]['total_product_shipping'] = $total_product_shipping;
		$_SESSION["shipping"]['total_product_cost'] = $total_product_cost;
		$_SESSION["shipping"]['total_product_net_amount'] = $total_product;
		// print_r($resval_shipping);
		echo json_encode(array("code"=>200, "status_shipping"=>"selected", "shipping_cost"=>0, "total_product_checkout"=>$total_product_checkout));
	}
	public function checkout_payment()
	{
		$this->load->view('checkout/payment');
	}
	public function checkout_update_address()
	{
		$this->session->userdata('data_session')->address1 = $this->input->post('address1');
		// $this->session->userdata('data_session')->province = $this->input->post('province');
		// $this->session->userdata('data_session')->city = $this->input->post('city');

		if ($this->db->update('user', $this->input->post(), array('user_id'=>$this->session->userdata('data_session')->user_id))) {
			echo json_encode(array("success"=>1, "message"=>"success update"));
		}
	}
}

/* End of file Cart.php */
/* Location: ./application/modules/cart/controllers/Cart.php */