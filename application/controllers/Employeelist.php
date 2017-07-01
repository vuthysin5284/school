<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employeelist extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("employeelist_model","employeelist_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_employeelist($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["employeelist_detail"] = $this->employeelist_m->get_employeelist_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/employeelist/modal_new_employeelist' ,$page_data);
    }

    function employeelist(){

		$page_data['page_name']  = 'employeelist/employeelist';
        $page_data['page_title'] = get_phrase('employeelist');
        $this->load->view('index', $page_data);
	}
    /*** employee ***/
    function employeelist1($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('employeelist');
        $this->load->view('employeelist/employeelist1',$page_data);
    }

    /* create new employee */
    function create_new_employeelist($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["employeelist_name"] 	= $this->input->post("employeelist_name");
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
            $data["employeelist_id"] = $this->employeelist_m->new_employeelist($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->employeelist_m->edit_employeelist($data,$id);
            $data["employeelist_id"] = $id;
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
        $this->employeelist_m->delete_employeelist($obj);
    }

    public function employeelist_data(){

        // DB table to use
        $table = 'employeelist where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 						'field' => 'id'),
			array('db' => 'employeelist_name', 		'dt' => "employeelist_name", 		'field' => 'employeelist_name'),
			array('db' => 'description', 			'dt' => "description", 				'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 					'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 				'field'	=> 'is_delete')
        );
		
		
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

} 