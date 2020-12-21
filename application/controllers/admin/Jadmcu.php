<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadmcu extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        $this->load->model('Jadmcu_mod');

    }

    public function index()
    {
        $data = array(
                    'data_jadwal' => $this->Jadmcu_mod->datajadwal()->result()
                );
        $this->load->view("admin/jadmcu/list", $data);
    }

    public function add()
    {
        $data = array(
                    'kode' => $this->Jadmcu_mod->kode(),
                    'data_sp' => $this->Jadmcu_mod->datasp()->result()
                );

        $this->load->view('admin/jadmcu/new_form', $data);
    }

    function simpan(){
        $kode_jadwal = $this->input->post('kdjad');
        $no_sp = $this->input->post('kodesp');
        $tgl = $this->input->post('tglwan');
        $nama_pelamar = $this->input->post('nmpel');

        $datapelamar = $this->Jadmcu_mod->getpelamar($nama_pelamar)->row();
        
        $data = array(
                    'no_jdwl' => $kode_jadwal,
                    'no_sp' => $no_sp,
                    'id_pelamar' => $datapelamar->id_pel,
                    'tgl_jdwl' => $tgl,
                    'kategori' => 'MCU'
                );

        $this->Jadmcu_mod->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('admin/jadmcu/');
    }

}