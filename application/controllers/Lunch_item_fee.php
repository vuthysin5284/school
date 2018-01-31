<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lunch_item_fee extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->sys = $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("lunch_item_fee_model", "lunch_m");
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }
    //
    function index() {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_width']  =  50;
        $page_data['page_main']  =  get_phrase('master_data');
        $page_data['page_name']  = 'masterdata/item/itemsetup';
        $page_data['page_title'] = get_phrase('item_setup');
        $this->load->view('index', $page_data);
    }
     //Lunch Item Fee
    function lunch_item_fee()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_main'] = get_phrase('master_data');
        $page_data['page_name']  = 'masterdata/item/lunch_item_fee';
        $page_data['page_title'] = get_phrase('lunch_item_fee');
        $this->load->view('masterdata/item/lunch_item_fee', $page_data);
    }
    function new_lunch_item_fee($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->lunch_item_fee_id = $param1;
        //edit
        //if($param2=='edit'){
            $page_data["item_dl"] = $this->lunch_m->get_lunch_item_fee_detail($obj);
        //}
        $page_data["crud"] = $param2;
        $this->load->view('masterdata/item/lunch_item_fee_new' ,$page_data);
    }
    /*** lunch item fee  ***/
    function lunch_item_fee_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_title'] = get_phrase('lunch_item_fee');
        $this->load->view('masterdata/itemsetup/lunch_item_fee_list',$page_data);
    }
        /* create new admin_item_fee */
        function create_new_lunch_item_fee($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        //variable
        $data["description"]    = $this->input->post("description");
        $data["prize_id"]       = $this->input->post("prize_id");
        $data["type"]           = 3;
        $data["status"]         = empty($this->input->post("status")) ? 0 : 1;


        // got value hidden file for reference id price book
        $id = empty($this->input->post("lunch_item_fee_id")) ? 0 : $this->input->post("lunch_item_fee_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if ($crud == 'new') { // create new
            $data["created_by"] = $this->session->userdata("user_id");
            $data["created_date"] = date('Y-m-d h:s:i');
            //
            $data["lunch_item_fee_id"] = $this->lunch_m->new_lunch_item_fee($data);

        } else if ($crud == 'edit') { // edit
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date('Y-m-d h:s:i');
            //
             $this->lunch_m->edit_lunch_item_fee($data, $this->input->post("pb_hidden_id"));
            $data["lunch_item_fee_id"] = $id;
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
        $obj->lunch_item_fee_id = $param1;
        //
        $this->lunch_m->delete_lunch_item_fee($obj);
    }

    public function lunch_item_fee_data(){
        // DB table to use
        $table = 'item_master where is_delete=0  and type = 3';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id',             'dt' => "id",               'field' => 'id'),
            array('db' => 'description',    'dt' => "description",      'field' => 'description'),
            array('db' => 'status',         'dt' => "status",           'field' => 'status'),
            array('db' => 'is_delete',      'dt' => "is_delete",        'field' => 'is_delete')
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