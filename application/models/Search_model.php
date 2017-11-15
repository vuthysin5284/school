<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Search_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*making search*/
		function makeAsearch($obj){
            $this->db->distinct();
            $this->db->select("name");
            $this->db->from('users');
            $this->db->like('name', $obj->search);
            $this->db->limit(20);
            $query = $this->db->get();
            return $query->result();
		}
		//
        function resul_search($obj){
            $this->db->distinct();
            $this->db->select("name");
            $this->db->from('users');
            $this->db->like('name', $obj->search);
            $this->db->limit(20);
            $query = $this->db->get();
            return $query->result();
        }
	}
?>