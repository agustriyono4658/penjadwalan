<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwan extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        $this->load->model('Jadwan_mod');

    }

    public function index()
    {
        $data = array(
                    'data_jadwal' => $this->Jadwan_mod->datajadwal()->result()
                );
        $this->load->view("admin/jadwan/list", $data);
    }

    public function add()
    {
        $data = array(
                    'kode' => $this->Jadwan_mod->kode(),
                    'data_sp' => $this->Jadwan_mod->datasp()->result()
                );

        $this->load->view('admin/jadwan/new_form', $data);
    }

    function simpan(){
        $kode_jadwal = $this->input->post('kdjad');
        $no_sp = $this->input->post('kodesp');
        $tgl = $this->input->post('tglwan');
        $nama_pelamar = $this->input->post('nmpel');

        $datapelamar = $this->Jadwan_mod->getpelamar($nama_pelamar)->row();
        
        $data = array(
                    'no_jdwl' => $kode_jadwal,
                    'no_sp' => $no_sp,
                    'id_pelamar' => $datapelamar->id_pel,
                    'tgl_jdwl' => $tgl,
                    'kategori' => 'Wawancara'
                );

        $this->Jadwan_mod->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('admin/jadwan/');
    }

    function getdatapelamar(){
        $nama_pelamar = $this->input->post('nama_pelamar');
        $datapelamar = $this->Jadwan_mod->getpelamar($nama_pelamar)->row();
        $output = array("alamat" => $datapelamar->alamatpel, "jnk" => $datapelamar->jenkel, "notelp" => $datapelamar->notelp, "nama" => $datapelamar->nmpel);
        echo json_encode($output);
    }
    

}