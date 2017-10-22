<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->database('default', TRUE);
		//$this->erp=$this->load->database('erp', true); 
        $this->load->library('session');
		//$this->load->library('googlemaps');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    
     
	public function index()
	{ 
		if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('is_login') == 1)
            redirect(base_url() . 'main/dashboard', 'refresh');
		
		$page_data['page_name']  = 'main/dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('index', $page_data);
	}
	 
	function dashboard()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main']  = get_phrase('dashboard');
        $page_data['page_name']  = 'main/dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('index', $page_data);
	} 
	 
	function profile(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main']  = get_phrase('profile');
		$page_data['page_name']  = 'main/profile';
        $page_data['page_title'] = get_phrase('profile');
        $this->load->view('index', $page_data);
	} 
	
	function field_panel(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
		$page_data['page_name']  = 'main/field_panel';
        $page_data['page_title'] = get_phrase('field_panel');
        $this->load->view('index', $page_data);
	} 
	function pivot_table(){

        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
		$page_data['page_name']  = 'main/pivot_table';
        $page_data['page_title'] = get_phrase('pivot_table');
        $this->load->view('index', $page_data);
	} 
	function inbox(){

        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_main']  = get_phrase('profile');
        $page_data['page_name']  = 'main/inbox';
        $page_data['page_title'] = get_phrase('inbox');
        $this->load->view('index', $page_data);
	}
    function messageview(){

        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_main']  = get_phrase('profile');
        $page_data['page_name']  = 'main/messageview';
        $page_data['page_title'] = get_phrase('messageview');
        $this->load->view('index', $page_data);
    }
    function compose(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main']  = get_phrase('profile');
        $page_data['page_name']  = 'main/compose';
        $page_data['page_title'] = get_phrase('compose');
        $this->load->view('index', $page_data);
	}
    //
    function lockscreen(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_name']  = 'main/lockscreen';
        $page_data['page_main'] = get_phrase('main');
        $page_data['page_title'] = get_phrase('lockscreen');
        $this->load->view('index', $page_data);
    }
    //
    function calendar(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_name']  = 'main/calendar';
        $page_data['page_main'] = get_phrase('main');
        $page_data['page_title'] = get_phrase('calendar');
        $this->load->view('index', $page_data);
    }
    public function json_datatable(){
		$json =  array(
					array(
						  	"id"=> 1,
							"region"=>"North America",
							"country"=>"USA",
							"city"=>"New York",
							"sales"=>1740,
							"date"=>"2013/01/06"
						), 
						array(
						  	"id"=> 2,
							"region"=>"North America",
							"country"=>"USA",
							"city"=>"Los Angeles",
							"sales"=> 850,
							"date"=>"2013/01/13"
						), 
						array(
						  	"id"=>3,
							"region"=>"North America",
							"country"=>"USA",
							"city"=>"Denver",
							"sales"=>2235,
							"date"=>"2013/01/07"
						), 
						array(
							"id"=>9,
							"region"=>"Europe",
							"country"=>"GBR",
							"city"=>"London",
							"sales"=>6175,
							"date"=>"2013/01/24"
						), array(
							"id"=>10,
							"region"=>"Europe",
							"country"=>"DEU",
							"city"=>"Berlin",
							"sales"=>4575,
							"date"=>"2013/01/11"
						), array(
							"id"=>11,
							"region"=>"Europe",
							"country"=>"ESP",
							"city"=>"Madrid",
							"sales"=>3680,
							"date"=>"2013/01/12"
						), array(
							"id"=>12,
							"region"=>"Europe",
							"country"=>"RUS",
							"city"=>"Moscow",
							"sales"=>2260,
							"date"=>"2013/01/01"
						), array(
							"id"=>13,
							"region"=>"Asia",
							"country"=>"CHN",
							"city"=>"Beijing",
							"sales"=>2910,
							"date"=>"2013/01/26"
						), array(
							"id"=>14,
							"region"=>"Asia",
							"country"=>"JPN",
							"city"=>"Tokio",
							"sales"=>8400,
							"date"=>"2013/01/05"
						), array(
							"id"=>15,
							"region"=>"Asia",
							"country"=>"KOR",
							"city"=>"Seoul",
							"sales"=>1325,
							"date"=>"2013/01/14"
						), array(
							"id"=>16,
							"region"=>"Australia",
							"country"=>"AUS",
							"city"=>"Sydney",
							"sales"=>3920,
							"date"=>"2014/01/05"
						), array(
							"id"=>17,
							"region"=>"Australia",
							"country"=>"AUS",
							"city"=>"Melbourne",
							"sales"=>2220,
							"date"=>"2014/01/15"
						)
					);
		
		echo json_encode(array("data"=>$json));
	}
} 