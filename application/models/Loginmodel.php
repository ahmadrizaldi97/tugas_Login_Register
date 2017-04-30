<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	public function login($username, $password)
	{
		$this->db->select('id,username,password');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));

		$query = $this->db->get();
		if ($query->num_rows() ==1) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function insert()
	{
		$password =$this->input->post('password');
		$object = array(
			'username' => $this->input->post('username'), 
			'password' => MD5($password)
			);

		$this->db->insert('user',$object);
	}

}

/* End of file Loginmodel.php */
/* Location: ./application/models/Loginmodel.php */

 ?>