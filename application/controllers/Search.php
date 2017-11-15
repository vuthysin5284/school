<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("search_model", "search_m");

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }

    // auto completed
    function search(){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $obj = new stdClass();
        $obj->search = $this->input->get('query');
        $result =$this->search_m->makeAsearch($obj);

        echo json_encode($result);
    }

    //
    function search_result(){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $obj = new stdClass();
        $obj->search = $this->input->get('query');
        $result =$this->search_m->resul_search($obj);

        echo json_encode($result);
    }
}