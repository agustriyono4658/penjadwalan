<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('kota_mod'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Kota',
            'data_kota' => $this->kota_mod->get_all()

        );

        $this->load->view("admin/kota/list", $data);
    }

    public function add()
    {
        $data = array(

            'title'     => 'Tambah Data Kota',
            'kode' => $this->kota_mod->kode()

        );

        $this->load->view('admin/kota/new_form', $data);
    }

    public function simpan()
    {
        $data = array(
            'idlokasi'       => $this->input->post("idlokasi"),
            'nmlokasi'         => $this->input->post("nmlokasi"),
        );

        $this->kota_mod->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('admin/kota/');

    }

    public function edit($id)
    {
        $idlokasi = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Posisi',
            'data_kota' => $this->kota_mod->edit($id)

        );

        $this->load->view('admin/kota/edit_form', $data);
    }

    public function update()
    {
        $id['idlokasi'] = $this->input->post("idlokasi");
        $data = array(

            'idlokasi'           => $this->input->post("idlokasi"),
            'nmlokasi'         => $this->input->post("nmlokasi"),
        );

        $this->kota_mod->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('admin/kota/');

    }

    public function hapus($idlokasi)
    {
        $id['idlokasi'] = $idlokasi;

        $this->kota_mod->hapus($id);

        //redirect
        redirect('admin/kota/');

    }

}