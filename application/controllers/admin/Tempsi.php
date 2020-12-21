<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempsi extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('tempsi_mod'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Tempat Psikotes',
            'data_tempsi' => $this->tempsi_mod->get_all()

        );

        $this->load->view("admin/tempsi/list", $data);
    }

    public function add()
    {
        $data = array(

            'title'     => 'Tambah Data Tempat Psikotes',
            'kode' => $this->tempsi_mod->kode()

        );

        $this->load->view('admin/tempsi/new_form', $data);
    }

    public function simpan()
    {
        $data = array(
            'kdtmpt'       => $this->input->post("kdtmpt"),
            'nmtmpt'         => $this->input->post("nmtmpt"),
            'alamattmpt'         => $this->input->post("alamattmpt"),
            'telptmpt'         => $this->input->post("tlptmpt"),
        );

        $this->tempsi_mod->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('admin/tempsi/');

    }

    public function edit($id)
    {
        $kdtmpt = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Tempat Psikotes',
            'data_tempsi' => $this->tempsi_mod->edit($id)

        );

        $this->load->view('admin/tempsi/edit_form', $data);
    }

    public function update()
    {
        $id['kdtmpt'] = $this->input->post("kdtmpt");
        $data = array(
            'kdtmpt'       => $this->input->post("kdtmpt"),
            'nmtmpt'         => $this->input->post("nmtmpt"),
            'alamattmpt'         => $this->input->post("alamattmpt"),
            'telptmpt'         => $this->input->post("tlptmpt"),
        );

        $this->tempsi_mod->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('admin/tempsi/');

    }

    public function hapus($kdtmpt)
    {
        $id['kdtmpt'] = $kdtmpt;

        $this->tempsi_mod->hapus($id);

        //redirect
        redirect('admin/tempsi/');

    }

}