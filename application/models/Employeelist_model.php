<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Employeelist_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new employeelist*/
		function new_employeelist($data){
			$this->db->insert('employeelist',$data);
			return $this->db->insert_id(); 		
		}
		/*edit employee*/
		function edit_employeelist($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('employeelist',$data);
		}
		/*delete employee*/
		function delete_employeelist($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('employeelist');
		}
		/*update status employee*/
		function update_status_employeelist($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('employeelist');
		}
		
		/* employee detail */
		function get_employeelist_detail($obj){
			$sql = " select 
						*
					from employeelist pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "employeelist_name"=> empty($data->employeelist_name)?'':$data->employeelist_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup employee */
		function lookup_employeelist($obj){
			$sql = "select * from employeelist where status = 1 and employeelist like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>