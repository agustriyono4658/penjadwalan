<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pewawancara extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('pewawancara_mod'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Pewawancara',
            'data_pewawancara' => $this->pewawancara_mod->get_all()

        );

        $this->load->view("admin/pewawancara/list", $data);
    }

    public function add()
    {
        $data = array(

            'title'     => 'Tambah Data Pewawancara',
            'kode' => $this->pewawancara_mod->kode()

        );

        $this->load->view('admin/pewawancara/new_form', $data);
    }

    public function simpan()
    {
        $data = array(
            'id_wan'       => $this->input->post("id_wan"),
            'namawan'         => $this->input->post("nmwan"),
            'alamatwan'         => $this->input->post("alamatwan"),
            'telpwan'         => $this->input->post("tlpwan"),
        );

        $this->pewawancara_mod->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('admin/pewawancara/');

    }

    public function edit($id)
    {
        $id_wan = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Pewawancara',
            'data_pewawancara' => $this->pewawancara_mod->edit($id)

        );

        $this->load->view('admin/pewawancara/edit_form', $data);
    }

    public function update()
    {
        $id['id_wan'] = $this->input->post("id_wan");
        $data = array(
            'id_wan'       => $this->input->post("id_wan"),
            'namawan'         => $this->input->post("nmwan"),
            'alamatwan'         => $this->input->post("alamatwan"),
            'telpwan'         => $this->input->post("tlpwan"),
        );

        $this->pewawancara_mod->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('admin/pewawancara/');

    }

    public function hapus($idlokasi)
    {
        $id['id_wan'] = $idlokasi;

        $this->pewawancara_mod->hapus($id);

        //redirect
        redirect('admin/pewawancara/');

    }

}