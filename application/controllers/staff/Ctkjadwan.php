<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctkjadwan extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        $this->load->model('CetakJadwal_mod');

    }

    public function index()
    {
        $data = array(
        			'kode' => $this->CetakJadwal_mod->kode(),
                    'datapewawancara' => $this->CetakJadwal_mod->datapelamar()->result(),
                    'data_jadwal' => $this->CetakJadwal_mod->data_jadwal()->result()
        		);
        $this->load->view("staff/ctkjadwan/form", $data);
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
        $id_wan = $this->input->post('id_wan');
        $tglwan = $this->input->post('tglwan');

        $dataarray = array(
                'no_undangan' => $no_undangan,
                'no_jdwl' => $no_jdwl,
                'id_wan' => $id_wan,
                'tgl_und' => $tglwan
        );

        $this->CetakJadwal_mod->simpan($dataarray);

        $data = array(
                    'no_undangan' => $no_undangan
                );

        $this->load->view('staff/ctkjadwan/layoutcetak', $data);
    }

    
}