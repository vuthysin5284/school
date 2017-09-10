<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examination extends CI_Controller {

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
        $page_data['page_name']  = 'student/exam/index';
        $page_data['page_title'] = get_phrase('examination_management');
        $this->load->view('index', $page_data);

    }

    function score_student(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $page_data['page_name']  = 'student/exam/score_student';
        $page_data['page_title'] = get_phrase('score_student');
        $this->load->view('student/exam/score_student', $page_data);
    }

    function classify_score(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $page_data['page_name']  = 'student/exam/classify_score';
        $page_data['page_title'] = get_phrase('classify_score');
        $this->load->view('student/exam/classify_score', $page_data);
    }

    function honorable_table(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('honorable_table');
        $this->load->view('student/exam/honorable_table', $page_data);
    }
    function result_score(){
    if ($this->session->userdata('is_login') != 1){
        $this->session->set_userdata('last_page', current_url());
        redirect(base_url(). 'login', 'refresh');
    }
    $page_data['page_width']  = "60";
    $page_data['page_name']  = 'student/exam/result_score';
    $page_data['page_title'] = get_phrase('result_score');
    $this->load->view('index', $page_data);
}

    // get enrolment data grid
    public function get_enrolment_data(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        // DB table to use
        $table = 'enroll_general where is_delete=0' ;														// Field
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id',                     'dt' => "id",                   'field' => 'id'),
            array('db' => 'khmer_name',                   'dt' => "khmer_name",                 'field' => 'khmer_name'),
            array('db' => 'latin_name',                  'dt' => "latin_name",                'field' => 'latin_name'),
            array('db' => 'middle_name',                'dt' => "middle_name",              'field' => 'middle_name'),
            array('db' => 'status',                 'dt' => "status",               'field' => 'status'),
            array('db' => 'is_delete',              'dt' => "is_delete",            'field' => 'is_delete')
        );
        $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }

} 