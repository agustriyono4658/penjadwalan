<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_mod extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('staff')
                 ->order_by('id_staff', 'DESC')
                 ->get();
        return $query->result();
    }

    public function kode()
    {
          $this->db->select('RIGHT(staff.id_staff,2) as id_staff', FALSE);
          $this->db->order_by('id_staff','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('staff');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_staff) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(0,9);  
              $batas = str_pad($kode, 2, "0", STR_PAD_LEFT);    
              $kodetampil = "S".$batas;  //format kode
              return $kodetampil;  
    }

    public function simpan($data)
    {

        $query = $this->db->insert("staff", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id)
    {
        $query = $this->db->get_where('staff', ['id_staff' => $id]);
            if ($query) {
                return $query->row();
            } else {
                return false;
        }
    }

    public function update($data, $id)
    {

        $query = $this->db->update("staff", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("staff", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
