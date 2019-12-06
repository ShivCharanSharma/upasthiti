<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('users_model');
                $this->load->helper('url_helper');
        }

	public function index()
	{
		$this->load->view('home/index');
	}
        public function throughVedio()
	{
		//$data['data']=$this->users_model->getUserDetail();
		$this->load->view('attendance/index');
	}
	    public function report()
        {
                $data['data']=$this->input->post('x');
                //file_put_contents('php://stderr', var_dump($data['data']));
               $data['data']=json_decode($data['data'],true);
                $this->load->view('test',$data);
              // return json_encode($data['data']);
        }

}

