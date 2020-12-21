<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klinik_mod extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('klinik')
                 ->order_by('kdklinik', 'DESC')
                 ->get();
        return $query->result();
    }

    public function kode()
    {
          $this->db->select('RIGHT(klinik.kdklinik,2) as kdklinik', FALSE);
          $this->db->order_by('kdklinik','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('klinik');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->kdklinik) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(00,99);  
              $batas = str_pad($kode, 1, "0", STR_PAD_LEFT);    
              $kodetampil = "KL".$random.$batas;  //format kode
              return $kodetampil;  
         }

    public function simpan($data)
    {

        $query = $this->db->insert("klinik", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id)
    {
        $query = $this->db->get_where('klinik', ['kdklinik' => $id]);
            if ($query) {
                return $query->row();
            } else {
                return false;
        }
    }

    public function update($data, $id)
    {

        $query = $this->db->update("klinik", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("klinik", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
