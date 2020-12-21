<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klinik extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('klinik_mod'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data klinik',
            'data_klinik' => $this->klinik_mod->get_all()

        );

        $this->load->view("admin/klinik/list", $data);
    }

    public function add()
    {
        $data = array(

            'title'     => 'Tambah Data klinik',
            'kode'   => $this->klinik_mod->kode()

        );

        $this->load->view('admin/klinik/new_form', $data);
    }

    public function simpan()
    {
        $data = array(
            'kdklinik'       => $this->input->post("idklinik"),
            'nmklinik'         => $this->input->post("nmklinik"),
            'alamatklk'         => $this->input->post("alamatklk"),
            'telpklk'         => $this->input->post("tlpklk")
        );

        $this->klinik_mod->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('admin/klinik/');

    }

    public function edit($id)
    {
        $kdklinik = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Klinik',
            'data_klinik' => $this->klinik_mod->edit($id)

        );

        $this->load->view('admin/klinik/edit_form', $data);
    }

    public function update()
    {
        $id['kdklinik'] = $this->input->post("kdklinik");
        $data = array(
            'kdklinik'       => $this->input->post("kdklinik"),
            'nmklinik'         => $this->input->post("nmklinik"),
            'alamatklk'         => $this->input->post("alamatklk"),
            'telpklk'         => $this->input->post("tlpklk"),
        );

        $this->klinik_mod->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('admin/klinik/');

    }

    public function hapus($kdklinik)
    {
        $id['kdklinik'] = $kdklinik;

        $this->klinik_mod->hapus($id);

        //redirect
        redirect('admin/klinik/');

    }

}