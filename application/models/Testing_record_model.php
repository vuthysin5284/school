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
		//function get gender_list list
        function get_record_list($obj){
            $sql = " select 
						*
					from genders 
					";
           return $this->db->query($sql)->result();

        }
		//function get_expected_class_list list
        function get_expected_class_list($obj){
            $sql = " select 
						*
					from expected_class order by id DESC 
					";
           return $this->db->query($sql)->result();

        }
		//function get_academic_year_list list
        function get_academic_year_list($obj){
            $sql = " select 
						*
					from academic_year order by id DESC 
					";
           return $this->db->query($sql)->result();

        }
	
		/* record detail */
		function get_record_detail($obj){
			$sql = "select * from testing_register pb where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
						"testing_id"=> empty($data->testing_id)?'':$data->testing_id,
                        "latin_name"=> empty($data->latin_name)?'':$data->latin_name,
                        "khmer_name"=> empty($data->khmer_name)?'':$data->khmer_name,
                        "gender"=> empty($data->gender)?'':$data->gender,
						"nationality"=> empty($data->nationality)?'':$data->nationality,
						"date_of_birth"=> empty($data->date_of_birth)?'':$data->date_of_birth,
						"age"=> empty($data->age)?'':$data->age,
						"academic_year"=> empty($data->academic_year)?'':$data->academic_year,
						"expected_class"=> empty($data->expected_class)?'':$data->expected_class,
						"language"=> empty($data->language)?'':$data->language,
						"address"=> empty($data->address)?'':$data->address,
						"relative_name"=> empty($data->relative_name)?'':$data->relative_name,
						"contact_number"=> empty($data->contact_number)?'':$data->contact_number,
						"relative"=> empty($data->relative)?'':$data->relative,
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