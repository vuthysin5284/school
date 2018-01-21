<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Times extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
        $this->sys = $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("times_model", "times_m");
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
	function times(){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

		$page_data['page_name']  = 'masterdata/times/times';
        $page_data['page_title'] = get_phrase('times');
        $this->load->view('index', $page_data);
	}


    /*
    *	$page_name		=	The name of page
    */
    function new_times($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $obj = new stdClass();
        $obj->times_id = $param1;
        $obj->branch_id = $this->session->userdata("branch_id");

        $page_data["times_detail"] = $this->times_m->get_times_detail($obj);

        $page_data["crud"] = $param2;
        $this->load->view('masterdata/times/modal_new_times' ,$page_data);
    }

    /*** times ***/
    function times_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $page_data['page_title'] = get_phrase('times');
        $this->load->view('masterdata/times/times_list',$page_data);
    }
    /* create new times */
    function create_new_times($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $data["times_name"] = $this->input->post("times_name");
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
            $data["times_id"] = $this->times_m->new_times($data);

        } else if ($crud == 'edit') { // edit
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date('Y-m-d h:s:i');
            //
            $this->times_m->edit_times($data, $id);
            $data["times_id"] = $id;
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
        $obj->times_id = $param1;
        //
        $this->times_m->delete_times($obj);
    }


    public function times_data()
    {
        // DB table to use
        $table = 'times  where is_delete=0';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id', 'dt' => "id", 'field' => 'id'),
            array('db' => 'times_name', 'dt' => "times_name", 'field' => 'times_name'),
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