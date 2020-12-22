<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Adminz extends CI_Model
{
	public function add_category($data = array())
	{
		return $this->db->insert('category', $data);
	}
	public function add_sub_category($data = array())
	{
		return $this->db->insert('sub_category', $data);
	}
	public function get_category($category_id)
	{
		return $this->db->get_where('sub_category',array('category'=>$category_id));
	}
	public function get_admin($data = array())
	{
		return $this->db->get_where('admin', $data);
	}
}

/* End of file Admin.php */
/* Location: ./application/modules/admin/models/Admin.php */