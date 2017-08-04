<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("course_model", "course_m");

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }
    function course(){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_name']  = 'masterdata/course/course';
        $page_data['page_title'] = get_phrase('course');
        $this->load->view('index', $page_data);
    }


    /*
    *	$page_name		=	The name of page
    */
    function new_course($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $obj = new stdClass();
        $obj->course_id = $param1;
        $obj->branch_id = $this->session->userdata("branch_id");

        $page_data["course_detail"] = $this->course_m->get_course_detail($obj);

        $page_data["crud"] = $param2;
        $this->load->view('masterdata/course/modal_new_course' ,$page_data);
    }

    /*** course ***/
    function course_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_title'] = get_phrase('course');
        $this->load->view('masterdata/course/course_list',$page_data);
    }
    /* create new course */
    function create_new_course($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $data["course_name"] = $this->input->post("course_name");
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
            $data["course_id"] = $this->course_m->new_course($data);

        } else if ($crud == 'edit') { // edit
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date('Y-m-d h:s:i');
            //
            $this->course_m->edit_course($data, $id);
            $data["course_id"] = $id;
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
        $obj->course_id = $param1;
        //
        $this->course_m->delete_course($obj);
    }


    public function course_data(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        // DB table to use
        $table = 'course where is_delete=0';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id', 'dt' => "id", 'field' => 'id'),
            array('db' => 'course_name', 'dt' => "course_name", 'field' => 'course_name'),
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