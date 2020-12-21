<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('pelamar_mod'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Pelamar',
            'data_pelamar' => $this->pelamar_mod->get_all(),

        );

        $this->load->view("admin/pelamar/list", $data);
    }

}