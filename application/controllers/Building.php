<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Building extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys= $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("building_model","building_m");
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_building($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["building_detail"] = $this->building_m->get_building_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('masterdata/building/modal_new_building' ,$page_data);
    }

    function floor(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
		$page_data['page_name']  = 'masterdata/building/building';
        $page_data['page_title'] = get_phrase('building');
        $this->load->view('index', $page_data);
	}
    /*** building ***/
    function building_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('building');
        $this->load->view('masterdata/building/building_list',$page_data);
    }

    /* create new building */
    function create_new_building($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["building"] 	= $this->input->post("building");
		$data["description"] = $this->input->post("description");
        $data["status"] = empty($this->input->post("status"))?0:1;
        


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
			$data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            $data["branch_id"]      = $this->session->userdata("branch_id");
			//
            $data["id"] = $this->building_m->new_building($data);

        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->building_m->edit_building($data,$id);
            $data["id"] = $id;
        }
        echo json_encode(array("data"=>$data));

    }
    /* delete */
    function delete($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        //
        $this->building_m->delete_building($obj);
    }
    //
    public function building_data(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        // DB table to use
        $table = 'building where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 'dt' => "id", 'field' => 'id'),
			array('db' => 'building', 'dt' => "building", 'field' => 'building'),
			array('db' => 'description', 'dt' => "description", 'field' => 'description'),
			array('db' => 'status', 'dt' => "status", 'field' => 'status'),
			array('db' => 'is_delete', 'dt' => "is_delete", 'field'	=> 'is_delete' )
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