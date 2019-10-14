<?php

Class Login_Database extends CI_Model {
   public function __construct() {

    }

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether login already exist or not
$condition = "login=" . "'" . $data['user_name'] . "'";
$this->db->select('*');
$this->db->from('users');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('users', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}

// Read data using login and password
public function login($data) {

$condition = "login=" . "'" . $data['login'] . "' AND " . "password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('users');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($username) {

$condition = "login=" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('users');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}

?>
