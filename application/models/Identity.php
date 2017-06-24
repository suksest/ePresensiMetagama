<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identity extends CI_Model {

	public function login($data)
	{
		$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . md5($data['password']) . "'";
		$this->db->select('*');
		$this->db->from('userLogin');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();

		if (empty($result)) {
			$this->session->set_flashdata('error', 'Username atau Password salah');
			return FALSE;
		} else {
			// $user_type = ($username == "admin" ? 1 : 2);
			$user_type = 1;
			// $sess = array('user_type' => $user_type, 'username' => $data['username'], 'name' => $result->name);
			// $this->set_userdata('loggedin',$sess);
			$this->set_session_data('user_type',$user_type);
			$this->set_session_data('username',$data['username']);
			$this->set_session_data('name',$result->name);
			return TRUE;
		}
	}

	private function set_session_data($key, $value)
	{
		$this->session->set_userdata($key, $value);
	}

	private function get_session_data($key)
	{
		return $this->session->userdata($key);
	}

	public function is_admin()
	{
		// return $this->session->userdata['loggedin']['user_type'] == 1;
		return $this->get_session_data('user_type') == 1;
	}

	// public function is_anggota()
	// {
	// 	return $this->get_session_data('user_type') == 2;
	// }

	// public function get_detail_user($username){
	// 	$condition = "username =" . "'" . $username . "'";
	// 	$this->db->select('*');
	// 	$this->db->from('userLogin');
	// 	$this->db->where($condition);
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();
	// 	$result = $query->result();
	//
	// 	return $result;
	// }

	public function logout()
	{
		$this->session->sess_destroy();
	}
}

?>
