<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enrolment extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("enrolment_model","enrolment_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_enrolment($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["enrolment_detail"] = $this->enrolment_m->get_enrolment_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('student/enrolment/modal_new_enrolment' ,$page_data);
    }

    function enrolment(){

		$page_data['page_name']  = 'enrolment/enrolment';
        $page_data['page_title'] = get_phrase('enrolment');
        $this->load->view('index', $page_data);
	}

    function enrolment_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('enrolment');
        $this->load->view('enrolment/enrolment_list',$page_data);
    }

    /* create new employee */
    function create_new_enrolment($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["code"] 	= $this->input->post("code");                                    // Field
        $data["name"]   = $this->input->post("name");
        $data["status"] = empty($this->input->post("status"))?0:1;
		


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
			$data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
			$data['is_delete']=0;
            $data["enrolment_id"] = $this->enrolment_m->new_enrolment($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->enrolment_m->edit_enrolment($data,$id);
            $data["enrolment_id"] = $id;
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
        $this->enrolment_m->delete_enrolment($obj);
    }

    public function enrolment_data(){

        // DB table to use
        $table = 'enrolment where is_delete=0';                                                             // Field
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'name', 		 		'dt' => "name", 				'field' => 'name'),
			array('db' => 'email', 		        'dt' => "email", 		        'field' => 'email'),
			array('db' => 'address', 		    'dt' => "address", 			    'field' => 'address'),
            array('db' => 'status',             'dt' => "status",               'field' => 'status'),
			array('db' => 'is_delete',   		'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		
		
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

} 