<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workorder extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('workorder_mod'); 

    }

    public function index()
    {
        $data['data_wo'] = $this->workorder_mod->wo()->result();
        $this->load->view("staff/wo/list", $data);
    }

    public function add()
    {
        $kode_wo = $this->workorder_mod->kode();
        $data = array(
            'title'     => 'Tambah Data Workorder',
            'kode' => $this->workorder_mod->kode(),
            'data_kota' => $this->workorder_mod->getKota(),
            'data_posisi' => $this->workorder_mod->getPosisi(),
            'data_klien' => $this->workorder_mod->getKlien()

        );        
        $this->workorder_mod->delete_detil($kode_wo);
        $this->load->view("staff/wo/new_form",$data);
    }

    public function edit()
    {
        $kode_wo = $this->uri->segment(4);
        $data = array(
            'title'     => 'Tambah Data Workorder',
            'kode' => $this->uri->segment(4),
            'data_kota' => $this->workorder_mod->getKota(),
            'data_posisi' => $this->workorder_mod->getPosisi(),
            'data_klien' => $this->workorder_mod->getKlien(),
            'data_wo' => $this->workorder_mod->getwo($kode_wo)

        );        

        $this->load->view("staff/wo/editwo",$data);
    }

    function detailwo(){
        $kode_wo = $this->uri->segment(4);
        $data['data_detailwo'] = $this->workorder_mod->detailwo($kode_wo);
        $this->load->view('staff/wo/detailwo', $data);
    }

    function tambah_detail(){
        $no_wo = $this->input->post('no_wo');
        $id_pos = $this->input->post('id_pos');
        $jml = $this->input->post('jml');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
                  'no_wo' => $no_wo,
                  'id_pos' => $id_pos,
                  'jml' => $jml,
                  'deskripsi' => $deskripsi
              );

        $proses = $this->workorder_mod->simpan_detail($data);
        if ($proses) {
            $hasil = array('hasil' => 'berhasil');
            echo json_encode($hasil);
        }else{
            $hasil = array('hasil' => 'gagal');
            echo json_encode($hasil);
        }
  }

  function simpan(){
        $no_wo = $this->input->post('no_wo');
        $idklien = $this->input->post('klien');
        $tgl_wo = $this->input->post('tglwo');
        $asalkota = $this->input->post('asalkota');

        $data = array(
                    'no_wo' => $no_wo,
                    'id_klien' => $idklien,
                    'tgl_wo' => $tgl_wo,
                    'idlokasi' => $asalkota
                );

        $this->workorder_mod->simpan_wo($data);
        redirect('staff/workorder/');
  }

  function update(){
        $no_wo = $this->input->post('no_wo');
        $idklien = $this->input->post('klien');
        $tgl_wo = $this->input->post('tglwo');
        $asalkota = $this->input->post('asalkota');

        $data = array(
                    'no_wo' => $no_wo,
                    'id_klien' => $idklien,
                    'tgl_wo' => $tgl_wo,
                    'idlokasi' => $asalkota
                );

        $this->workorder_mod->update_wo($data, $no_wo);
        redirect('staff/workorder/');
  }

  function hapus($no_wo){
        $this->workorder_mod->delete($no_wo);
        $this->workorder_mod->deletedetail($no_wo);
        redirect('staff/workorder/');
  }

}