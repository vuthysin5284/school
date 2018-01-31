<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Prize_list_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			 
		}  
		/*create new prize*/
		function new_prize($data){
			$this->sys->insert('prize_list',$data);
			return $this->sys->insert_id();
		}
		/*edit prize list*/
		function edit_prize($data,$id){
			$this->sys->where('id', $id);
			return $this->sys->update('prize_list', $data);
		}
		/* get prize list detail */
		function get_prize_list_detail($obj){
			$sql = " select 
						*
					from prize_list 
					where id=?";
			$data = $this->sys->query($sql,array($obj->prize_list_id))->row();
			return array( 
                        "id"				=> empty($data->id)?'':$data->id,
                        "description"		=> empty($data->description)?'':$data->description,
                        "prize"		        => empty($data->prize)?'0':$data->prize,
                        "status"			=> empty($data->status)?'0':$data->status,
                        "created_date"		=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"		=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"		=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"		=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}

}