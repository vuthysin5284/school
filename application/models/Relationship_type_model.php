<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Relationship_type_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new relationship_type*/
		function new_relationship_type($data){
			$this->db->insert('relationship_type',$data);
			return $this->db->insert_id(); 		
		}
		/*edit relationship_type*/
		function edit_relationship_type($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('relationship_type',$data);
		}
		/*delete relationship_type*/
		function delete_relationship_type($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('relationship_type');
		}
		/*update status relationship_type*/
		function update_status_relationship_type($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('relationship_type');
		}
		
		/* employee detail */
		function get_relationship_type_detail($obj){
			$sql = " select 
						*
					from relationship_type pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "relationship_type_name"=> empty($data->relationship_type_name)?'':$data->relationship_type_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup relationship_type */
		function lookup_relationship_type($obj){
			$sql = "select * from relationship_type where status = 1 and relationship_type like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>