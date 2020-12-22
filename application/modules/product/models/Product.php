<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Product extends CI_Model
{
	public function get_product_category($category_slug, $sub_category_slug = '', $number, $offset, $order_by)
	{
		$get_category = $this->db->get_where('category',array('category_slug'=>$category_slug))->row();
		$get_sub_category = $this->db->get_where('sub_category',array('category'=>$get_category->category_id));

		$get_sub_category_slug = $this->db->get_where('sub_category',array('sub_category_slug'=>$sub_category_slug));
		
		$this->db->select('product_id,category, title, front_image, sale_price, rating_num, rating_total, title_slug');
		
		if ($order_by == 'price') {
			$this->db->order_by('sale_price', 'asc');
		}elseif ($order_by == 'name') {
			$this->db->order_by('title', 'desc');
		}else{
			$this->db->order_by('product_id', 'desc');
		}
		if ($get_sub_category_slug->num_rows() > 0) {
			$this->db->where('sub_category', $get_sub_category_slug->row()->sub_category_id);
		}
		$query = $this->db->get_where('product', array('category'=>$get_category->category_id), $number,$offset);

		$data_return['data_product'] = $query->result();
		$data_return['category_slug'] = $get_category->category_slug;
		if ($get_sub_category->num_rows() > 0) {
			$data_return['sub_category_slug'] = $get_sub_category->row()->sub_category_slug;
		}
	    return $data_return;
	}
	public function count_product_category($category_slug)
	{
		$get_category = $this->db->get_where('category',array('category_slug'=>$category_slug))->row();

		$this->db->select('product_id,category title, front_image, sale_price');
		$this->db->order_by('product_id', 'desc');
		$query = $this->db->get_where('product', array('category'=>$get_category->category_id));
	    return $query->num_rows();
	}
	public function get_detail_product($title_slug)
	{
		$this->db->select('product_id,category, title, front_image, sale_price, rating_num, rating_total, title_slug, description, short_description');
		$this->db->order_by('product_id', 'desc');
		$product = $this->db->get_where('product', array('title_slug'=>$title_slug))->row();

		$return = array();
       
        $return = $product;
        $return->product_image = $this->get_product_image($product->product_id);
	   
	    return $return;
	}
	public function get_product_image($product_id)
	{
		$this->db->where('product', $product_id);
		return $this->db->get('product_image')->result();
	}
	public function get_product_cart($product_id)
	{
		$this->db->select('product_ids, title, front_image, sale_price');
		$this->db->order_by('product_id', 'desc');
		$this->db->where_in('product_id', $product_id);
		$product = $this->db->query('SELECT `product_id`, `title`, `front_image`, `sale_price`, `weight` FROM `product` WHERE `product_id` IN('.$product_id.') ORDER BY `product_id` DESC');

		return $product;
	}
	public function get_product_new()
	{
		$data_product = array();
		$this->db->select('product_id, category, sub_category, title, front_image, sale_price, rating_num, rating_total, title_slug');
		$this->db->order_by('product_id', 'desc');
		$query = $this->db->get('product',5);
		foreach ($query->result() as $key_product => $row_product) {
			$data_product[$key_product] = $row_product;
			$data_product[$key_product]->category_title = $this->db->get_where('category',array('category_id'=>$row_product->category))->row()->category_slug;
			$data_product[$key_product]->sub_category_title = ($this->db->get_where('sub_category',array('sub_category_id'=>$row_product->sub_category))->num_rows() > 0) ? $this->db->get_where('sub_category',array('sub_category_id'=>$row_product->sub_category))->row()->sub_category_slug : '';
		}
	    return $data_product;
	}
	public function get_product_onsale()
	{
		$data_product = array();
		$this->db->select('product_id, category, sub_category, title, front_image, sale_price, rating_num, rating_total, title_slug');
		$this->db->order_by('product_id', 'desc');
		$query = $this->db->get_where('product',array('on_sale'=>1),5);
		foreach ($query->result() as $key_product => $row_product) {
			$data_product[$key_product] = $row_product;
			$data_product[$key_product]->category_title = $this->db->get_where('category',array('category_id'=>$row_product->category))->row()->category_slug;
			$data_product[$key_product]->sub_category_title = ($this->db->get_where('sub_category',array('sub_category_id'=>$row_product->sub_category))->num_rows() > 0) ? $this->db->get_where('sub_category',array('sub_category_id'=>$row_product->sub_category))->row()->sub_category_slug : '';
		}
	    return $data_product;
	}
	public function get_product_best()
	{
		$data_product = array();
		$this->db->distinct();
		$this->db->select('product_id, category, sub_category, title, front_image, sale_price, rating_num, rating_total, title_slug');
		$this->db->join('purchase', 'product.product_id = purchase.product', 'inner');
		$this->db->order_by('product', 'desc');
		$query = $this->db->get('product',5);
		foreach ($query->result() as $key_product => $row_product) {
			$data_product[$key_product] = $row_product;
			$data_product[$key_product]->category_title = $this->db->get_where('category',array('category_id'=>$row_product->category))->row()->category_slug;
			$data_product[$key_product]->sub_category_title = ($this->db->get_where('sub_category',array('sub_category_id'=>$row_product->sub_category))->num_rows() > 0) ? $this->db->get_where('sub_category',array('sub_category_id'=>$row_product->sub_category))->row()->sub_category_slug : '';
		}
	    return $data_product;
	}
	public function search($product)
	{
		$this->db->select('*');
		
		if ($order_by == 'price') {
			$this->db->order_by('sale_price', 'asc');
		}elseif ($order_by == 'name') {
			$this->db->order_by('title', 'desc');
		}else{
			$this->db->order_by('product_id', 'desc');
		}
		if ($get_sub_category_slug->num_rows() > 0) {
			$this->db->where('sub_category', $get_sub_category_slug->row()->sub_category_id);
		}
		$query = $this->db->get_where('product', array('category'=>$get_category->category_id), $number,$offset);

		$data_return['data_product'] = $query->result();
		$data_return['category_slug'] = $get_category->category_slug;
		if ($get_sub_category->num_rows() > 0) {
			$data_return['sub_category_slug'] = $get_sub_category->row()->sub_category_slug;
		}
	    return $data_return;
	}
}

/* End of file Product.php */
/* Location: ./application/modules/product/models/Product.php */