<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Category extends CI_Model
{
	public function get_category()
	{
		$this->db->select('category_id, category_name, category_slug, icon');
		$query = $this->db->get('category');
		$return = array();

	    foreach ($query->result() as $category)
	    {
	        $return[$category->category_id] = $category;
	        $return[$category->category_id]->sub_category = $this->get_sub_category($category->category_id);
	    }

	    return $return;
	}
	public function get_sub_category($category_id)
	{
		$this->db->select('sub_category_id, sub_category_name, category, sub_category_slug');
		$this->db->where('category', $category_id);
		return $this->db->get('sub_category')->result();
	}
}

/* End of file Category.php */
/* Location: ./application/modules/category/models/Category.php */