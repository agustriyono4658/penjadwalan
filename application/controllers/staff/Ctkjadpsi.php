<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctkjadpsi extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        $this->load->model('CetakJadwal_mod');

    }

    public function index()
    {
        $data = array(
        			'kode' => $this->CetakJadwal_mod->kodepsi(),
                    'data_tempate_test' => $this->CetakJadwal_mod->datatempattest()->result(),
                    'data_jadwal' => $this->CetakJadwal_mod->data_jadwalpsi()->result()
        		);
        $this->load->view("staff/ctkjadpsi/form", $data);
    }

    function getdatapelamar(){
    	$nama_pelamar = $this->input->post('no_jdwl');
    	$datapelamar = $this->CetakJadwal_mod->getdatapelamar($nama_pelamar)->row();
    	$output = array("alamat" => $datapelamar->alamatpel, "jnk" => $datapelamar->jenkel, "notelp" => $datapelamar->notelp, "nama" => $datapelamar->nmpel);
    	echo json_encode($output);
    }

    function cetak(){
        $no_undangan = $this->input->post('kdjad');
        $no_jdwl = $this->input->post('no_jdwl');
        $id_wan = $this->input->post('kdtmpt');
        $tgl = $this->input->post('tglwan');

        $dataarray = array(
                'no_undpsi' => $no_undangan,
                'no_jdwl' => $no_jdwl,
                'kdtmpt' => $id_wan,
                'tgl' => $tgl
        );

        $this->CetakJadwal_mod->simpanpsi($dataarray);

        $data = array(
                    'no_undangan' => $no_undangan
                );

        $this->load->view('staff/ctkjadpsi/layoutcetak', $data);
    }


}