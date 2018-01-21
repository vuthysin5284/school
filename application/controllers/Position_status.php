<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position_status extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys= $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("position_status_model","position_status_m");
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_position_status($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["position_status_detail"] = $this->position_status_m->get_position_status_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/position_status/modal_new_position_status' ,$page_data);
    }

    //possition status
    function position_status(){
        $page_data['page_title'] = get_phrase('position_status');
        $this->load->view('staff/position_status/position_status', $page_data);
    }
    /*** position ***/
    function position_status_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('position_status');
        $this->load->view('position_status/position_status_list',$page_data);
    }

    /* create new position */
    function create_new_position_status($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
		
        $data["position_status_name"] 	= $this->input->post("position_status_name");
        $data["description"] = $this->input->post("description");
		$data["status"] 	= empty($this->input->post("status"))?0:1;
		

        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
			$data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
			$data['is_delete']=0;
            $data["position_status_id"] = $this->position_status_m->new_position_status($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->position_status_m->edit_position_status($data,$id);
            $data["position_status_id"] = $id;
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
        $this->position_status_m->delete_position_status($obj);
    }

    public function get_position_status_data(){

        // DB table to use
        $table = 'position_status where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 					'field' => 'id'),
			array('db' => 'position_status_name', 	'dt' => "position_status_name", 'field' => 'position_status_name'),
			array('db' => 'description', 			'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 			'field'	=> 'is_delete')
			
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