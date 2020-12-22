<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class User extends CI_Model
{
	public function users_login($data_login = array())
	{
		return $this->db->get_where('user', $data_login);
	}
}

/* End of file User.php */
/* Location: ./application/modules/user/models/User.php */