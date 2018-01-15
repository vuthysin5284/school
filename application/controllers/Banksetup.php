<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banksetup extends CI_Controller
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

    function banksetup($param1 = '',$param2 = '',$param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main']  =  get_phrase('payrollsetup');
        $page_data['page_name']  = 'payrollsetup/banksetup';
        $page_data['page_title'] = get_phrase('banksetup');
        $this->load->view('payroll/payrollsetup/banksetup/banksetup', $page_data);

    }
    function new_banksetup($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $obj = new stdClass();
        $obj->banksetup_id = $param1;
        // edit
        if($param2=='edit'){
            $this->load->model("banksetup_model", "bs_m");
            $page_data["bs_del"] = $this->bs_m->get_banksetup_detail($obj);
        }
        //
        $page_data["crud"] = $param2;
        $this->load->view('payroll/payrollsetup/banksetup/modal_new_banksetup' ,$page_data);
    }
    /*** banksetup ***/
    function banksetup_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_title'] = get_phrase('payrollsetup');
        $this->load->view('payroll/payrollsetup/banksetup_list',$page_data);
    }
    /* create new banksetup */
    function create_new_banksetup($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        // load model
        $this->load->model("banksetup_model", "bs_m");

        // variables
        $data["bank_number"]                = $this->input->post("bank_number");
        $data["bank_name"]                  = $this->input->post("bank_name");
        $data["transfer_fee"]               = $this->input->post("transfer_fee");
        $data["remark"]                     = $this->input->post("remark");
        $data["status"]                     = empty($this->input->post("status")) ? 0 : 1;


        // got value hidden file for reference id payroll tax
        $id = empty($this->input->post("banksetup_id")) ? 0 : $this->input->post("banksetup_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is banksetup id
        if ($crud == 'new') { // create new
            $data["created_by"]     = $this->session->userdata("user_id");
            $data["created_date"]   = date('Y-m-d h:s:i');
            //
            $data["banksetup_id"] = $this->bs_m->new_banksetup($data);

        } else if ($crud == 'edit') { // edit
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date('Y-m-d h:s:i');
            //
            $this->bs_m->edit_banksetup($data, $id);
            $data["banksetup_id"] = $id;
        }
        echo json_encode(array("data" => $data));

    }
    /* delete */
    function delete($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $this->load->model("banksetup_model", "bs_m");
        $obj = new stdClass();
        $obj->banksetup_id = $param1;
        //
        $this->bs_m->delete_banksetup($obj);
    }
    public function banksetup_data(){
        // DB table to use
        $table = 'banksetup';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id',                 'dt' => "id",               'field' => 'id'),
            array('db' => 'bank_number',        'dt' => "bank_number",      'field' => 'bank_number'),
            array('db' => 'bank_name',          'dt' => "bank_name",        'field' => 'bank_name'),
            array('db' => 'transfer_fee',       'dt' => "transfer_fee",     'field' => 'transfer_fee'),
            array('db' => 'remark',             'dt' => "remark",           'field' => 'remark'),
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