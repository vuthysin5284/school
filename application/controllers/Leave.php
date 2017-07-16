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
        $page_data['page_name']  = 'leave/index';
        $page_data['page_title'] = get_phrase('leave');
        $this->load->view('index', $page_data);
    }
     function leave_type(){
        $page_data['page_title'] = get_phrase('leave');
        $this->load->view('leave/leave_type/leave_type_list', $page_data);
    }

    public function get_leave_type_data(){
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



