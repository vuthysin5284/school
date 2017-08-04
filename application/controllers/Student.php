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
        $page_data['page_name']  = 'student/index';
        $page_data['page_title'] = get_phrase('student');
        $this->load->view('index', $page_data);

    }

	function profile(){
		
		$page_data['page_name']  = 'student/profile/profile';
        $page_data['page_title'] = get_phrase('profile');
        $this->load->view('index', $page_data);
	} 

	function enrolment(){
        $page_data['page_title'] = get_phrase('enrolment');
        $this->load->view('student/enrolment/enrolment_list', $page_data);
    }

    function enrolment_detail_info(){
        $page_data['page_title'] = get_phrase('enrolment detail info');
        $page_data['page_data'] = $this->db->select('*')->from('enrolment')->get()->result();
        $this->load->view('student/enrolment/enrolment_detail_info', $page_data);
    }

    public function get_enrolment_data(){
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