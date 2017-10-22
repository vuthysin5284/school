<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }
    function index()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_main']  = get_phrase('human_resource');
        $page_data['page_name']  = 'leave/index';
        $page_data['page_title'] = get_phrase('leave_management');
        $this->load->view('index', $page_data);
    }
    /*
   *	$page_name		=	The name of page
   */
    function new_leave($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->room_id = $param1;
        $obj->branch_id = $this->session->userdata("branch_id");


        $page_data["crud"] = $param2;
        $this->load->view('leave/leave/modal_new_leave', $page_data);
    }
    /*** leave ***/
    function leave_list($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('leave');
        $this->load->view('leave/leave/leave_list', $page_data);
    }

    function leave_type(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('leave');
        $this->load->view('leave/leave_type/leave_type_list', $page_data);
    }

    public function get_leave_type_data(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        // DB table to use
        $table = 'leave_type where is_delete=0' ;
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id',                     'dt' => "id",                   'field' => 'id'),
            array('db' => 'code',                   'dt' => "code",                 'field' => 'code'),
            array('db' => 'name',                   'dt' => "name",                 'field' => 'name'),
            array('db' => 'status',                 'dt' => "status",               'field' => 'status'),
            array('db' => 'is_delete',              'dt' => "is_delete",            'field' => 'is_delete')
        );
         $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }


}



