<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota_mod extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('lokasi')
                 ->order_by('idlokasi', 'DESC')
                 ->get();
        return $query->result();
    }


    public function kode()
    {
          $this->db->select('RIGHT(lokasi.idlokasi,2) as idlokasi', FALSE);
          $this->db->order_by('idlokasi','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('lokasi');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->idlokasi) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(0,9);  
              $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
              $kodetampil = "KT".$batas;  //format kode
              return $kodetampil;  
         }

    public function simpan($data)
    {

        $query = $this->db->insert("lokasi", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id)
    {
        $query = $this->db->get_where('lokasi', ['idlokasi' => $id]);
            if ($query) {
                return $query->row();
            } else {
                return false;
        }
    }

    public function update($data, $id)
    {

        $query = $this->db->update("lokasi", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("lokasi", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
