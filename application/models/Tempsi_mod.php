<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempsi_mod extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('tmpttest')
                 ->order_by('kdtmpt', 'DESC')
                 ->get();
        return $query->result();
    }

    public function kode()
    {
          $this->db->select('RIGHT(tmpttest.kdtmpt,2) as kdtmpt', FALSE);
          $this->db->order_by('kdtmpt','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('tmpttest');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->kdtmpt) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(0,9);  
              $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
              $kodetampil = "TS".$random.$batas;  //format kode
              return $kodetampil;  
     }

    public function simpan($data)
    {

        $query = $this->db->insert("tmpttest", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id)
    {
        $query = $this->db->get_where('tmpttest', ['kdtmpt' => $id]);
            if ($query) {
                return $query->row();
            } else {
                return false;
        }
    }

    public function update($data, $id)
    {

        $query = $this->db->update("tmpttest", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("tmpttest", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
