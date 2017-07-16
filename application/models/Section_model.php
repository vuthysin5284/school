<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Section_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new section*/
		function new_section($data){
			$this->db->insert('section',$data);
			return $this->db->insert_id(); 		
		}
		/*edit section*/
		function edit_section($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('section',$data);
		}
		/*delete section*/
		function delete_section($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('section');
		}
		/*update status section*/
		function update_status_section($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('section');
		}
		
		/* section detail */
		function get_section_detail($obj){
			$sql = " select 
						*
					from section pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "section_name"=> empty($data->section_name)?'':$data->section_name,
						"department_name"=> empty($data->department_name)?'':$data->department_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup section */
		function lookup_section($obj){
			$sql = "select * from section where status = 1 and section like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		//function get department list
        function get_department_list($obj){
            $sql = " select 
						*
					from department 
					";
           return $this->db->query($sql,array($obj->id))->result();

        }
		
	}
?>