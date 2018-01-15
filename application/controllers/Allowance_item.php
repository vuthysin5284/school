<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allowance_item extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->sys = $this->load->database('sys', TRUE);
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }
    function index() {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_main']  =  get_phrase('master_data');
        $page_data['page_name']  = 'payroll/payrollsetup';
        $page_data['page_title'] = get_phrase('payrollsetup');
        $this->load->view('index', $page_data);
    }

    function allowance_item(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main']  =  get_phrase('payrollsetup');
        $page_data['page_name']  = 'payrollsetup/allowance_item_list';
        $page_data['page_title'] = get_phrase('payrollsetup');
        $this->load->view('payroll/payrollsetup/allowance_item/allowance_item_list', $page_data);

    }
    function new_allowance_item($param1 = '',$param2 = '',$param3 = '')
    {
       if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $obj = new stdClass();
        $obj->allowance_item_id = $param1;
        //edit
        if($param2=='edit'){
        $this->load->model("allowance_item_model", "alt_m");
        $page_data["alt_del"] = $this->alt_m->get_allowance_item_detail($obj);
        }

        $page_data["crud"] = $param2;
        $this->load->view('payroll/payrollsetup/allowance_item/modal_new_allowance_item' ,$page_data);
    }
    /*** allowance_item  ***/
    function allowance_item_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_title'] = get_phrase('allowance_item');
        $this->load->view('payroll/payrollsetup/allowance_item_list',$page_data);
    }
    /* create new allowance_item */
    function create_new_allowance_item($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        //load model
        $this->load->model("allowance_item_model", "alt_m");
        //variable
        $data["allowance_number"]   = $this->input->post("allowance_number");
        $data["period"]             = $this->input->post("period");
        $data["allowance_name"]     = $this->input->post("allowance_name");
        $data["description"]        = $this->input->post("description");
        $data["status"]             = empty($this->input->post("status")) ? 0 : 1;


        // got value hidden file for reference id price book
        $id = empty($this->input->post("allowance_item_id")) ? 0 : $this->input->post("allowance_item_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if ($crud == 'new') { // create new
            $data["created_by"] = $this->session->userdata("user_id");
            $data["created_date"] = date('Y-m-d h:s:i');
            //
            $data["allowance_item_id"] = $this->alt_m->new_allowance_item($data);

        } else if ($crud == 'edit') { // edit
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date('Y-m-d h:s:i');
            //
            $this->alt_m->edit_allowance_item($data, $id);
            $data["allowance_item_id"] = $id;
        }
        echo json_encode(array("data" => $data));

    }
    /* delete */
    function delete($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->allowance_item_id = $param1;
        //
        $this->alt_m->delete_allowance_item($obj);
    }
    public function allowance_item_data(){
        // DB table to use
        $table = 'allowance_item';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id',                 'dt' => "id",               'field' => 'id'),
            array('db' => 'allowance_number',   'dt' => "allowance_number", 'field' => 'allowance_number'),
            array('db' => 'period',             'dt' => "period",           'field' => 'period'),
            array('db' => 'allowance_name',     'dt' => "allowance_name",   'field' => 'allowance_name'),
            array('db' => 'description',        'dt' => "description",      'field' => 'description'),
            array('db' => 'status',             'dt' => "status",           'field' => 'status'),
            array('db' => 'is_delete',          'dt' => "is_delete",        'field' => 'is_delete')
        );

        $sql_details = array(
            'user' => $this->sys->username,
            'pass' => $this->sys->password,
            'port' => $this->sys->port,
            'db' => $this->sys->database,
            'host' => $this->sys->hostname
        );

        $this->load->model('datatable');
        echo json_encode(Datatable::simple($_POST, $sql_details, $table, $primaryKey, $columns));

    }
}