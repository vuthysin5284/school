<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Manage_vehicle_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new vehicle*/
		function new_vehicle($data){
			$this->db->insert('manage_vehicle',$data);
			return $this->db->insert_id(); 		
		}
		/*edit vehicle*/
		function edit_vehicle($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('manage_vehicle',$data);
		}
		/*delete vehicle*/
		function delete_vehicle($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('manage_vehicle');
		}
		/*udate status vehicle*/
		function update_status_vehicle($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('manage_vehicle');
		}
		//function get ownership_type list
        function get_ownership_list($obj){
            $sql = " select 
						*
					from ownership_type 
					";
           return $this->db->query($sql)->result();

        }
		/* vehicle detail */
		function get_vehicle_detail($obj){
			$sql = "select * from manage_vehicle pb where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "vehicle_number"=> empty($data->vehicle_number)?'':$data->vehicle_number,
                        "total_seat"=> empty($data->total_seat)?'':$data->total_seat,
                        "total_seat_allow"=> empty($data->total_seat_allow)?'':$data->total_seat_allow,
						"ownership_id"=> empty($data->ownership_id)?'':$data->ownership_id,
                        "status"=> empty($data->status)?'':$data->status,
						"create_by"=> empty($data->create_by)?'':$data->create_by,
                        "create_date"=> empty($data->create_date)?'':$data->create_date,
						"modified_by"=> empty($data->modified_by)?'':$data->modified_by,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                       
                        
				);     
		}
		
		/* lookup_vehicle */
		function lookup_vehicle($obj){
			$sql = "select * from manage_vehicle where status = 1 and manage_vehicle like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
				
	}
?>