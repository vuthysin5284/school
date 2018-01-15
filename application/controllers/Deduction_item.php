<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deduction_item extends CI_Controller
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

    function deduction_item($param1 = '',$param2 = '',$param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_main']  =  get_phrase('payrollsetup');
        $page_data['page_name']  = 'payrollsetup/deduction_item_list';
        $page_data['page_title'] = get_phrase('deduction_item_list');
        $this->load->view('payroll/payrollsetup/deduction_item/deduction_item_list', $page_data);

    }
    function new_deduction_item($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $obj = new stdClass();
        $obj->deduction_item_id = $param1;
        //edit
        if($param2=='edit'){
        $this->load->model("deduction_item_model", "dt_m");
        $page_data["dt_del"] = $this->dt_m->get_deduction_item_detail($obj);
        }
        $page_data["crud"] = $param2;
        $this->load->view('payroll/payrollsetup/deduction_item/modal_new_deduction_item' ,$page_data);
    }
    /*** deduction_item  ***/
    function deduction_item_list1($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_title'] = get_phrase('deduction_item');
        $this->load->view('payroll/deduction_item/deduction_item_list1',$page_data);
    }
    /* create new deduction_item */
    function create_new_deduction_item($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        // load model
        $this->load->model("deduction_item_model", "dt_m");

        //variable
        $data["deduction_number"] = $this->input->post("deduction_number");
        $data["deduction_item"]    = $this->input->post("deduction_item");
        $data["description"]    = $this->input->post("description");
        $data["status"]         = empty($this->input->post("status")) ? 0 : 1;


        // got value hidden file for reference id price book
        $id = empty($this->input->post("deduction_item_id")) ? 0 : $this->input->post("deduction_item_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if ($crud == 'new') { // create new
            $data["created_by"] = $this->session->userdata("user_id");
            $data["created_date"] = date('Y-m-d h:s:i');
            //
            $data["deduction_item_id"] = $this->dt_m->new_deduction_item($data);

        } else if ($crud == 'edit') { // edit
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date('Y-m-d h:s:i');
            //
            $this->dt_m->edit_deduction_item($data, $id);
            $data["deduction_item_id"] = $id;
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
        $obj->deduction_item_id = $param1;
        //
        $this->dt_m->delete_deduction_item($obj);
    }
    public function deduction_item_data(){
        // DB table to use
        $table = 'deduction_item';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id', 'dt' => "id", 'field' => 'id'),
            array('db' => 'deduction_number', 'dt' => "deduction_number", 'field' => 'deduction_number'),
            array('db' => 'deduction_item', 'dt' => "deduction_item", 'field' => 'deduction_item'),
            array('db' => 'description', 'dt' => "description", 'field' => 'description'),
           
            array('db' => 'status', 'dt' => "status", 'field' => 'status'),
            array('db' => 'is_delete', 'dt' => "is_delete", 'field' => 'is_delete')
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