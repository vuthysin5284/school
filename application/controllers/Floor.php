<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Floor extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("floor_model","floor_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_floor($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["floor_detail"] = $this->floor_m->get_floor_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('masterdata/floor/modal_new_floor' ,$page_data);
    }

    function floor(){

		$page_data['page_name']  = 'masterdata/floor/floor';
        $page_data['page_title'] = get_phrase('floor');
        $this->load->view('index', $page_data);
	}
    /*** floor ***/
    function floor_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('floor');
        $this->load->view('masterdata/floor/floor_list',$page_data);
    }

    /* create new floor */
    function create_new_floor($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["floor"] 	= $this->input->post("floor");
        $data["status"] 	= empty($this->input->post("status"))?0:1;
        $data["description"] = $this->input->post("description");


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
			$data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
			//
            $data["floor_id"] = $this->floor_m->new_floor($data);

        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->floor_m->edit_floor($data,$id);
            $data["floor_id"] = $id;
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
        $this->floor_m->delete_floor($obj);
    }

    public function floor_data(){

        // DB table to use
        $table = 'floor where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 'dt' => "id", 			'field' => 'id'),
			array('db' => 'floor', 		 'dt' => "floor", 		'field' => 'floor'),
			array('db' => 'description', 'dt' => "description", 'field' => 'description'),
			array('db' => 'status', 	 'dt' => "status", 		'field' => 'status'),
			array('db' => 'is_delete',   'dt' => "is_delete", 	'field'	=> 'is_delete')
        );
		
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

} 