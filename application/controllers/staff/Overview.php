<?php

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("overview_mod");
	}

	public function index()
	{
        // load view admin/overview.php
        $data = array(

            'jmlpelamar' => $this->overview_mod->hitungPelamar()
        );

        $this->load->view("staff/overview");
        
	}
}