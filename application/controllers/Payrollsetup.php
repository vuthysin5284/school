<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payrollsetup extends CI_Controller
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

    function payroll_tax($param1 = '',$param2 = '',$param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main']  =  get_phrase('payrollsetup');
        $page_data['page_name']  = 'payrollsetup/payroll_tax_list';
        $page_data['page_title'] = get_phrase('payroll_tax');
        $this->load->view('payroll/payrollsetup/payroll_tax/payroll_tax_list', $page_data);

    }
    function new_payroll_tax($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $obj = new stdClass();
        $obj->payroll_tax_id = $param1;
        // edit
        if($param2=='edit'){
            $this->load->model("payrollsetup_model", "pr_m");
            $page_data["prtax_del"] = $this->pr_m->get_payrollsetup_detail($obj);
        }
        //
        $page_data["crud"] = $param2;
        $this->load->view('payroll/payrollsetup/payroll_tax/modal_new_payroll_tax' ,$page_data);
    }
    /*** payroll tax ***/
    function payrollsetup_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_title'] = get_phrase('payrollsetup');
        $this->load->view('payroll/payrollsetup/payrollsetup_list',$page_data);
    }
    /* create new payroll tax */
    function create_new_payrolltax($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        // load model
        $this->load->model("payrollsetup_model", "pr_m");

        // variables
        $data["payroll_tax_number"]         = $this->input->post("payroll_tax_number");
        $data["amount_in_riel_less_than"]   = $this->input->post("amount_in_riel_less_than");
        $data["tax_percentage"]             = $this->input->post("percentage");
        $data["deduction_amount_in_riel"]   = $this->input->post("deduction_amount_in_riel");
        $data["status"]                     = empty($this->input->post("status")) ? 0 : 1;


        // got value hidden file for reference id payroll tax
        $id = empty($this->input->post("payroll_tax_id")) ? 0 : $this->input->post("payroll_tax_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is payroll tax id
        if ($crud == 'new') { // create new
            $data["created_by"]     = $this->session->userdata("user_id");
            $data["created_date"]   = date('Y-m-d h:s:i');
            //
            $data["payroll_tax_id"] = $this->pr_m->new_payrolltax($data);

        } else if ($crud == 'edit') { // edit
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date('Y-m-d h:s:i');
            //
            $this->pr_m->edit_payrolltax($data, $id);
            $data["payroll_tax_id"] = $id;
        }
        echo json_encode(array("data" => $data));

    }
    /* delete */
    function delete($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $this->load->model("payrollsetup_model", "pr_m");
        $obj = new stdClass();
        $obj->payrollsetup_id = $param1;
        //
        $this->pr_m->delete_payrollsetup($obj);
    }
    public function payrollsetup_data(){
        // DB table to use
        $table = 'payroll_tax where is_delete=0';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id', 'dt' => "id", 'field' => 'id'),
            array('db' => 'payroll_tax_number', 'dt' => "payroll_tax_number", 'field' => 'payroll_tax_number'),
            array('db' => 'amount_in_riel_less_than', 'dt' => "amount_in_riel_less_than", 'field' => 'amount_in_riel_less_than'),
            array('db' => 'tax_percentage', 'dt' => "tax_percentage", 'field' => 'tax_percentage'),
            array('db' => 'deduction_amount_in_riel', 'dt' => "deduction_amount_in_riel", 'field' => 'deduction_amount_in_riel'),
            array('db' => 'status', 'dt' => "status", 'field' => 'status'),
            array('db' => 'is_delete', 'dt' => "is_delete", 'field' => 'is_delete')
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'port' => $this->db->port,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );

        $this->load->model('datatable');
        echo json_encode(Datatable::simple($_POST, $sql_details, $table, $primaryKey, $columns));

    }
}