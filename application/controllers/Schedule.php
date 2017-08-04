<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("schedule_model", "schedule_m");

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }
    function schedule(){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_name']  = 'masterdata/schedule/schedule';
        $page_data['page_title'] = get_phrase('schedule');
        $this->load->view('index', $page_data);
    }


    /*
    *	$page_name		=	The name of page
    */
    function new_schedule($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $obj = new stdClass();
        $obj->schedule_id = $param1;
        $obj->branch_id = $this->session->userdata("branch_id");

        $page_data["schedule_detail"] = $this->schedule_m->get_schedule_detail($obj);

        $page_data["crud"] = $param2;
        $this->load->view('masterdata/schedule/modal_new_schedule' ,$page_data);
    }

    /*** schedule ***/
    function schedule_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_title'] = get_phrase('schedule');
        $this->load->view('masterdata/schedule/schedule_list',$page_data);
    }
    /* create new schedule */
    function create_new_schedule($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $data["schedule_name"] = $this->input->post("schedule_name");
        $data["status"] = empty($this->input->post("status")) ? 0 : 1;
        $data["description"] = $this->input->post("description");


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id")) ? 0 : $this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if ($crud == 'new') { // create new
            $data["branch_id"] = $this->session->userdata("branch_id");
            $data["created_by"] = $this->session->userdata("user_id");
            $data["created_date"] = date('Y-m-d h:s:i');
            //
            $data["schedule_id"] = $this->schedule_m->new_schedule($data);

        } else if ($crud == 'edit') { // edit
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date('Y-m-d h:s:i');
            //
            $this->schedule_m->edit_schedule($data, $id);
            $data["schedule_id"] = $id;
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
        $obj->schedule_id = $param1;
        //
        $this->schedule_m->delete_schedule($obj);
    }


    public function schedule_data(){
        // DB table to use
        $table = 'schedule  where is_delete=0';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id', 'dt' => "id", 'field' => 'id'),
            array('db' => 'schedule_name', 'dt' => "schedule_name", 'field' => 'schedule_name'),
            array('db' => 'description', 'dt' => "description", 'field' => 'description'),
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