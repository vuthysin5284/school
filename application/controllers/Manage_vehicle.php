<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_vehicle extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("manage_vehicle_model","vehicle_m");
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
    function new_vehicle($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
	//	$obj->id = $this->session->userdata('id');
		
        $page_data["vehicle_detail"] = $this->vehicle_m->get_vehicle_detail($obj);
		$page_data["crud"] = $param2;
		$page_data['ownership_list']= $this->vehicle_m->get_ownership_list($obj);
        $this->load->view('manage_vehicle/modal_new_manage_vehicle',$page_data);
    }

    function manage_vehicle(){
		$page_data['page_name']  = 'manage_vehicle/manage_vehicle';
        $page_data['page_title'] = get_phrase('manage_vehicle');
        $this->load->view('index', $page_data);
	}
    //vehicle_list
	function manage_vehicle_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('manage_vehicle');
        $this->load->view('manage_vehicle/manage_vehicle_list',$page_data);
    }
	
    /* create new vehicle */
    function create_new_vehicle($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

		$data["vehicle_number"] = $this->input->post("vehicle_number");
		$data["total_seat"]    = $this->input->post("total_seat");
        $data["total_seat_allow"] 	= $this->input->post("total_seat_allow");
        $data["ownership_id"] 	    = $this->input->post("ownership_id");
        $data["status"] 	    = empty($this->input->post("status"))?0:1;
       


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");
	
        // in case id is price book id
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            //
            $data["id"] = $this->vehicle_m->new_vehicle($data);

        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->vehicle_m->edit_vehicle($data,$id);
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
        $this->vehicle_m->delete_vehicle($obj);
    }
	
	
	 public function vehicle_data(){
        // DB table to use
        $table = 'manage_vehicle';
        $primaryKey	= "id";
        // indexes
        $columns = array(
            array( 'db' => 'id', 		    'dt'	=> "id", 			'field'	=> 'id'),
            array( 'db' => 'vehicle_number',     'dt'	=> "vehicle_number",     'field'	=> 'vehicle_number' ),
     		array( 'db' => 'total_seat',   'dt'	=> "total_seat", 	'field'	=> 'total_seat' ),
			array( 'db' => 'total_seat_allow',   'dt'	=> "total_seat_allow", 	'field'	=> 'total_seat_allow' ),
			array( 'db' => 'ownership_id',   'dt'	=> "ownership_id", 	'field'	=> 'ownership_id' ),
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