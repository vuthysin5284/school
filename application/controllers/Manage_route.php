<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_route extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys= $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("manage_route_model","route_m");
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
    function new_route($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["route_detail"] = $this->route_m->get_route_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('manage_route/modal_new_manage_route' ,$page_data);
    }

    function manage_route(){

		$page_data['page_name']  = 'manage_route/manage_route';
        $page_data['page_title'] = get_phrase('manage_route');
        $this->load->view('index', $page_data);
	}
    /*** route list ***/
    function manage_route_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('manage_route');
        $this->load->view('manage_route/manage_route_list',$page_data);
    }
	
	
    /* create new manage_route */
    function create_new_route($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

       
        $data["route_name"] 	= $this->input->post("route_name");
        $data["route_fare"] 	= $this->input->post("route_fare");
        $data["two_way"] 	    = $this->input->post("two_way");
		$data["one_way"] 	    = $this->input->post("one_way");
		$data["description"]    = $this->input->post("description");
        $data["status"] 	    = empty($this->input->post("status"))?0:1;
       


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");
	
        // in case id is price book id
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            //
            $data["id"] = $this->route_m->new_route($data);

        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->route_m->edit_route($data,$id);
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
        $this->route_m->delete_route($obj);
    }


    public function route_data(){
        // DB table to use
        $table = 'manage_route';
        $primaryKey	= "id";
        // indexes
        $columns = array(
            array( 'db' => 'id', 		    'dt'	=> "id", 			'field'	=> 'id'),
            array( 'db' => 'route_name',   'dt'	=> "route_name", 	'field'	=> 'route_name' ),
            array( 'db' => 'route_fare', 	    'dt'	=> "route_fare",      'field'	=> 'route_fare'  ),
            array( 'db' => 'two_way',   	'dt'	=> "two_way",     'field'	=> 'two_way'  ),
            array( 'db' => 'one_way',   'dt'	=> "one_way",   'field'	=> 'one_way'  ),
			 array( 'db' => 'description',         'dt'	=> "description",         'field'	=> 'description' ),
            array( 'db'	=> 'status',        'dt'	=> "status",        'field'	=> 'status' ),
            array( 'db'	=> 'is_delete',        'dt'	=> "is_delete",        'field'	=> 'is_delete' )
        );

        $sql_details	= array(
            'user'	=> $this->sys->username,
            'pass'	=> $this->sys->password,
            'port'	=> $this->sys->port,
            'db'	=> $this->sys->database,
            'host'	=> $this->sys->hostname
        );

        $this->load->model('datatable');
        echo json_encode(Datatable::simple($_POST, $sql_details,$table,$primaryKey, $columns));

    }

} 