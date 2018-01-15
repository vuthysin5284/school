<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relationship_type extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys= $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("relationship_type_model","relationship_type_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_relationship_type($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["relationship_type_detail"] = $this->relationship_type_m->get_relationship_type_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/relationship_type/modal_new_relationship_type' ,$page_data);
    }

    //
    function relationship_type(){
        $page_data['page_title'] = get_phrase('relationship_type');
        $this->load->view('staff/relationship_type/relationship_type', $page_data);
    }
    /*** relationship_type ***/
    function relationship_type_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('relationship_type');
        $this->load->view('relationship_type/relationship_type_list',$page_data);
    }

    /* create new relationship_type */
    function create_new_relationship_type($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["relationship_type_name"] 	= $this->input->post("relationship_type_name");
        $data["status"] 	= empty($this->input->post("status"))?0:1;
        $data["description"] = $this->input->post("description");
		


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
			$data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
			$data['is_delete']=0;
            $data["relationship_type_id"] = $this->relationship_type_m->new_relationship_type($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->relationship_type_m->edit_relationship_type($data,$id);
            $data["relationship_type_id"] = $id;
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
        $this->relationship_type_m->delete_relationship_type($obj);
    }

    public function get_relationship_type_data(){

        // DB table to use
        $table = 'relationship_type where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 				'dt' => "id", 						'field' => 'id'),
			array('db' => 'relationship_type_name', 	'dt' => "relationship_type_name", 	'field' => 'relationship_type_name'),
			array('db' => 'description', 				'dt' => "description", 				'field' => 'description'),
			array('db' => 'status', 	 				'dt' => "status", 					'field' => 'status'),
			array('db' => 'is_delete',   				'dt' => "is_delete", 				'field'	=> 'is_delete')
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