<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Transaction extends MX_Controller
{
	
	function __construct()
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
        $this->load->model('transaction/transactions');
	}
    public function jl_pay()
    {
        $data = (array)json_decode(file_get_contents('php://input'));

    	// $data = $this->input->post();
        if(!empty($data)){
            $data_insert = array();
            // $data_insert['product_id'] = 12;
            if(isset($data["transaction_id"])) $data_insert["transaction_id"]         = $data["transaction_id"];
            if(isset($data["order_id"])) $data_insert["order_id"]                     = $data["order_id"];
            if(isset($data["payment_type"])) $data_insert["payment_type"]             = $data["payment_type"];
            if(isset($data["transaction_status"])) $data_insert["transaction_status"] = $data["transaction_status"];
            if(isset($data["gross_amount"])) $data_insert["gross_amount"]             = $data["gross_amount"];
            if(isset($data["fraud_status"])) $data_insert["fraud_status"]             = $data["fraud_status"];
            if(isset($data["approval_code"])) $data_insert["approval_code"]           = $data["approval_code"];
            if(isset($data["signature_key"])) $data_insert["signature_key"]           = $data["signature_key"];
            if(isset($data["transaction_time"])){
                $datetime = strtotime($data["transaction_time"]);
                $data_insert["transaction_time"] = date("Y-m-d H:i:s", $datetime);
            }
            if(isset($data["status_message"])) $data_insert["status_message"]         = $data["status_message"];
            if(isset($data["status_code"])) $data_insert["status_code"]               = $data["status_code"];
            if(isset($data["biller_code"])) $data_insert["biller_code"]               = $data["biller_code"];
            if(isset($data["bill_key"])) $data_insert["bill_key"]                     = $data["bill_key"];
            if(isset($data["custom_field3"])) $data_insert["custom_field3"]           = $data["custom_field3"];
            if(isset($data["custom_field2"])) $data_insert["custom_field2"]           = $data["custom_field2"];
            if(isset($data["custom_field1"])) $data_insert["custom_field1"]           = $data["custom_field1"];
            if(isset($data["masked_card"])) $data_insert["masked_card"]               = $data["masked_card"];
            if(!empty($data['bank'])){
                if(isset($data["bank"])) $data_insert["bank"]                             = $data["bank"];
            }
            // BNI && ATM Network
            if(!empty($data["va_numbers"])) {
                foreach($data['va_numbers'] as $van){
                    $data_insert["bank"] = $van->bank;
                    $data_insert["va_numbers"] = $van->va_number;
                }
            }
            // mandiri
            if ($data['payment_type'] == 'echannel') {
                $data_insert["bank"] = 'mandiri';
                $data_insert["va_numbers"] = $data['bill_key'];
            }
            // Permata
            if (!empty($data['permata_va_number'])) {
                $data_insert['bank'] = 'permata';
                $data_insert['va_numbers'] = $data['permata_va_number'];
            }

            //BCA KlikPay

            // Klik BCA

            // CIMB Cliks

            //Mandiri KlikPay

            //Indomaret

            if (!empty($data['store'])) {
                if ($data['store'] == 'indomaret') {
                    $data_insert['bank'] = 'indomaret';
                    $data_insert['va_numbers'] = $data['payment_code'];
                }
            }

            //Gopay

            //Danamon Online Bank

            if(isset($data["eci"])) $data_insert["eci"]               = $data["eci"];
            if(isset($data["pdf_url"])) $data_insert["pdf_url"]       = $data["pdf_url"];

            $data_insert["log_json"]                                  = json_encode($data);
            $data_transaction = $this->db->get_where('transaction', array("transaction_id" => $data["transaction_id"], "order_id
                " => $data["order_id"]));
            $param_id = array('transaction_id'=>$data['transaction_id'], 'order_id'=>$data['order_id']);;
            if ($this->db->get_where('transaction', $param_id)->num_rows() > 0) {
                $ins = $this->db->update("transaction", $data_insert, $param_id);
            }else{
                $ins = $this->db->insert("transaction", $data_insert);
            }
            //check if $ins success
            if($ins){
                $resp_message = "Insert success";
                $responses = array(
                    "message" => $resp_message,
                    "data" => $this->db->get_where("transaction",array("trans_id"=>$this->db->insert_id()))->result(),
                );
            }
            else{
                $resp_message = "Insert Error";
                $responses = array(
                    "message" => $resp_message,
                    "data" => null,
                );
            }
            echo json_encode($responses);
        }
    }
    public function finish_pay()
    {
    	// print_r($this->session->userdata('cart_item'));
    	$product_id = [];
    	foreach ($this->session->userdata('cart_item') as $cart) {
    		$product_id[] = $cart['product_id'];
    	}
    	$product_id = implode(",", array_filter($product_id));
    	$user_id = $this->session->userdata('data_session')->user_id;
        $shipping = $this->session->userdata('shipping')['total_product_shipping'];
        $shipping_cost = $this->session->userdata('shipping')['total_product_cost'];
        $total_product_net_amount = $this->session->userdata('shipping')['total_product_net_amount'];

    	$result_data = $this->input->post('result_data');

	    $data_midtrans = (array)json_decode($result_data);

	    $transaction_id = $data_midtrans['transaction_id'];
	    $order_id = $data_midtrans['order_id'];

	    $data_param = array(
	        "transaction_id" => $transaction_id,
	        "order_id"       => $order_id);

	    $data_update = array(
	        "product_id"       => $product_id,
            "user_id"       => $user_id,
            "shipping"       => $shipping,
            "shipping_cost"       => $shipping_cost,
	        "net_amount"       => $total_product_net_amount
	        // "pdf_url"       => $data_midtrans['pdf_url']
	    );
        $select_transaction = $this->db->get_where('transaction',$data_param);
        if ($select_transaction->num_rows() == 1) {
            $transaction = $this->db->update("transaction", $data_update, $data_param);
            $get_tracking = $this->db->get_where('transaction', $data_param)->row();
            $tracking = $this->db->insert('tracking', array('transaction'=>$get_tracking->trans_id));
        }else{
            $data_insert['user_id'] = $user_id;
            $data_insert['product_id'] = $product_id;
            
            $data_insert['shipping'] = $shipping;
            $data_insert['shipping_cost'] = $shipping_cost;
            $data_insert['net_amount'] = $total_product_net_amount;

            if(isset($data_midtrans["transaction_id"])) $data_insert["transaction_id"]         = $data_midtrans["transaction_id"];
            if(isset($data_midtrans["order_id"])) $data_insert["order_id"]                     = $data_midtrans["order_id"];
            if(isset($data_midtrans["payment_type"])) $data_insert["payment_type"]             = $data_midtrans["payment_type"];
            if(isset($data_midtrans["transaction_status"])) $data_insert["transaction_status"] = $data_midtrans["transaction_status"];
            if(isset($data_midtrans["gross_amount"])) $data_insert["gross_amount"]             = $data_midtrans["gross_amount"];
            if(isset($data_midtrans["fraud_status"])) $data_insert["fraud_status"]             = $data_midtrans["fraud_status"];
            if(isset($data_midtrans["approval_code"])) $data_insert["approval_code"]           = $data_midtrans["approval_code"];
            if(isset($data_midtrans["signature_key"])) $data_insert["signature_key"]           = $data_midtrans["signature_key"];
            if(isset($data_midtrans["transaction_time"])){
                $datetime = strtotime($data_midtrans["transaction_time"]);
                $data_insert["transaction_time"] = date("Y-m-d H:i:s", $datetime);
            }
            if(isset($data_midtrans["status_message"])) $data_insert["status_message"]         = $data_midtrans["status_message"];
            if(isset($data_midtrans["status_code"])) $data_insert["status_code"]               = $data_midtrans["status_code"];
            if(isset($data_midtrans["biller_code"])) $data_insert["biller_code"]               = $data_midtrans["biller_code"];
            if(isset($data_midtrans["bill_key"])) $data_insert["bill_key"]                     = $data_midtrans["bill_key"];
            if(isset($data_midtrans["custom_field3"])) $data_insert["custom_field3"]           = $data_midtrans["custom_field3"];
            if(isset($data_midtrans["custom_field2"])) $data_insert["custom_field2"]           = $data_midtrans["custom_field2"];
            if(isset($data_midtrans["custom_field1"])) $data_insert["custom_field1"]           = $data_midtrans["custom_field1"];
            if(isset($data_midtrans["masked_card"])) $data_insert["masked_card"]               = $data_midtrans["masked_card"];
            if(!empty($data_midtrans['bank'])){
                if(isset($data_midtrans["bank"])) $data_insert["bank"]                             = $data_midtrans["bank"];
            }

            // BNI && ATM Network
            if(!empty($data_midtrans["va_numbers"])) {
                foreach($data_midtrans['va_numbers'] as $van){
                    $data_insert["bank"] = $van->bank;
                    $data_insert["va_numbers"] = $van->va_number;
                }
            }
            // mandiri
            if ($data_midtrans['payment_type'] == 'echannel') {
                $data_insert["bank"] = 'mandiri';
                $data_insert["va_numbers"] = $data_midtrans['bill_key'];
            }
            // Permata
            if (!empty($data_midtrans['permata_va_number'])) {
                $data_insert['bank'] = 'permata';
                $data_insert['va_numbers'] = $data_midtrans['permata_va_number'];
            }

            //BCA KlikPay

            // Klik BCA

            // CIMB Cliks

            //Mandiri KlikPay

            //Indomaret

            if (!empty($data_midtrans['store'])) {
                if ($data_midtrans['store'] == 'indomaret') {
                    $data_insert['bank'] = 'indomaret';
                    $data_insert['va_numbers'] = $data_midtrans['payment_code'];
                }
            }
            if(isset($data_midtrans["eci"])) $data_insert["eci"]               = $data_midtrans["eci"];
            if(isset($data_midtrans["pdf_url"])) $data_insert["pdf_url"]       = $data_midtrans["pdf_url"];

            $data_insert["log_json"]                                  = json_encode($data_midtrans);

            $transaction = $this->db->insert('transaction', $data_insert);

            $tracking = $this->db->insert('tracking', array('transaction'=>$this->db->insert_id()));
        }
        unset($_SESSION['cart_item']['total_product_checkout']);
        $_SESSION['cart_item'] = array_values($_SESSION['cart_item']);
        foreach ($this->session->userdata('cart_item') as $item_cart) {
            $purchase['transaction_id'] = $transaction_id;
            $purchase['order_id'] = $order_id;
            $purchase['product'] = $item_cart['product_id'];
            $purchase['qty'] = $item_cart['quantity'];
            $purchase['total'] = $item_cart['price_quantity'];
            $this->db->insert('purchase', $purchase);
            // print_r($item_cart);
        }
        if($transaction){
            $get_id = $this->db->get_where('transaction', $data_param)->row();
            redirect('transaction/invoice/'.$this->mycrypt->encryptIt($get_id->order_id), 'refresh');
        }
    }
    public function invoice()
    {
        $order_id = $this->mycrypt->decryptIt($this->uri->segment(3));

    	$data['title'] = "Invoice | Generasi Juara";
        $data['category'] = $this->category->get_category();
        $data['transaction'] = $this->transactions->get_transaction(array('order_id'=>$order_id))->row();
        $data['purchase'] = $this->transactions->get_purchase(array('order_id'=>$order_id));
        $data['css'][] = "public/css/custom-margin-padding.css";
        $data['css'][] = "public/css/toastr.min.css";
        $data['js'][] = "public/js/jquery.number.js";
        $data['js'][] = "public/js/toastr.min.js";
        $data['js'][] = "public/js/custom/transaction.js";
        $this->load->view('include/header', $data);
        $this->load->view('invoice/index');
        $this->load->view('include/footer');
    }
    public function detail_tracking()
    {
        $resi = $this->input->post('tracking_resi');
        $jasa = $this->input->post('tracking_jasa');

        if ($jasa == "jne"){
            $base = "https://track.aftership.com/jne/$resi?";
    
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_URL, $base);
            curl_setopt($curl, CURLOPT_REFERER, $base);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $str = curl_exec($curl);
            curl_close($curl);
            echo "<h1>$jasa</h1>";
            $start = "<div class=\"checkpoints\">";
            $end   = "Date & time are usually";
            $startPosisition = strpos($str, $start);
            $endPosisition   = strpos($str, $end); 
            
            $longText = $endPosisition - $startPosisition;
            
            $result = substr($str, $startPosisition, $longText);
            print_r($result);

        }
        if ($jasa == "pos"){
            $base = "https://track.aftership.com/pos-indonesia/$resi?";
            
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_URL, $base);
            curl_setopt($curl, CURLOPT_REFERER, $base);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $str = curl_exec($curl);
            curl_close($curl);
            
            echo "<h1>$jasa</h1>";
            
            $start = "<div class=\"checkpoints\">";
            $end   = "Date & time are usually";
            $startPosisition = strpos($str, $start);
            $endPosisition   = strpos($str, $end); 
            
            $longText = $endPosisition - $startPosisition;
            
            $result = substr($str, $startPosisition, $longText);
            
            $result2 = $this->hilangkan($result);
            
            
            if (empty($result2)){
                echo "Harap Cek Kembali...";
            }
            else{
                echo $result2;
            }
        }
        if ($jasa == "tiki"){
            $base = "https://track.aftership.com/tiki/$resi?";
            
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_URL, $base);
            curl_setopt($curl, CURLOPT_REFERER, $base);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $str = curl_exec($curl);
            curl_close($curl);
            
            echo "<h1>$jasa</h1>";
            $start = "<div class=\"checkpoints\">";
            $end   = "Date & time are usually";
            $startPosisition = strpos($str, $start);
            $endPosisition   = strpos($str, $end); 
            
            $longText = $endPosisition - $startPosisition;
            
            $result = substr($str, $startPosisition, $longText);

            $result2 = $this->hilangkan($result);
            
            if (empty($result2)){
                echo "Harap Cek Kembali...";
            }
            else{
                echo $result2;
            }
        }
    }
    public function manual_transfer()
    {
        // print_r($this->input->post());
        // print_r($this->session->userdata());
        $product_id = [];
        foreach ($this->session->userdata('cart_item') as $cart) {
            $product_id[] = $cart['product_id'];
        }
        $data['product_id'] = implode(",", array_filter($product_id));
        if ($this->session->userdata('data_session')->user_id == null) {
            $data['user_id'] = rand();
        }else{
            $data['user_id'] = $this->session->userdata('data_session')->user_id;
        }
        $data['shipping'] = 0;
        $data['shipping_cost'] = 0;
        $data['net_amount'] = $this->session->userdata('shipping')['total_product_net_amount'];
        $data['gross_amount'] = $this->session->userdata('shipping')['total_product_net_amount'];
        $data['transaction_id'] = rand();
        $data['order_id'] = rand();

        $data['payment_type'] = 'bank_transfer';
        $data['transaction_status'] = 'pending';
        $data['fraud_status'] = 'accept';

        $data['status_code'] = 201;
        $data['bank'] = $this->input->post('bank');

        $data['account_number'] = $this->input->post('account_number');
        $data['account_name'] = $this->input->post('account_name');
        $data['transaction_time'] = date("Y-m-d h:i:s");
        $data['transaction_date'] = date("Y-m-d h:i:s");
        $data['status_trans'] = 2;

        unset($_SESSION['cart_item']['total_product_checkout']);
        $_SESSION['cart_item'] = array_values($_SESSION['cart_item']);

        if ($this->db->insert('transaction', $data)) {
            foreach ($this->session->userdata('cart_item') as $item_cart) {
                $purchase['transaction_id'] = $data['transaction_id'];
                $purchase['order_id'] = $data['order_id'];
                $purchase['product'] = $item_cart['product_id'];
                $purchase['qty'] = $item_cart['quantity'];
                $purchase['total'] = $item_cart['price_quantity'];
                $this->db->insert('purchase', $purchase);
                // print_r($item_cart['price_quantity']);
            }
            $get_id = $this->db->get_where('transaction', array('transaction_id'=>$data['transaction_id'], 'order_id'=>$data['order_id']))->row();
            redirect('transaction/invoice/'.$this->mycrypt->encryptIt($get_id->order_id), 'refresh');
        }

    }
    public function hilangkan($str)
    {
        $str = trim($str);
        $search = array ("'Indonesia'");
        $replace = array ("");

        $str = preg_replace($search,$replace,$str);
        return $str;
    }
    public function transaction_upload()
    {
        if (!empty($_FILES['file']['name'])) {
            $data['transfer_receipt'] = $this->upload_files('public/img/transfer_receipt/' ,'receipt_'.rand(), $_FILES['file']);
            $data['transaction_status'] = 'capture';
            $param['trans_id'] = $this->input->post('transaction');
            if ($this->db->update('transaction', $data, $param)) {
                echo json_encode(array('success'=>1, 'message'=>'upload_success'));
            }
        }else{
            echo "string";
        }
    }
    public function transfer_img()
    {
        echo json_encode(array('transfer_receipt'=>$this->db->select('transfer_receipt')->get_where('transaction',array('trans_id'=>$this->input->post('trans')))->row()->transfer_receipt));
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

        $_FILES['file']['name']= $files['name'];
        $_FILES['file']['type']= $files['type'];
        $_FILES['file']['tmp_name']= $files['tmp_name'];
        $_FILES['file']['error']= $files['error'];
        $_FILES['file']['size']= $files['size'];

        $fileName = $title .'_'. $_FILES['file']['name'];

        $images = $fileName;

        $config['file_name'] = $fileName;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $this->upload->data();
        } else {
            return false;
        }
        return $images;
    }
}

/* End of file Transaction.php */
/* Location: ./application/modules/transaction/controllers/Transaction.php */