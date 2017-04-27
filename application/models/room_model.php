<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Room_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new room*/
		function new_room($data){
			$this->db->insert('room',$data);
			return $this->db->insert_id(); 		
		}
		/*edit room*/
		function edit_room($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('room',$data);
		}
		/*delete room*/
		function delete_room($obj){
			$this->db->where('id',$obj->room_id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('room');
		}
		/*udate status room*/
		function update_status_room($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('room');
		}
		
		/* room detail */
		function get_room_detail($obj){
			$sql = " select 
						*
					from room pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->room_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "room_number"=> empty($data->room_number)?'':$data->room_number,
                        "room_name"=> empty($data->room_name)?'':$data->room_name,
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
		
		/* lookup_room */
		function lookup_room($obj){
			$sql = "select * from room where status = 1 and room like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>