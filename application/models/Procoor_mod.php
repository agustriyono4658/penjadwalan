<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procoor_mod extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('procoor')
                 ->order_by('id_pro', 'DESC')
                 ->get();
        return $query->result();
    }

    public function kode()
    {
          $this->db->select('RIGHT(procoor.id_pro,2) as id_pro', FALSE);
          $this->db->order_by('id_pro','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('procoor');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_pro) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(0,9);  
              $batas = str_pad($kode, 2, "0", STR_PAD_LEFT);    
              $kodetampil = "PC".$batas;  //format kode
              return $kodetampil;  
    }

    public function simpan($data)
    {

        $query = $this->db->insert("procoor", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id)
    {
        $query = $this->db->get_where('procoor', ['id_pro' => $id]);
            if ($query) {
                return $query->row();
            } else {
                return false;
        }
    }

    public function update($data, $id)
    {

        $query = $this->db->update("procoor", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("procoor", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
