<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar_mod extends CI_Model {

	public function get_all() {

		$query = $this->db->select("*")
                 ->from('pelamar')
                 ->order_by('id_pel', 'DESC')
                 ->get();
        return $query->result();

	}

	public function getKota() {
		$data = $this->db->get('lokasi');

		return $data->result();
	}

	public function getPosisi() {
		$data = $this->db->get('posisi');

		return $data->result();
	}
	public function kode()
    {
          $this->db->select('RIGHT(pelamar.id_pel,2) as id_pel', FALSE);
          $this->db->order_by('id_pel','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('pelamar');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_pel) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(00,99);  
              $batas = str_pad($kode, 1, "0", STR_PAD_LEFT);    
              $kodetampil = "PL".$random.$batas;  //format kode
              return $kodetampil;  
         }

    public function simpan($data)
    {

        $query = $this->db->insert("pelamar", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id)
    {
        $query = $this->db->get_where('pelamar', ['id_pel' => $id]);
            if ($query) {
                return $query->row();
            } else {
                return false;
        }
    }

    public function update($data, $id)
    {
        $this->db->where('id_pel', $id);
        return $this->db->update('pelamar', $data);

    }

    public function hapus($id)
    {

        $query = $this->db->delete("Pelamar", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
