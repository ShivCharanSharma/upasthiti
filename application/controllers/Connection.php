<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Start session to access sessions in CI

class Connection extends CI_Controller {
	
	public function _construct(){
	
		parent::_construct();
		//Load form helper library
		$this->load->helper('form');

		//Load form validation library
		$this->load->library('form_validation');

		//Load Session library
		$this->load->library('session');

		//Load database
		$this->load->model('login_database');
	}
	
	//Show login page
	public function index()
	{             $this->load->library('form_validation');
		 $this->load->view("login_form");

	}

// Validate and store registration data in database
public function new_user_registration() {
                //Load database
                $this->load->model('login_database');

// Check validation for user input in SignUp form
$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('email_value', 'Email', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');
if ($this->form_validation->run() == FALSE) {
$this->load->view('registration_form');
} else {
$data = array(
'login' => $this->input->post('username'),
'email' => $this->input->post('email_value'),
'password' => $this->input->post('password')
);
$result = $this->login_database->registration_insert($data);
if ($result == TRUE) {
$data['message_display'] = 'Registration Successfully !';
$this->load->view('login_form', $data);
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('registration_form', $data);
}
}
}

// Check for user login process
public function login() {
               //Load database
                $this->load->model('login_database');
    $this->load->library('form_validation');
if(isset($this->session->userdata['logged_in'])){
	redirect("/home");
	//$this->load->view('admin_page');
}
//		$this->load->view("login_form");

$this->form_validation->set_rules('login', 'Username', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){
	redirect("/home");
	//$this->load->view('admin_page');
}else{
$this->load->view('login_form');
}
} else {
$data = array(
'login' => $this->input->post('login'),
'password' => $this->input->post('password')
);
file_put_contents("php://stderr",print_r($data,TRUE));
$result = $this->login_database->login($data);
if ($result == TRUE) {

$username = $this->input->post('login');
$result = $this->login_database->read_user_information($username);
if ($result != false) {
$session_data = array(
'login' => $result[0]->login,
'email' => $result[0]->email,
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
	redirect("/home");
	//$this->load->view('admin_page');
}
} else {
$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('login_form', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'login' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('login_form', $data);
}

}
