<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('users_model');
                $this->load->helper('url_helper');
        }

        public function index()
	{
		$this->load->view("session/login");
		$data['data']=$this->users_model->getUserDetail();
		$this->load->view('test',$data);
        }
}
