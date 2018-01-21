<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Times_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new times*/
		function new_times($data){
			$this->sys->insert('times',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit times*/
		function edit_times($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('times',$data);
		}

		/*delete times*/
		function delete_times($obj){
			$this->sys->where('id',$obj->times_id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('times');
		}
		/*udate status times*/
		function update_status_times($obj){
			$this->sys->where('id',$obj->times_id);
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('times');
		}
		
		/* times detail */
		function get_times_detail($obj){
			$sql = " select 
						*
					from times 
					where id=?";
			$data = $this->sys->query($sql,array($obj->times_id))->row();
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
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>