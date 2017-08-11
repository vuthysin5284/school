<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Schedule_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new schedule*/
		function new_schedule($data){
			$this->db->insert('schedule',$data);
			return $this->db->insert_id(); 		
		}
		/*edit schedule*/
		function edit_schedule($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('schedule',$data);
		}

		/*delete schedule*/
		function delete_schedule($obj){

			$this->db->where('id',$obj->schedule_id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('schedule');
		}
		/*udate status schedule*/
		function update_status_schedule($obj){
			$this->db->where('id',$obj->schedule_id);
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('schedule');
		}
		
		/* schedule detail */
		function get_schedule_detail($obj){
			$sql = " select 
						*
					from schedule 
					where id=?";
			$data = $this->db->query($sql,array($obj->schedule_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "schedule_name"=> empty($data->schedule_name)?'':$data->schedule_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_schedule */
		function lookup_schedule($obj){
			$sql = "select * from schedule where status = 1 and schedule_name like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>