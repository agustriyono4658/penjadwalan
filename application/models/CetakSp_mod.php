<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class CetakSp_mod extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function kode()
    	{
          $this->db->select('RIGHT(sp.no_sp,2) as no_sp', FALSE);
          $this->db->order_by('no_sp','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('sp');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->no_sp) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(00,99);  
              $batas = str_pad($kode, 1, "0", STR_PAD_LEFT);    
              $kodetampil = "SP".$random.$batas;  //format kode
              return $kodetampil;  
         }

		function data_wo(){
			return $this->db->get('wo');
		}

		function getdatawo($no_wo){
			return $this->db->query("SELECT * FROM wo INNER JOIN klien ON wo.id_klien = klien.id_klien WHERE wo.no_wo = '$no_wo'");
		}

		function simpan_sp($data){
			return $this->db->insert('sp', $data);
		}
	}

?>