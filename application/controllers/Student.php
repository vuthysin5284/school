<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->database('default', TRUE); 
        $this->load->library('session');
		//$this->load->library('googlemaps');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }

    function index(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_width']  = "60";
        $page_data['page_name']  = 'student/index';
        $page_data['page_title'] = get_phrase('student');
        $this->load->view('index', $page_data);

    }

	function profile(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
		
		$page_data['page_name']  = 'student/profile/profile';
        $page_data['page_title'] = get_phrase('profile');
        $this->load->view('index', $page_data);
	} 

	function enrolment(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('enrolment');
        $this->load->view('student/enrolment/enrolment_list', $page_data);
    }

    function enrolment_detail_info(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        
        //echo $this->input->post("enrolment_id");
           
        $en_id = $this->input->post('en_id');
        $page_data['page_title'] = get_phrase('enrolment detail info');
        $page_data['data'] = $this->db->select('*')->from('enrolment')->where('id',$en_id)->get()->row();
        
        $this->load->view('student/enrolment/enrolment_detail_info', $page_data);
    }

    function edit_enrolment_detail_info($param1=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;

        $page_data['page_title'] = get_phrase('edit enrolment detail info');
        $page_data['data'] = $this->db->select('*')->from('enrolment')->where('id',$obj->id)->get()->row();
        $this->load->view('student/enrolment/enrolment_detail_info', $page_data);

    }
    // student general info
    function student_general(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('student_general');
        $this->load->view('student/enrolment/student_general', $page_data);
    }
    // parent info
    function parent(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('parent');
        $this->load->view('student/enrolment/parent', $page_data);
    }
    // responsible
    function responsible(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('responsible');
        $this->load->view('student/enrolment/responsible', $page_data);
    }
    // assign_class
    function assign_class(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('assign_class');
        $this->load->view('student/enrolment/assign_class', $page_data);
    }

    // get enrolment data grid
    public function get_enrolment_data(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        // DB table to use
        $table = 'enrolment where is_delete=0' ;														// Field
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id',                     'dt' => "id",                   'field' => 'id'),
            array('db' => 'name',                   'dt' => "name",                 'field' => 'name'),
            array('db' => 'email',                  'dt' => "email",                'field' => 'email'),
            array('db' => 'address',                'dt' => "address",              'field' => 'address'),
            array('db' => 'status',                 'dt' => "status",               'field' => 'status'),
            array('db' => 'is_delete',              'dt' => "is_delete",            'field' => 'is_delete')
        );
         $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }
	 
} 