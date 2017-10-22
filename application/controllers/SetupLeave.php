<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SetupLeave extends CI_Controller
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
    function index()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main']  = get_phrase('master_data');
        $page_data['page_name']  = 'leave/SetupLeave';
        $page_data['page_title'] = get_phrase('leave_setup');
        $this->load->view('index', $page_data);
    }

}



