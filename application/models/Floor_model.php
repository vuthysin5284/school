<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Floor_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new floor*/
		function new_floor($data){
			$this->sys->insert('floor',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit floor*/
		function edit_floor($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('floor',$data);
		}
		/*delete floor*/
		function delete_floor($obj){
			$this->sys->where('id',$obj->id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('floor');
		}
		/*update status floor*/
		function update_status_floor($obj){
			$this->sys->where('id',$obj->pricebook_id); 
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('floor');
		}
		
		/* floor detail */
		function get_floor_detail($obj){
			$sql = " select 
						*
					from floor pb 
					where id=?";
			$data = $this->sys->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "floor"=> empty($data->floor)?'':$data->floor,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup_floor */
		function lookup_floor($obj){
			$sql = "select * from floor where status = 1 and floor like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>