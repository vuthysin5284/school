<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Room_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new room*/
		function new_room($data){
			$this->sys->insert('room',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit room*/
		function edit_room($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('room_v',$data);
		}

		//function get floor list
        function get_floor_list($obj){
            $sql = " select 
						*
					from floor 
					where branch_id=?";
           return $this->sys->query($sql,array($obj->branch_id))->result();

        }
        //function get building list
        function get_building_list($obj){
            $sql = " select 
						*
					from building 
					";
            return $this->sys->query($sql,array($obj->branch_id))->result();

        }
		/*delete room*/
		function delete_room($obj){
			$this->sys->where('id',$obj->room_id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('room');
		}
		/*udate status room*/
		function update_status_room($obj){
			$this->sys->where('id',$obj->pricebook_id); 
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('room');
		}
		
		/* room detail */
		function get_room_detail($obj){
			$sql = " select 
						*
					from room_v 
					where id=?";
			$data = $this->sys->query($sql,array($obj->room_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "room_number"=> empty($data->room_number)?'':$data->room_number,
                        "room_name"=> empty($data->room_name)?'':$data->room_name,
                        "building"=> empty($data->building)?'':$data->building,
                        "floor"=> empty($data->floor)?'':$data->floor,
                        "building_id"=> empty($data->building_id)?'':$data->building_id,
                        "floor_id"=> empty($data->floor_id)?'':$data->floor_id,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_room */
		function lookup_room($obj){
			$sql = "select * from room where status = 1 and room like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>