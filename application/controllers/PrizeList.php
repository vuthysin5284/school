<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrizeList extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys = $this->load->database('sys', TRUE);
		//$this->erp=$this->load->database('erp', true); 
        $this->load->library('session');
        $this->load->model("prize_list_model", "p_m");
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
     * sin vuthy
     * 2018-01-08
     */

	//assign item to class
	function prize_list($param1='',$param2=''){
		if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
		}
		$page_data['page_width']  = "40";
		$page_data['page_name']  = 'masterdata/item/prize_list';
        $page_data['page_main'] = get_phrase('master_data');
        $page_data['page_main_title'] = get_phrase('prize_list');
        $page_data['page_title'] = get_phrase('prize_list');
        $this->load->view('index', $page_data);
	}
    /* create new prize list */
    function create_new_prize($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        //variable
        $data["description"]    = $this->input->post("description");
        $data["prize"]          = $this->input->post("prize");
        $data["status"]         = empty($this->input->post("status")) ? 0 : 1;

        // got value hidden file for reference id price book
        $id = empty($this->input->post("prize_list_id")) ? 0 : $this->input->post("prize_list_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if ($crud == 'new') { // create new
            $data["created_by"] = $this->session->userdata("user_id");
            $data["created_date"] = date('Y-m-d h:s:i');
            //
            $data["prize_list_id"] = $this->p_m->new_prize($data);

        } else if ($crud == 'edit') { // edit
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date('Y-m-d h:s:i');
            //
            $this->p_m->edit_prize($data, $this->input->post("pb_hidden_id"));
            $data["prize_list_id"] = $id;
        }
        echo json_encode(array("data" => $data));
    }
    //
    function prize_list_new($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->prize_list_id = $param1;
        //edit
        //if($param2=='edit'){
        $page_data["prize_detail"] = $this->p_m->get_prize_list_detail($obj);
        //}
        $page_data["crud"] = $param2;
        $this->load->view('masterdata/item/prize_list_new' ,$page_data);
    }

    /* delete */
    function delete($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->admin_item_fee_id = $param1;
        //
        $this->admin_m->delete_admin_item_fee($obj);
    }

    public function prize_list_data(){
        // DB table to use
        $table = 'prize_list';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id',              'dt' => "id",               'field' => 'id'),
            array('db' => 'description',     'dt' => "description",      'field' => 'description'),
            array('db' => 'status',          'dt' => "status",           'field' => 'status'),
            array('db' => 'prize',           'dt' => "prize",        'field' => 'prize')
        );

        $sql_details = array(
            'user' => $this->sys->username,
            'pass' => $this->sys->password,
            'port' => $this->sys->port,
            'db' => $this->sys->database,
            'host' => $this->sys->hostname
        );

        $this->load->model('datatable');
        echo json_encode(Datatable::simple($_POST, $sql_details, $table, $primaryKey, $columns));

    }
} 