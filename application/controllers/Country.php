<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("country_model","country_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_country($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["country_detail"] = $this->country_m->get_country_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/country/modal_new_country' ,$page_data);
    }

    function country(){

        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
		$page_data['page_name']  = 'country/country';
        $page_data['page_title'] = get_phrase('country');
        $this->load->view('index', $page_data);
	}
    /*** country ***/
    function country_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('country');
        $this->load->view('country/country_list',$page_data);
    }

    /* create new country */
    function create_new_country($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["country_name"] 	= $this->input->post("country_name");
		$data["nationality"] 	= $this->input->post("nationality");
		$data["short_name"] 	= $this->input->post("short_name");
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
            $data["country_id"] = $this->country_m->new_country($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->country_m->edit_country($data,$id);
            $data["country_id"] = $id;
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
        $this->country_m->delete_country($obj);
    }

    public function country_data(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        // DB table to use
        $table = 'country where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 		'dt' => "id", 					'field' => 'id'),
			array('db' => 'country_name', 		'dt' => "country_name", 		'field' => 'country_name'),
			array('db' => 'nationality', 		'dt' => "nationality", 			'field' => 'nationality'),
			array('db' => 'short_name', 		'dt' => "short_name", 			'field' => 'short_name'),
			array('db' => 'description', 		'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 		'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   		'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
  echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));

    }

} 