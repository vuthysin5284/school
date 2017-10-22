<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class SchoolSession_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new session*/
		function new_session($data){
			$this->db->insert('school_session',$data);
			return $this->db->insert_id(); 		
		}
		/*edit session*/
		function edit_session($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('school_session',$data);
		}
		/*delete session*/
		function delete_session($obj){
			$this->db->where('id',$obj->session_id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('school_session');
		}
		/* session detail */
		function get_session_detail($obj){
			$sql = " select 
						*,
						0 as total_student
					from school_session pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->session_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "session_name"=> empty($data->session_name)?'':$data->session_name,
                        "start_date"=> empty($data->start_date)?'':$data->start_date,
                        "end_date"=> empty($data->end_date)?'':$data->end_date,
                        "copy_cofig_data_from"=> empty($data->copy_cofig_data_from)?'':$data->copy_cofig_data_from,
                        "is_lock"=> empty($data->is_lock)?'':$data->is_lock,
                        "status"=> empty($data->status)?'':$data->status
				);     
		}
		
		/* lookup_session */
		function lookup_session($obj){
			$sql = "select * from school_session where status = 1 and session like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
	}
?>