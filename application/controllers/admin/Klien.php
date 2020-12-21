<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('klien_mod'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Klien',
            'data_klien' => $this->klien_mod->get_all(),

        );

        $this->load->view("admin/klien/list", $data);
    }

    public function add()
    {
        $data = array(

            'title'     => 'Tambah Data Klien',
            'kode' => $this->klien_mod->kode(),

        );

        $this->load->view('admin/klien/new_form', $data);
    }

    public function simpan()
    {
        $data = array(

            'id_klien'       => $this->input->post("idklien"),
            'nmklien'         => $this->input->post("nmklien"),
            'alamat'    => $this->input->post("alamatkln"),
            'telp'         => $this->input->post("tlpkln"),

        );

        $this->klien_mod->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('admin/klien/');

    }

    public function edit($id)
    {
        $idklien = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Klien',
            'data_klien' => $this->klien_mod->edit($id)

        );


        $this->load->view('admin/klien/edit_form', $data);
    }

    public function update()
    {
        $id['id_klien'] = $this->input->post("idklien");
        $data = array(

            'nmklien'         => $this->input->post("nmklien"),
            'alamat'    => $this->input->post("alamatkln"),
            'telp'         => $this->input->post("tlpkln"),

        );

        $this->klien_mod->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('admin/klien/');

    }

    public function hapus($idklien)
    {
        $id['id_klien'] = $idklien;

        $this->klien_mod->hapus($id);

        //redirect
        redirect('admin/klien/');

    }

}