<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->sys= $this->load->database('sys', TRUE);
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
        $obj->id = $param1;
        $page_data["location_detail"] = $this->location_m->get_location_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('masterdata/location/modal_new_location' ,$page_data);
    }

    function check_exists($field,$key)
    {
        $this->sys->where($field,$key);
        $query = $this->sys->get('location');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function new_country(){
       // echo $this->input->post('new_country');
      /*  $country = $this->sys->select_max('country')->from('location')->get()->result();
        $result = $country->country;
        echo $result; */

      if(!$this->check_exists('name',$this->input->post('new_country'))){
            $country = $this->sys->select_max('country')->from('location')->get()->row();   
            $country_id =  $country->country + 1;
            

            $data = array(
               'name' => $this->input->post('new_country'),
               'type' => 1 ,
               'country' => $country_id,
               'province' => 0,
               'district' => 0,
               'commune' => 0,
               'village' => 0
            );
            
           if ($this->sys->insert('location', $data)){
                $json = array('status' => 1, 
                              'country_id' => $country_id, 
                              'country_name' => $this->input->post('new_country'),
                              'message' => 'Successfully add !');
                echo json_encode($json);

               // echo "Successfully";
           }else{
                $json = array('status' => 0);
                echo json_encode($json);
               // echo 'Failed';
           }
      }else{
            $json = array('status' => 2);
            echo json_encode($json);
      }
    }

    function new_province(){
        //echo $this->input->post('country_id');

      if(!$this->check_exists('name',$this->input->post('new_province'))){
            $province = $this->sys->select_max('province')->from('location')->get()->row();   
            $province_id =  $province->province + 1;
            

            $data = array(
               'name' => $this->input->post('new_province'),
               'type' => 2 ,
               'country' => $this->input->post('country_id'),
               'province' => $province_id,
               'district' => 0,
               'commune' => 0,
               'village' => 0
            );

            
           if ($this->sys->insert('location', $data)){
                $json = array('status' => 1, 
                              'province_id' => $province_id, 
                              'province_name' => $this->input->post('new_province'),
                              'message' => 'Successfully add !');
                echo json_encode($json);

               // echo "Successfully";
           }else{
                $json = array('status' => 0,
                              'message' => 'Failed to save !');
                echo json_encode($json);
               // echo 'Failed';
           }
      }else{
            $json = array('status' => 2,
                          'message' => 'Existing name !');
            echo json_encode($json);
      }

    }

    function new_district(){
        //echo $this->input->post('province_id');

      if(!$this->check_exists('name',$this->input->post('new_district'))){
            $district = $this->sys->select_max('district')->from('location')->get()->row();   
            $district_id =  $district->district + 1;
            

            $data = array(
               'name' => $this->input->post('new_district'),
               'type' => 3 ,
               'country' => $this->input->post('country_id'),
               'province' => $this->input->post('province_id'),
               'district' => $district_id,
               'commune' => 0,
               'village' => 0
            );

            
           if ($this->sys->insert('location', $data)){
                $json = array('status' => 1, 
                              'district_id' => $district_id, 
                              'district_name' => $this->input->post('new_district'),
                              'message' => 'Successfully add !');
                echo json_encode($json);

               // echo "Successfully";
           }else{
                $json = array('status' => 0,
                              'message' => 'Failed to save !');
                echo json_encode($json);
               // echo 'Failed';
           }
      }else{
            $json = array('status' => 2,
                          'message' => 'Existing name !');
            echo json_encode($json);
      }

    }

    function new_commune(){
       // echo $this->input->post('district_id');

      if(!$this->check_exists('name',$this->input->post('new_commune'))){
            $commune = $this->sys->select_max('commune')->from('location')->get()->row();   
            $commune_id =  $commune->commune + 1;
            

            $data = array(
               'name' => $this->input->post('new_commune'),
               'type' => 4 ,
               'country' => $this->input->post('country_id'),
               'province' => $this->input->post('province_id'),
               'district' => $this->input->post('district_id'),
               'commune' => $commune_id,
               'village' => 0
            );

            
           if ($this->sys->insert('location', $data)){
                $json = array('status' => 1, 
                              'commune_id' => $commune_id, 
                              'commune_name' => $this->input->post('new_commune'),
                              'message' => 'Successfully add !');
                echo json_encode($json);

               // echo "Successfully";
           }else{
                $json = array('status' => 0,
                              'message' => 'Failed to save !');
                echo json_encode($json);
               // echo 'Failed';
           }
      }else{
            $json = array('status' => 2,
                          'message' => 'Existing name !');
            echo json_encode($json);
      }

    }

    function new_village(){
      //echo $this->input->post('commune_id');

      if(!$this->check_exists('name',$this->input->post('new_village'))){
            $village = $this->sys->select_max('village')->from('location')->get()->row();   
            $village_id =  $village->village + 1;
            

            $data = array(
               'name' => $this->input->post('new_village'),
               'type' => 5,
               'country' => $this->input->post('country_id'),
               'province' => $this->input->post('province_id'),
               'district' => $this->input->post('district_id'),
               'commune' => $this->input->post('commune_id'),
               'village' => $village_id
            );

            
           if ($this->sys->insert('location', $data)){
                $json = array('status' => 1, 
                              'village_id' => $village_id, 
                              'village_name' => $this->input->post('new_village'),
                              'message' => 'Successfully add !');
                echo json_encode($json);

               // echo "Successfully";
           }else{
                $json = array('status' => 0,
                              'message' => 'Failed to save !');
                echo json_encode($json);
               // echo 'Failed';
           }
      }else{
            $json = array('status' => 2,
                          'message' => 'Existing name !');
            echo json_encode($json);
      }

    }

    function update_country(){
            //echo $this->input->post('country_id');
        $this->sys->where('country',$this->input->post('country_id'));
        $this->sys->where('type',1);
        $this->sys->where('province',0);
        $this->sys->where('district',0);
        $this->sys->where('commune',0);
        $this->sys->where('village',0);

        $data = array(
             'name' => $this->input->post('country_edit_name')
        );

        if ($this->sys->update('location',$data)){
            $json = array(
                          'status' => 1,
                          'country_edit_name' => $this->input->post('country_edit_name'),
                          'message' => 'Successfully Updated !', 
                    );
            echo json_encode($json);
        }else{
            $json = array(
                          'status' => 0,
                          'message' => 'Updated Failed !', 
                    );
            echo json_encode($json);
        }

    }

    function update_province(){
        //echo "This is update province";

        $this->sys->where('country',$this->input->post('country_id'));
        $this->sys->where('type',2);
        $this->sys->where('province',$this->input->post('province_id'));
        $this->sys->where('district',0);
        $this->sys->where('commune',0);
        $this->sys->where('village',0);

        $data = array(
             'name' => $this->input->post('province_edit_name')
        );

        if ($this->sys->update('location',$data)){
            $json = array(
                          'status' => 1,
                          'province_edit_name' => $this->input->post('province_edit_name'),
                          'message' => 'Successfully Updated !', 
                    );
            echo json_encode($json);
        }else{
            $json = array(
                          'status' => 0,
                          'message' => 'Updated Failed !', 
                    );
            echo json_encode($json);
        }

    }

    function update_district(){

        $this->sys->where('country',$this->input->post('country_id'));
        $this->sys->where('type',3);
        $this->sys->where('province',$this->input->post('province_id'));
        $this->sys->where('district',$this->input->post('district_id'));
        $this->sys->where('commune',0);
        $this->sys->where('village',0);

        $data = array(
             'name' => $this->input->post('district_edit_name')
        );

        if ($this->sys->update('location',$data)){
            $json = array(
                          'status' => 1,
                          'district_edit_name' => $this->input->post('district_edit_name'),
                          'message' => 'Successfully Updated !', 
                    );
            echo json_encode($json);
        }else{
            $json = array(
                          'status' => 0,
                          'message' => 'Updated Failed !', 
                    );
            echo json_encode($json);
        }
    }

    function update_commune(){

        $this->sys->where('country',$this->input->post('country_id'));
        $this->sys->where('type',4);
        $this->sys->where('province',$this->input->post('province_id'));
        $this->sys->where('district',$this->input->post('district_id'));
        $this->sys->where('commune',$this->input->post('commune_id'));
        $this->sys->where('village',0);

        $data = array(
             'name' => $this->input->post('commune_edit_name')
        );

        if ($this->sys->update('location',$data)){
            $json = array(
                          'status' => 1,
                          'commune_edit_name' => $this->input->post('commune_edit_name'),
                          'message' => 'Successfully Updated !', 
                    );
            echo json_encode($json);
        }else{
            $json = array(
                          'status' => 0,
                          'message' => 'Updated Failed !', 
                    );
            echo json_encode($json);
        }

    }

    function update_village(){

        $this->sys->where('country',$this->input->post('country_id'));
        $this->sys->where('type',5);
        $this->sys->where('province',$this->input->post('province_id'));
        $this->sys->where('district',$this->input->post('district_id'));
        $this->sys->where('commune',$this->input->post('commune_id'));
        $this->sys->where('village',$this->input->post('village_id'));

        $data = array(
             'name' => $this->input->post('village_edit_name')
        );

        if ($this->sys->update('location',$data)){
            $json = array(
                          'status' => 1,
                          'village_edit_name' => $this->input->post('village_edit_name'),
                          'message' => 'Successfully Updated !', 
                    );
            echo json_encode($json);
        }else{
            $json = array(
                          'status' => 0,
                          'message' => 'Updated Failed !', 
                    );
            echo json_encode($json);
        }

    }

    function location(){

        $page_data['page_name']  = 'location/location';
        $page_data['page_title'] = get_phrase('location');
        $this->load->view('index', $page_data);
    }
    /*** location ***/
    function location_list($param1='',$param2='',$param3=''){
        $page_data['countries'] = $this->sys->select("*")
                                           ->from("location")
                                           ->where('type',1)
                                           //->order_by("name", "asc")
                                           ->get()
                                           ->result();
       
        $page_data['page_title'] = get_phrase('location');
        $this->load->view('masterdata/location/location_list',$page_data);
    }

    function location_list_province(){
        echo json_encode($this->sys->select("*")
                                  ->from('location')
                                  ->where('type',2)
                                  ->where('country',$this->input->post('country_id'))
                                  ->order_by('name','asc')
                                  ->get()
                                  ->result());

    }

    function location_list_district(){
        echo json_encode($this->sys->select("*")
                                  ->from('location')
                                  ->where('type',3)
                                  ->where('country',$this->input->post('country_id'))
                                  ->where('province',$this->input->post('province_id'))
                                  ->order_by('name','asc')
                                  ->get()
                                  ->result());
    }

    function location_list_commune(){
        echo json_encode($this->sys->select("*")
                                  ->from('location')
                                  ->where('type',4)
                                  ->where('country',$this->input->post('country_id'))
                                  ->where('province',$this->input->post('province_id'))
                                  ->where('district',$this->input->post('district_id'))
                                  ->order_by('name','asc')
                                  ->get()
                                  ->result());
    }

    function location_list_village(){
        echo json_encode($this->sys->select("*")
                                  ->from('location')
                                  ->where('type',5)
                                  ->where('country',$this->input->post('country_id'))
                                  ->where('province',$this->input->post('province_id'))
                                  ->where('district',$this->input->post('district_id'))
                                  ->where('commune',$this->input->post('commune_id'))
                                  ->order_by('name','asc')
                                  ->get()
                                  ->result());
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
        if($crud=='new'){       // create new
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
        $obj->id = $param1;
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
            array( 'db' => 'name',   'dt'    => "name",   'field' => 'name' ),
            array( 'db' => 'type',     'dt'    => "type",     'field' => 'type' ),
            array( 'db' => 'country',         'dt'    => "country",         'field' => 'country' ),
            array( 'db' => 'province',      'dt'    => "province",      'field' => 'province'  ),
            array( 'db' => 'district',     'dt'    => "district",     'field' => 'district'  ),
            array( 'db' => 'commune',   'dt'    => "commune",   'field' => 'commune'  ),
            array( 'db' => 'village',        'dt'    => "village",        'field' => 'village' )
        );

        $sql_details    = array(
            'user'  => $this->sys->username,
            'pass'  => $this->sys->password,
            'port'  => $this->sys->port,
            'db'    => $this->sys->database,
            'host'  => $this->sys->hostname
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