<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Times_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new times*/
		function new_times($data){
			$this->db->insert('times',$data);
			return $this->db->insert_id(); 		
		}
		/*edit times*/
		function edit_times($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('times',$data);
		}

		/*delete times*/
		function delete_times($obj){
			$this->db->where('id',$obj->times_id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('times');
		}
		/*udate status times*/
		function update_status_times($obj){
			$this->db->where('id',$obj->times_id);
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('times');
		}
		
		/* times detail */
		function get_times_detail($obj){
			$sql = " select 
						*
					from times 
					where id=?";
			$data = $this->db->query($sql,array($obj->times_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "times_name"=> empty($data->times_name)?'':$data->times_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_times */
		function lookup_times($obj){
			$sql = "select * from times where status = 1 and times_name like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>