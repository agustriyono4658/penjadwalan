<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('staff_mod'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Staff',
            'data_staff' => $this->staff_mod->get_all()

        );

        $this->load->view("admin/staff/list", $data);
    }

    public function add()
    {
        $data = array(

            'title'     => 'Tambah Data staff',
            'kode' => $this->staff_mod->kode()

        );

        $this->load->view('admin/staff/new_form', $data);
    }

    public function simpan()
    {
        $data = array(
            'id_staff'       => $this->input->post("idstaff"),
            'nama_staff'         => $this->input->post("nmstaff"),
            'username'         => $this->input->post("username"),
            'password'         => $this->input->post("password"),
            'alamat'         => $this->input->post("alamatstaff"),
            'telp'         => $this->input->post("tlpstaff"),
        );

        $this->staff_mod->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('admin/staff/');

    }

    public function edit($id)
    {
        $id_wan = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Staff',
            'data_staff' => $this->staff_mod->edit($id)

        );

        $this->load->view('admin/staff/edit_form', $data);
    }

    public function update()
    {
        $id['id_staff'] = $this->input->post("idstaff");
        $data = array(
            'nama_staff'         => $this->input->post("nmstaff"),
            'username'         => $this->input->post("username"),
            'password'         => $this->input->post("password"),
            'alamat'         => $this->input->post("alamatstaff"),
            'telp'         => $this->input->post("tlpstaff"),
        );

        $this->staff_mod->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('admin/staff/');

    }

    public function hapus($idstaff)
    {
        $id['id_staff'] = $idstaff;

        $this->staff_mod->hapus($id);

        //redirect
        redirect('admin/staff/');

    }

}