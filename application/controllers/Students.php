<?php

defined('BASEPATH') or exit ('Direct access forbidden');

class Students extends CI_Controller {

        public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Student_model');
		$this->load->helper('url_helper');
	}

	public function create(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Enter new student details';
		$this->form_validation->set_rules('CRN','CRN', 'required');
		$this->form_validation->set_rules('URN','URN', 'required');
		$this->form_validation->set_rules('DOAdmn','DOAdmn', 'required');

		if($this->form_validation->run() === False){
			$this->load->view('students/create.php');
		}

		else{
			$this->Student_model->add_student();
		       	$this->load->view('students/success');	
		}	
	}
}

?>
