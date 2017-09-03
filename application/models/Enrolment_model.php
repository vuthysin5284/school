<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Enrolment_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new employee*/
		function new_enrolment($data){
			$this->db->insert('enrolment',$data);
			return $this->db->insert_id(); 		
		}
		/*edit employee*/
		function edit_enrolment($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('enrolment',$data);
		}
		/*delete employee*/
		function delete_enrolment($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('enrolment');
		}
		/*update status employee*/
		function update_status_enrolment($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('enrolment');
		}
		
		/* employee detail */
		function get_enrolment_detail($obj){												// Field
			$sql = " select 																		
						*
					from enrolment pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "name"=> empty($data->name)?'':$data->name,
                        "email"=> empty($data->email)?'':$data->email,
                        "address"=> empty($data->address)?'':$data->address,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup employee */
		function lookup_enrolment($obj){
			$sql = "select * from enrolment where status = 1 and enrolment like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>