<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Building_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new building*/
		function new_building($data){
			$this->sys->insert('building',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit building*/
		function edit_building($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('building',$data);
		}
		/*delete building*/
		function delete_building($obj){
			$this->sys->where('id',$obj->id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('building');
		}
		/*update status building*/
		function update_status_building($obj){
			$this->sys->where('id',$obj->pricebook_id); 
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('building');
		}
		
		/* building detail */
		function get_building_detail($obj){
			$sql = "select 
						*
					from building pb 
					where id=?";
			$data = $this->sys->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "building"=> empty($data->building)?'':$data->building,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
				);     
		}
		
		/* lookup_building */
		function lookup_building($obj){
			$sql = "select * from building where status = 1 and building like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>