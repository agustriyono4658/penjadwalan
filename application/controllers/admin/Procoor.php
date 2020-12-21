<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procoor extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('procoor_mod'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Project Coordinator',
            'data_procoor' => $this->procoor_mod->get_all()

        );

        $this->load->view("admin/procoor/list", $data);
    }

    public function add()
    {
        $data = array(

            'title'     => 'Tambah Data Prpject Coordinator',
            'kode' => $this->procoor_mod->kode()

        );

        $this->load->view('admin/procoor/new_form', $data);
    }

    public function simpan()
    {
        $data = array(
            'id_pro'       => $this->input->post("idpro"),
            'nama_pro'         => $this->input->post("nmpro"),
            'username'         => $this->input->post("username"),
            'password'         => $this->input->post("password"),
            'alamat'         => $this->input->post("alamatpro"),
            'telp'         => $this->input->post("tlppro"),
        );

        $this->procoor_mod->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('admin/procoor/');

    }

    public function edit($id)
    {
        $idpro = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Project Coordinator',
            'data_procoor' => $this->procoor_mod->edit($id)

        );

        $this->load->view('admin/Procoor/edit_form', $data);
    }

    public function update()
    {
        $id['id_pro'] = $this->input->post("idpro");
        $data = array(
            'nama_pro'         => $this->input->post("nmpro"),
            'username'         => $this->input->post("username"),
            'password'         => $this->input->post("password"),
            'alamat'         => $this->input->post("alamatpro"),
            'telp'         => $this->input->post("tlppro"),
        );

        $this->procoor_mod->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('admin/procoor/');

    }

    public function hapus($idpro)
    {
        $id['id_pro'] = $idpro;

        $this->procoor_mod->hapus($id);

        //redirect
        redirect('admin/procoor/');

    }

}