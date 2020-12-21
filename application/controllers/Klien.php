<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Klien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("klien_mod");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["klien"] = $this->Klien_mod->getAll();
        $this->load->view("admin/klien/list", $data);
    }   

    public function add()
    {
        $klien = $this->klien_mod;
        $validation = $this->form_validation;
        $validation->set_rules($klien->rules());

        if ($validation->run()) {
            $klien->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/klien/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/klien');
       
        $klien = $this->klien_mod;
        $validation = $this->form_validation;
        $validation->set_rules($klien->rules());

        if ($validation->run()) {
            $klien->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["klien"] = $klien->getById($id);
        if (!$data["klien"]) show_404();
        
        $this->load->view("admin/klien/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->klien_mod->delete($id)) {
            redirect(site_url('admin/klien'));
        }
    }
}