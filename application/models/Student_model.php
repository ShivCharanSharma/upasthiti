<?php
class Student_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
                $this->load->model('Student_model');
        }


        public function get_news($slug = FALSE){
	
	 	if ($slug === FALSE)
	        {
	                $query = $this->db->get('student');
	                return $query->result_array();
	        }
	
	        $query = $this->db->get_where('student', array('URN' => $URN));
	        return $query->row_array();
	}

        public function add_student(){
		$this->load->helper('url');
		
		$slug = url_title($this->input->post('CRN'), 'dash', TRUE);
		
		$data = array(
		/*'title' => $this->input->post('title'),
		'slug' => $slug,
		'text' => $this->input->post('text')*/
			 
			'Fname' => $this->input->post('Fname'), 
			'Lname' => $this->input->post('Lname'),		   
			'CRN' => $this->input->post('CRN'), 
			'URN' => $this->input->post('URN'), 
			'Address' => $this->input->post('Address'), 
			'Phone_No' => $this->input->post('Phone_No'), 
			'DOAdmn' => $this->input->post('DOAdmn'), 

		);

    		return $this->db->insert('student', $data);
	}
}
