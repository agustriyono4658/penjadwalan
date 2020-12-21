<?php

class Cetaksp extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

		$this->load->model('CetakSp_mod');
	}

	public function index()
	{
		$data = array(
					'kode' => $this->CetakSp_mod->kode(),
					'data_wo' => $this->CetakSp_mod->data_wo()->result()
				);
        // load view admin/overview.php
        $this->load->view("staff/cetaksp/form", $data);
	}

	function getdatawo(){
		$kode_wo = $this->input->post('no_wo');

		$datawo = $this->CetakSp_mod->getdatawo($kode_wo)->row();
		$output = array("klien" => $datawo->nmklien); 
		echo json_encode($output);
	}

	function cetaksp(){
		$no_sp = $this->input->post('nosp');
		$no_wo = $this->input->post('no_wo');
		$tgl = $this->input->post('tgl');

		$dataarray = array(
						'no_sp' => $no_sp,
						'no_wo' => $no_wo,
						'tgl_sp' => $tgl
					);

		$this->CetakSp_mod->simpan_sp($dataarray);

		$data = array(
					'no_sp' => $no_sp
				);
		$this->load->view('staff/cetaksp/layoutcetak', $data);
	}


}