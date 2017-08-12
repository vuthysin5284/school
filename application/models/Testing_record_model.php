<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Testing_record_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new record*/
		function new_record($data){
			$this->db->insert('testing_register',$data);
			return $this->db->insert_id(); 		
		}
		/*edit record*/
		function edit_record($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('testing_register',$data);
		}
		/*delete record*/
		function delete_record($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('deleted_by',$this->session->userdata("user_id"));
			$this->db->set('deleted_date',date('Y-m-d h:s:i'));
			$this->db->update('testing_register');
		}
		/*udate status recoed*/
		function update_status_record($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('testing_register');
		}
		//function get record_list list
        function get_record_list($obj){
            $sql = " select 
						*
					from genders 
					";
           return $this->db->query($sql)->result();

        }
	
		/* record detail */
		function get_record_detail($obj){
			$sql = "select * from testing_register pb where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "student_name"=> empty($data->student_name)?'':$data->student_name,
                        "middle_name"=> empty($data->middle_name)?'':$data->middle_name,
                        "gender_id"=> empty($data->gender_id)?'':$data->gender_id,
						"nationality"=> empty($data->nationality)?'':$data->nationality,
						"date_of_birth"=> empty($data->date_of_birth)?'':$data->date_of_birth,
						"address"=> empty($data->address)?'':$data->address,
						"test_id"=> empty($data->test_id)?'':$data->test_id,
                        "status"=> empty($data->status)?'':$data->status,
						"created_by"=> empty($data->create_by)?'':$data->create_by,
                        "created_date"=> empty($data->create_date)?'':$data->create_date,
						"modified_by"=> empty($data->modified_by)?'':$data->modified_by,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                       
                        
				);     
		}
		
		/* lookup_record */
		function lookup_record($obj){
			$sql = "select * from testing_register where status = 1 and testing_register like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
				
	}
?>