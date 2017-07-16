<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Education_type_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new education_type*/
		function new_education_type($data){
			$this->db->insert('education_type',$data);
			return $this->db->insert_id(); 		
		}
		/*edit education_type*/
		function edit_education_type($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('education_type',$data);
		}
		/*delete relationship_type*/
		function delete_education_type($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('education_type');
		}
		/*update status relationship_type*/
		function update_status_education_type($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('education_type');
		}
		
		/* employee detail */
		function get_education_type_detail($obj){
			$sql = " select 
						*
					from education_type pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "education_type_name"=> empty($data->education_type_name)?'':$data->education_type_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup relationship_type */
		function lookup_education_type_name($obj){
			$sql = "select * from education_type_name where status = 1 and education_type_name like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>