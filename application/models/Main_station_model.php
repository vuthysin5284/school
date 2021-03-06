<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Main_station_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new section*/
		function new_main_station($data){
			$this->sys->insert('main_station',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit section*/
		function edit_main_station($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('main_station',$data);
		}
		/*delete section*/
		function delete_main_station($obj){
			$this->sys->where('id',$obj->id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('main_station');
		}
		/*update status section*/
		function update_status_main_station($obj){
			$this->sys->where('id',$obj->pricebook_id); 
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('main_station');
		}
		
		/* section detail */
		function get_main_station_detail($obj){
			$sql = " select 
						*
					from main_station pb 
					where id=?";
			$data = $this->sys->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "main_station"=> empty($data->main_station)?'':$data->main_station,
						"section_name"=> empty($data->section_name)?'':$data->section_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup section */
		function lookup_main_station($obj){
			$sql = "select * from main_station where status = 1 and main_station like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		//function get department list
        function get_main_station_list($obj){
            $sql = " select 
						*
					from section 
					";
           return $this->sys->query($sql,array($obj->id))->result();

        }
		
	}
?>