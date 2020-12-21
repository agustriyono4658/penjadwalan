<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pewawancara_mod extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('pewawancara')
                 ->order_by('id_wan', 'DESC')
                 ->get();
        return $query->result();
    }

    public function kode()
    {
          $this->db->select('RIGHT(pewawancara.id_wan,2) as id_wan', FALSE);
          $this->db->order_by('id_wan','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('pewawancara');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_wan) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(0,9);  
              $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
              $kodetampil = "PW".$random.$batas;  //format kode
              return $kodetampil;  
    }

    public function simpan($data)
    {

        $query = $this->db->insert("pewawancara", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id)
    {
        $query = $this->db->get_where('pewawancara', ['id_wan' => $id]);
            if ($query) {
                return $query->row();
            } else {
                return false;
        }
    }

    public function update($data, $id)
    {

        $query = $this->db->update("pewawancara", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("pewawancara", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
