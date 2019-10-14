<?php
class Users_model extends CI_Model {

        public function __construct()
	{

                $this->load->database();
	}

	public function getUserDetail(){

		$query= $this->db->get('users');
		return $query->row_array();
	}
}
