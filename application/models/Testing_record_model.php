<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Testing_record_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new record*/
		function new_record($data){
			$this->db->insert('testing_general',$data);
			return $this->db->insert_id(); 		
		}
		/*edit record*/
		function edit_record($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('testing_general',$data);
		}
		/*delete record*/
		function delete_record($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('deleted_by',$this->session->userdata("user_id"));
			$this->db->set('deleted_date',date('Y-m-d h:s:i'));
			$this->db->update('testing_general');
		}
		/*udate status recoed*/
		function update_status_record($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('testing_general');
		}
	
		/* get testing general */
		function get_testing_general($obj){
			$sql = "select * from testing_general pb where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
						"testing_id"=> empty($data->testing_id)?'':$data->testing_id,
                        "khmer_name"=> empty($data->khmer_name)?'':$data->khmer_name,
                        "latin_name"=> empty($data->latin_name)?'':$data->latin_name,
                        "gender_id"=> empty($data->gender_id)?'':$data->gender_id,
						"nationality"=> empty($data->nationality)?'':$data->nationality,
						"dob"=> empty($data->dob)?'':$data->dob,
						"age"=> empty($data->age)?'':$data->age,
						"session_id"=> empty($data->session_id)?'':$data->session_id,
						"expected_class_id"=> empty($data->expected_class_id)?'':$data->expected_class_id,
                        "is_base_on_result"=> empty($data->is_base_on_result)?'':$data->is_base_on_result,
                        "status"=> empty($data->status)?'':$data->status,
						"created_by"=> empty($data->create_by)?'':$data->create_by,
                        "created_date"=> empty($data->create_date)?'':$data->create_date,
						"modified_by"=> empty($data->modified_by)?'':$data->modified_by,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                       
                        
				);     
		}

	}
?>