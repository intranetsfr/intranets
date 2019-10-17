<?php

/**
 *
 */
class User extends CI_Model
{

	function __construct()
	{

	}

	public function _connect($users_id)
	{
		$newdata = array(
			'users_id' => $users_id
		);
		$this->session->set_userdata($newdata);
		return $this->session->userdata('item');;
	}

	public function users_id()
	{
		return $this->session->userdata('users_id');
	}

	public function sign_out()
	{
		$this->session->unset_userdata('users_id');
	}

	public function info($users_id = "")
	{
		if (!empty($users_id)) {
			$this->db->where("users_id", $users_id);
		}
		$users = $this->db->get("users");
		$user = $users->result("array");
		if (isset($user) && isset($user[0])) {
			return $user[0];
		} else {
			return false;
		}
	}
}

?>
