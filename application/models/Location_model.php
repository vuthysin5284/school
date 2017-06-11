<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Location_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new location*/
		function new_location($data){
			$this->db->insert('location',$data);
			return $this->db->insert_id(); 		
		}
		/*edit location*/
		function edit_location($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('location',$data);
		}
		/*delete location*/
		function delete_location($obj){
			$this->db->where('id',$obj->location_id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('location');
		}
		/*udate status location*/
		function update_status_location($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('location');
		}
		
		/* location detail */
		function get_location_detail($obj){
			$sql = " select 
						*
					from location pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "name"=> empty($data->name)?'':$data->name,
                        "type"=> empty($data->type)?'':$data->type,
                        "country"=> empty($data->country)?'':$data->country,
                        "province"=> empty($data->province)?'':$data->province,
                        "district"=> empty($data->district)?'':$data->district,
                        "commune"=> empty($data->commune)?'':$data->commune,
                        "village"=> empty($data->village)?'':$data->village,
				);     
		}
		
		/* lookup_location */
		function lookup_location($obj){
			$sql = "select * from location where status = 1 and location like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>