<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemSetup extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }
    //
    function index() {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }


        $page_data['page_width']  =  50;
        $page_data['page_main']  =  get_phrase('master_data');
        $page_data['page_name']  = 'masterdata/item/itemsetup';
        $page_data['page_title'] = get_phrase('item_setup');
        $this->load->view('index', $page_data);
    }

    //
    function admin_item_new($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        if($param2=='edit'){
            //$page_data["enrolment_detail"] = $this->enrolment_m->get_enrolment_general($obj);
        }
        $page_data["id"] = $param1;
        $page_data["crud"] = $param2;
        $this->load->view('masterdata/item/admin_item_new' ,$page_data);
    }

    //
    function admin_item_fee()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main'] = get_phrase('master_data');
        $page_data['page_name']  = 'masterdata/item/admin_item';
        $page_data['page_title'] = get_phrase('admin_item');
        $this->load->view('masterdata/item/admin_item', $page_data);
    }

    //
    function school_item_fee()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main'] = get_phrase('master_data');
        $page_data['page_name']  = 'masterdata/item/school_item_fee';
        $page_data['page_title'] = get_phrase('school_item_fee');
        $this->load->view('masterdata/item/school_item_fee', $page_data);
    }

    //
    function transport_item_fee()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main'] = get_phrase('master_data');
        $page_data['page_name']  = 'masterdata/item/transport_item_fee';
        $page_data['page_title'] = get_phrase('transport_item_fee');
        $this->load->view('masterdata/item/transport_item_fee', $page_data);
    }
    //
    function lunch_item_fee()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main'] = get_phrase('master_data');
        $page_data['page_name']  = 'masterdata/item/lunch_item_fee';
        $page_data['page_title'] = get_phrase('lunch_item_fee');
        $this->load->view('masterdata/item/lunch_item_fee', $page_data);
    }


}