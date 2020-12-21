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
        $this->load->view("admin/overview");
        $data['jmlpelamar'] = $this->overview_mod->hitungPelamar();
	}
}