<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Transportation_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new transportation*/
		function new_transportation($data){
			$this->db->insert('transportation',$data);
			return $this->db->insert_id(); 		
		}
		/*edit transportation*/
		function edit_transportation($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('transportation',$data);
		}
		/*delete transportation*/
		function delete_transportation($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('transportation');
		}
		/*udate status transportation*/
		function update_status_transportation($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('transportation');
		}
		
		/* transportation detail */
		function get_transportation_detail($obj){
			$sql = "select * from transportation pb where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "route_name"=> empty($data->route_name)?'':$data->route_name,
                        "number_vehicle"=> empty($data->number_vehicle)?'':$data->number_vehicle,
                        "description"=> empty($data->description)?'':$data->description,
						"route_fare"=> empty($data->route_fare)?'':$data->route_fare,
						"two_way"=> empty($data->two_way)?'':$data->two_way,
						"one_way"=> empty($data->one_way)?'':$data->one_way,
                        "status"=> empty($data->status)?'':$data->status,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_transportation */
		function lookup_transportation($obj){
			$sql = "select * from transportation where status = 1 and transportation like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>