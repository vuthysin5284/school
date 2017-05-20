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
			$data = $this->db->query($sql,array($obj->location_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "location_number"=> empty($data->location_number)?'':$data->location_number,
                        "location_name"=> empty($data->location_name)?'':$data->location_name,
                        "building"=> empty($data->building)?'':$data->building,
                        "floor"=> empty($data->floor)?'':$data->floor,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_location */
		function lookup_location($obj){
			$sql = "select * from location where status = 1 and location like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>