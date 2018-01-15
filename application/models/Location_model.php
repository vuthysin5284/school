<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Location_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new location*/
		function new_location($data){
			$this->sys->insert('location',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit location*/
		function edit_location($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('location',$data);
		}
		/*delete location*/
		function delete_location($obj){
			$this->sys->where('id',$obj->location_id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('location');
		}
		/*udate status location*/
		function update_status_location($obj){
			$this->sys->where('id',$obj->pricebook_id); 
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('location');
		}
		
		/* location detail */
		function get_location_detail($obj){
			$sql = " select 
						*
					from location pb 
					where id=?";
			$data = $this->sys->query($sql,array($obj->id))->row();
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
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>