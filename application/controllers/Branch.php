<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("branch_model", "branch_m");

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }
    function branch(){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_name']  = 'masterdata/branch/branch';
        $page_data['page_title'] = get_phrase('branch');
        $this->load->view('index', $page_data);
    }


    /*
    *	$page_name		=	The name of page
    */
    function new_branch($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $obj = new stdClass();
        $obj->branch_id = $param1;
        $page_data["branch_detail"] = $this->branch_m->get_branch_detail($obj);

        $page_data["crud"] = $param2;
        $this->load->view('masterdata/branch/modal_new_branch' ,$page_data);
    }

    /*** branch ***/
    function branch_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_title'] = get_phrase('branch');
        $this->load->view('masterdata/branch/branch_list',$page_data);
    }
    /* create new branch */
    function create_new_branch($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $data["branch_name_kh"] = $this->input->post("brand_name_kh");
        $data["branch_name"]    = $this->input->post("brand_name");
        $data["phone_number"]   = $this->input->post("phone_number");
        $data["email"]          = $this->input->post("email");
        $data["prefix"]         = $this->input->post("prefix");
        $data["address"]        = $this->input->post("address");
        $data["address1"]       = $this->input->post("address1");
        $data["address2"]       = $this->input->post("address2");
        $data["address3"]       = $this->input->post("address3");
        $data["address4"]       = $this->input->post("address4");

        $data["status"]         = empty($this->input->post("status")) ? 0 : 1;


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id")) ? 0 : $this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if ($crud == 'new') { // create new
            $data["created_by"] = $this->session->userdata("user_id");
            $data["created_date"] = date('Y-m-d h:s:i');
            //
            $data["branch_id"] = $this->branch_m->new_branch($data);

        } else if ($crud == 'edit') { // edit
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date('Y-m-d h:s:i');
            //
            $this->branch_m->edit_branch($data, $id);
            $data["branch_id"] = $id;
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
        $obj->branch_id = $param1;
        //
        $this->branch_m->delete_branch($obj);
    }


    public function branch_data(){
        // DB table to use
        $table = 'branch where is_delete=0';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id', 'dt' => "id", 'field' => 'id'),
            array('db' => 'branch_name_kh', 'dt' => "branch_name_kh", 'field' => 'branch_name_kh'),
            array('db' => 'branch_name', 'dt' => "branch_name", 'field' => 'branch_name'),
            array('db' => 'phone_number', 'dt' => "phone_number", 'field' => 'phone_number'),
            array('db' => 'email', 'dt' => "email", 'field' => 'email'),
            array('db' => 'prefix', 'dt' => "prefix", 'field' => 'prefix'),
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