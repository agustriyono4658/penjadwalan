<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workorder_mod extends CI_Model {


	public function getKota() {
		$data = $this->db->get('lokasi');

		return $data->result();
	}

	public function getPosisi() {
		$data = $this->db->get('posisi');

		return $data->result();
	}

  function wo(){
      return $this->db->query("SELECT * FROM wo INNER JOIN detilwo ON wo.no_wo = detilwo.no_wo INNER JOIN lokasi ON wo.idlokasi = lokasi.idlokasi INNER JOIN posisi ON detilwo.id_pos = posisi.id_pos");
  }

  function getwo($id){
      $this->db->where('no_wo', $id);
      return $this->db->get('wo')->row();
  }

  public function getKlien() {
    $data = $this->db->get('klien');

    return $data->result();
  }

  function detailwo($id){
      return $this->db->query("SELECT * FROM detilwo INNER JOIN posisi ON detilwo.id_pos = posisi.id_pos WHERE detilwo.no_wo = '$id'")->result();
  }

	public function kode()
    {
          $this->db->select('RIGHT(wo.no_wo,2) as no_wo', FALSE);
          $this->db->order_by('no_wo','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('wo');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->no_wo) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          } 
              $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
              $kodetampil = "WO".$batas;  //format kode
              return $kodetampil;  
         }


  function simpan_detail($data){
      return $this->db->insert('detilwo', $data);
  }  

  function simpan_wo($wo){
      return $this->db->insert('wo', $wo);
  }

  function update_wo($data, $no_wo){
      $this->db->where('no_wo', $no_wo);
      return $this->db->update('wo', $data);
  }

  function delete($no_wo){
      $this->db->where('no_wo', $no_wo);
      return $this->db->delete('wo');
  }

  function delete_detil($no_wo){
      $this->db->where('no_wo', $no_wo);
      return $this->db->delete('detilwo');
  }

  function deletedetail($no_wo){
      $this->db->where('no_wo', $no_wo);
      return $this->db->delete('detilwo');
  }

}
