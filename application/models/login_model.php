<?php
Class Login_model extends CI_Model
{
	function Login_model()
	{
		parent::__construct();
	}
	
	function login($username, $password)
	{
		$result = $this->db->get_where('trck_users', array('username' => $username, 'password' => $password));
		
		if($result->num_rows() > 0) {
			
			$row = $result->row_array();
			
			return $row;
			
		} else {
			
			return FALSE;
			
		}
		
	}
	
	function register($username, $password)
	{
		//check if username exist.
		$user_exist = $this->db->get_where('trck_users', array('username' => $username));
		//not exist
		if($user_exist->num_rows() == 0) {
			return FALSE;
		}
		
		//check if password was already set
		$pass_exist = $this->db->get_where('trck_users', array('username' => $username, 'password' => NULL), FALSE);
		
		//do not update password
		if($pass_exist->num_rows() == 0) {
			return FALSE;
		}
		
		//update password
		$this->db->where('username', $username);
		$this->db->update('trck_users', array('password' => $password));
		
		return TRUE;
	}
	
}