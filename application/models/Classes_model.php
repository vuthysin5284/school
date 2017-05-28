<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Classes_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new classes*/
		function new_classes($data){
			$this->db->insert('classes',$data);
			return $this->db->insert_id(); 		
		}
		/*edit classes*/
		function edit_classes($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('classes',$data);
		}
		/*delete classes*/
		function delete_classes($obj){
			$this->db->where('id',$obj->classes_id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('classes');
		}
		/*udate status classes*/
		function update_status_classes($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('classes');
		}
		
		/* classes detail */
		function get_classes_detail($obj){
			$sql = " select 
						*
					from classes pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->classes_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "classes_number"=> empty($data->classes_number)?'':$data->classes_number,
                        "classes_name"=> empty($data->classes_name)?'':$data->classes_name,
                        "room_id"=> empty($data->room_id)?'':$data->room_id,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
				);     
		}
		
		/* lookup_classes */
		function lookup_classes($obj){
			$sql = "select * from classes where status = 1 and classes like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		//function get floor list
        function get_room_list($obj){
            $sql = " select 
						*
					from room 
					where branch_id=?";
           return $this->db->query($sql,array($obj->branch_id))->result();

        }
		
	}
?>