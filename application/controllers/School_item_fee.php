<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_item_fee extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("school_item_fee_model", "school_m");
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

//
    function school_item_fee()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main'] = get_phrase('master_data');
        $page_data['page_name']  = 'masterdata/item/school_item_fee';
        $page_data['page_title'] = get_phrase('school_item_fee');
        $this->load->view('masterdata/item/school_item_fee', $page_data);
    }

   function new_school_item_fee($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->school_item_fee_id = $param1;
        //edit
        if($param2=='edit'){
            $page_data["item_dl"] = $this->school_m->get_school_item_fee_detail($obj);
        }
        $page_data["crud"] = $param2;
        $this->load->view('masterdata/item/school_item_fee_new' ,$page_data);
    }
    /*** school item fee  ***/
    function school_item_fee_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_title'] = get_phrase('school_item_fee');
        $this->load->view('masterdata/school_item_fee/school_item_fee_list',$page_data);
    }
    /* create new school_item_fee */
    function create_new_school_item_fee($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        //variable
        $data["description"]   = $this->input->post("description");
        $data["status"]        = empty($this->input->post("status")) ? 0 : 1;

        // got value hidden file for reference id price book
        $id = empty($this->input->post("school_item_fee_id")) ? 0 : $this->input->post("school_item_fee_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if ($crud == 'new') { // create new
            $data["created_by"] = $this->session->userdata("user_id");
            $data["created_date"] = date('Y-m-d h:s:i');
            //
            $data["school_item_fee_id"] = $this->school_m->new_school_item_fee($data);

        } else if ($crud == 'edit') { // edit
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date('Y-m-d h:s:i');
            //
            $this->school_m->edit_school_item_fee($data, $this->input->post("pb_hidden_id"));
            $data["school_item_fee_id"] = $id;
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
        $obj->school_item_fee_id = $param1;
        //
        $this->school_m->delete_school_item_fee($obj);
    }
    public function school_item_fee_data(){
        // DB table to use
        $table = 'item_master where is_delete=0';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id',               'dt' => "id",               'field' => 'id'),
            array('db' => 'description',      'dt' => "description",      'field' => 'description'),
            array('db' => 'status',           'dt' => "status",           'field' => 'status'),
            array('db' => 'is_delete',        'dt' => "is_delete",        'field' => 'is_delete')
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