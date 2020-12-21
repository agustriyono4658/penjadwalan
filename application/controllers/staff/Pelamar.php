<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('pelamar_mod'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Pelamar',
            'data_pelamar' => $this->pelamar_mod->get_all(),

        );

        $this->load->view("staff/pelamar/list", $data);
    }

    public function add()
    {
        $data = array(

            'title'     => 'Tambah Data Pelamar',
            'kode' => $this->pelamar_mod->kode(),
            'data_kota' => $this->pelamar_mod->getKota(),
            'data_posisi' => $this->pelamar_mod->getPosisi(),
        );

        $this->load->view('staff/pelamar/new_form', $data);
    }

    public function simpan()
    {
        $config['upload_path'] = "./assets/datacv";
        $config['allowed_types'] = "pdf";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("cv")) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Error! '.$this->upload->display_errors().'
                                                </div>');
        }else{
            $file = $this->upload->data();
            $data = array(
                'id_pel'       => $this->input->post("idklien"),
                'nmpel'         => $this->input->post("nmklien"),
                'jenkel'         => $this->input->post("jenkel"),
                'alamatpel'         => $this->input->post("alamat"),
                'asalkota'         => $this->input->post("asalkota"),
                'notelp'              => $this->input->post("tlp"),
                'posisiminat'         => $this->input->post("posisiminat"),
                'cv'         => $file['file_name']
                
            );
             $this->pelamar_mod->simpan($data);
        }
        

       

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('staff/pelamar/');

    }

    public function edit($id)
    {
        $idklien = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Pelamar',
            'data_kota' => $this->pelamar_mod->getKota(),
            'data_posisi' => $this->pelamar_mod->getPosisi(),
            'data_klien' => $this->pelamar_mod->edit($id)
        );

        $this->load->view('staff/pelamar/edit_form', $data);
    }

    public function update()
    {
         $id = $this->input->post("id_pel");
         echo $id;
         $config['upload_path'] = "./assets/datacv";
        $config['allowed_types'] = "pdf";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("cv")) {
            $id = $this->input->post("id_pel");
            $data = array(
                'id_pel'       => $this->input->post("id_pel"),
                'nmpel'         => $this->input->post("nmpel"),
                'jenkel'         => $this->input->post("jenkel"),
                'alamatpel'         => $this->input->post("alamat"),
                'asalkota'         => $this->input->post("asalkota"),
                'notelp'              => $this->input->post("tlp"),
                'posisiminat'         => $this->input->post("posisiminat")
                
            );
             $this->pelamar_mod->update($data, $id);
        }else{
            $id = $this->input->post("id_pel");
            $file = $this->upload->data();
            $data = array(
                'id_pel'       => $this->input->post("id_pel"),
                'nmpel'         => $this->input->post("nmpel"),
                'jenkel'         => $this->input->post("jenkel"),
                'alamatpel'         => $this->input->post("alamat"),
                'asalkota'         => $this->input->post("asalkota"),
                'notelp'              => $this->input->post("tlp"),
                'posisiminat'         => $this->input->post("posisiminat"),
                'cv'         => $file['file_name']
                
            );
             $this->pelamar_mod->update($data, $id);
        }

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('staff/pelamar/');

    }

    public function hapus($id_pel)
    {
        $data = array(
                    'id_pel' => $id_pel
                );
        $this->pelamar_mod->hapus($data);

        //redirect
        redirect('staff/pelamar/');

    }

}