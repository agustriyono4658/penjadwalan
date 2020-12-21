<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien_mod extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('klien')
                 ->order_by('id_klien', 'DESC')
                 ->get();
        return $query->result();
    }


    public function kode()
    {
          $this->db->select('RIGHT(klien.id_klien,2) as id_klien', FALSE);
          $this->db->order_by('id_klien','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('klien');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_klien) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(00,99);  
              $batas = str_pad($kode, 1, "0", STR_PAD_LEFT);    
              $kodetampil = "KLN".$random.$batas;  //format kode
              return $kodetampil;  
         }

    public function simpan($data)
    {

        $query = $this->db->insert("klien", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id)
    {
        $query = $this->db->get_where('klien', ['id_klien' => $id]);
            if ($query) {
                return $query->row();
            } else {
                return false;
        }
    }

    public function update($data, $id)
    {

        $query = $this->db->update("klien", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("klien", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
