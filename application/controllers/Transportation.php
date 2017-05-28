<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transportation extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("transportation_model","transportation_m");
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }

    //
    function index(){
        $page_data['page_name']  = 'transportation/index';
        $page_data['page_title'] = get_phrase('transportation');
        $this->load->view('index', $page_data);
    }


    /*
	*	$page_name		=	The name of page
	*/
    function new_transportation($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["transportation_detail"] = $this->transportation_m->get_transportation_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('transportation/modal_new_transportation' ,$page_data);
    }

    function transportation(){

		$page_data['page_name']  = 'transportation/transportation';
        $page_data['page_title'] = get_phrase('transportation');
        $this->load->view('index', $page_data);
	}
    /*** transportation ***/
    function transportation_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('transportation');
        $this->load->view('transportation/transportation_list',$page_data);
    }

    /* create new transportation */
    function create_new_transportation($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

       
        $data["route_name"] 	= $this->input->post("route_name");
		$data["number_vehicle"] = $this->input->post("number_vehicle");
		$data["description"]    = $this->input->post("description");
        $data["route_fare"] 	= $this->input->post("route_fare");
        $data["two_way"] 	    = $this->input->post("two_way");
		$data["one_way"] 	    = $this->input->post("one_way");
        $data["status"] 	    = empty($this->input->post("status"))?0:1;
       


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");
	
        // in case id is price book id
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            //
            $data["id"] = $this->transportation_m->new_transportation($data);

        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->transportation_m->edit_transportation($data,$id);
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
        $this->transportation_m->delete_transportation($obj);
    }


    public function transportation_data(){
        // DB table to use
        $table = 'transportation';
        $primaryKey	= "id";
        // indexes
        $columns = array(
            array( 'db' => 'id', 		    'dt'	=> "id", 			'field'	=> 'id'),
            array( 'db' => 'route_name',   'dt'	=> "route_name", 	'field'	=> 'route_name' ),
            array( 'db' => 'number_vehicle',     'dt'	=> "number_vehicle",     'field'	=> 'number_vehicle' ),
            array( 'db' => 'description',         'dt'	=> "description",         'field'	=> 'description' ),
            array( 'db' => 'route_fare', 	    'dt'	=> "route_fare",      'field'	=> 'route_fare'  ),
            array( 'db' => 'two_way',   	'dt'	=> "two_way",     'field'	=> 'two_way'  ),
            array( 'db' => 'one_way',   'dt'	=> "one_way",   'field'	=> 'one_way'  ),
            array( 'db'	=> 'status',        'dt'	=> "status",        'field'	=> 'status' ),
            array( 'db'	=> 'is_delete',        'dt'	=> "is_delete",        'field'	=> 'is_delete' )
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

    }


} 