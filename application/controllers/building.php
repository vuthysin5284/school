<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Building extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("building_model","building_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_building($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["building_detail"] = $this->building_m->get_building_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('building/modal_new_building' ,$page_data);
    }

    function floor(){

		$page_data['page_name']  = 'building/building';
        $page_data['page_title'] = get_phrase('building');
        $this->load->view('index', $page_data);
	}
    /*** building ***/
    function building_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('building');
        $this->load->view('building/building_list',$page_data);
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

    /*
    public function room_data(){
        // DB table to use
        $table = 'deal';
        $primaryKey	= "id";
        // indexes
        $columns = array(
            array( 'db' => 'id', 		'dt'	=> "id", 			'field'	=> 'id'),
            array( 'db' => 'deal_name', 'dt'	=> "deal_name", 	'field'	=> 'deal_name' ),
            array( 'db' => 'contact',   'dt'	=> "contact",       'field'	=> 'contact' ),
            array( 'db' => 'tags',      'dt'	=> "tags",          'field'	=> 'tags' )
        );

        $sql_details	= array(
            'user'	=> $this->db->username,
            'pass'	=> $this->db->password,
            'port'	=> $this->db->port,
            'db'	=> $this->db->database,
            'host'	=> $this->db->hostname
        );

        $this->load->model('datatable');
        echo json_encode(Datatable::simple($_POST, $sql_details,$table,$primaryKey, $columns));

    }*/


    public function building_data(){

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

        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

} 