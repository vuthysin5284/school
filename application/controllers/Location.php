<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("location_model","location_m");
       /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        
    }
    /*
    *   $page_name      =   The name of page
    */
    function new_location($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->location_id = $param1;
        $page_data["location_detail"] = $this->location_m->get_location_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('location/modal_new_location' ,$page_data);
    }

    function location(){

        $page_data['page_name']  = 'location/location';
        $page_data['page_title'] = get_phrase('location');
        $this->load->view('index', $page_data);
    }
    /*** location ***/
    function location_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('location');
        $this->load->view('location/location_list',$page_data);
    }

    /* create new location */
    function create_new_location($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["location_number"]    = $this->input->post("location_number");
        $data["location_name"]      = $this->input->post("location_name");
        $data["floor"]          = $this->input->post("floor");
        $data["building"]       = $this->input->post("building");
        $data["status"]         = empty($this->input->post("status"))?0:1;
        $data["description"]    = $this->input->post("description");


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
            $data["created_by"]     = $this->session->userdata("user_id");
            $data["created_date"]   = date('Y-m-d h:s:i');
            //
            $data["location_id"] = $this->location_m->new_location($data);

        }else if($crud=='edit'){ // edit
            $data["modified_by"]    = $this->session->userdata("user_id");
            $data["modified_date"]  = date('Y-m-d h:s:i');
            //
            $this->location_m->edit_location($data,$id);
            $data["location_id"] = $id;
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
        $obj->location_id = $param1;
        //
        $this->location_m->delete_location($obj);
    }


    public function location_data(){
        // DB table to use
        $table = 'location';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array( 'db' => 'id',            'dt'    => "id",            'field' => 'id'),
            array( 'db' => 'location_number',   'dt'    => "location_number",   'field' => 'location_number' ),
            array( 'db' => 'location_name',     'dt'    => "location_name",     'field' => 'location_name' ),
            array( 'db' => 'floor',         'dt'    => "floor",         'field' => 'floor' ),
            array( 'db' => 'building',      'dt'    => "building",      'field' => 'building'  ),
            array( 'db' => 'location_name',     'dt'    => "location_name",     'field' => 'location_name'  ),
            array( 'db' => 'description',   'dt'    => "description",   'field' => 'description'  ),
            array( 'db' => 'status',        'dt'    => "status",        'field' => 'status' ),
            array( 'db' => 'is_delete',        'dt' => "is_delete",        'field'  => 'is_delete' )
        );

        $sql_details    = array(
            'user'  => $this->db->username,
            'pass'  => $this->db->password,
            'port'  => $this->db->port,
            'db'    => $this->db->database,
            'host'  => $this->db->hostname
        );

        $this->load->model('datatable');
        echo json_encode(Datatable::simple($_POST, $sql_details,$table,$primaryKey, $columns));

    }


   /* public function location_data(){

        // DB table to use
        $table = 'location';

        // indexes
        $columns = array(
            array( 'db' => 'id',            'dt' => 0 ),
            array( 'db' => 'location_number',   'dt' => 1 ),
            array( 'db' => 'location_name',     'dt' => 2 ),
            array( 'db' => 'floor',         'dt' => 2 ),
            array( 'db' => 'building',      'dt' => 2 ),
            array( 'db' => 'location_name',     'dt' => 2 ),
            array( 'db' => 'description',    'dt' => 3 ),
            array( 'db' => 'status',         'dt' => 4)
        );


        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));

    }*/

} 