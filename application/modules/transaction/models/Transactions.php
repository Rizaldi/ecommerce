<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Transactions extends CI_Model
{
	public function get_transaction($data = array())
	{
		$this->db->join('user', 'user.user_id = transaction.user_id', 'inner');
		$this->db->join('tracking', 'tracking.transaction = transaction.trans_id', 'left');
		return $this->db->get_where('transaction', $data);
	}
	public function get_purchase($data = array())
	{
		$this->db->join('product', 'product.product_id = purchase.product', 'inner');
		return $this->db->get_where('purchase', $data);
	}
}

/* End of file Transactions.php */
/* Location: ./application/modules/transaction/models/Transactions.php */