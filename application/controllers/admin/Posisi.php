<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posisi extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('posisi_mod'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Posisi',
            'data_posisi' => $this->posisi_mod->get_all()

        );

        $this->load->view("admin/posisi/list", $data);
    }

    public function add()
    {
        $data = array(

            'title'     => 'Tambah Data Posisi',
            'kode' => $this->posisi_mod->kode()

        );

        $this->load->view('admin/posisi/new_form', $data);
    }

    public function simpan()
    {
        $data = array(
            'id_pos'       => $this->input->post("nopos"),
            'nmpos'         => $this->input->post("nmpos"),
        );

        $this->posisi_mod->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('admin/posisi/');

    }

    public function edit($id)
    {
        $nopos = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Posisi',
            'data_posisi' => $this->posisi_mod->edit($id)

        );

        $this->load->view('admin/posisi/edit_form', $data);
    }

    public function update()
    {
        $id['id_pos'] = $this->input->post("nopos");
        $data = array(

            'id_pos'           => $this->input->post("nopos"),
            'nmpos'         => $this->input->post("nmpos"),
        );

        $this->posisi_mod->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('admin/posisi/');

    }

    public function hapus($nopos)
    {
        $id['id_pos'] = $this->uri->segment(3);

        $this->posisi_mod->hapus($id);

        //redirect
        redirect('admin/klien/');

    }

}