<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posisi_mod extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('posisi')
                 ->order_by('id_pos', 'DESC')
                 ->get();
        return $query->result();
    }

    public function kode()
    {
          $this->db->select('RIGHT(posisi.id_pos,2) as id_pos', FALSE);
          $this->db->order_by('id_pos','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('posisi');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_pos) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(0,9);  
              $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
              $kodetampil = "POS".$random.$batas;  //format kode
              return $kodetampil;  
    }

    public function simpan($data)
    {

        $query = $this->db->insert("posisi", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

   public function edit($id)
    {
        $query = $this->db->get_where('posisi', ['id_pos' => $id]);
            if ($query) {
                return $query->row();
            } else {
                return false;
        }
    }

    public function update($data, $id)
    {

        $query = $this->db->update("posisi", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("posisi", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
