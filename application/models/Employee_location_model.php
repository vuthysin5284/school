<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Employee_location_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new employee_location*/
		function new_employee_location($data){
			$this->db->insert('employee_location',$data);
			return $this->db->insert_id(); 		
		}
		/*edit employee_location*/
		function edit_employee_location($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('employee_location',$data);
		}
		/*delete employee_location*/
		function delete_employee_location($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('employee_location');
		}
		/*update status employee_location*/
		function update_status_employee_location($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('employee_location');
		}
		
		/* section detail */
		function get_employee_location_detail($obj){
			$sql = " select 
						*
					from employee_location pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "employee_location"=> empty($data->employee_location)?'':$data->employee_location,
						"main_station"=> empty($data->main_station)?'':$data->main_station,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup section */
		function lookup_employee_location($obj){
			$sql = "select * from employee_location where status = 1 and employee_location like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		//function get department list
        function get_main_station_list($obj){
            $sql = " select 
						*
					from main_station 
					";
           return $this->db->query($sql,array($obj->id))->result();

        }
		
	}
?>