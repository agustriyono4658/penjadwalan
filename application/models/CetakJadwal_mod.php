<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class CetakJadwal_mod extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function kode()
    	{
          $this->db->select('RIGHT(undwawancara.no_undangan,2) as no_undangan', FALSE);
          $this->db->order_by('no_undangan','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('undwawancara');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->no_undangan) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(00,99);  
              $batas = str_pad($kode, 1, "0", STR_PAD_LEFT);    
              $kodetampil = "UW".$random.$batas;  //format kode
              return $kodetampil;  
         }

         public function kodepsi()
      {
          $this->db->select('RIGHT(undpsikotes.no_undpsi,2) as no_undpsi', FALSE);
          $this->db->order_by('no_undpsi','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('undpsikotes');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->no_undpsi) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(00,99);  
              $batas = str_pad($kode, 1, "0", STR_PAD_LEFT);    
              $kodetampil = "UP".$random.$batas;  //format kode
              return $kodetampil;  
         }

         public function kodemcu()
      {
          $this->db->select('RIGHT(undmcu.no_undmcu,2) as no_undmcu', FALSE);
          $this->db->order_by('no_undmcu','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('undmcu');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->no_undmcu) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $random = rand(00,99);  
              $batas = str_pad($kode, 1, "0", STR_PAD_LEFT);    
              $kodetampil = "MCU".$random.$batas;  //format kode
              return $kodetampil;  
         }

         function getdatapelamar($no_jdwl){
         	return $this->db->query("SELECT * FROM jadwal INNER JOIN pelamar ON jadwal.id_pelamar = pelamar.id_pel WHERE jadwal.no_jdwl = '$no_jdwl'");
         }

    function datapelamar(){
        return $this->db->get('pewawancara');
    }
      function data_jadwal(){
        $this->db->where('kategori', 'Wawancara');
          return $this->db->get('jadwal');
      }

      function datatempattest(){
        return $this->db->get('tmpttest');
      }

       function dataklinik(){
        return $this->db->get('klinik');
      }
      function data_jadwalpsi(){
        $this->db->where('kategori', 'Psikotes');
          return $this->db->get('jadwal');
      }
      function data_jadwalmcu(){
        $this->db->where('kategori', 'MCU');
          return $this->db->get('jadwal');
      }
      function simpan($data){
          return $this->db->insert('undwawancara', $data);
      }

       function simpanpsi($data){
          return $this->db->insert('undpsikotes', $data);
      }
      function simpanmcu($data){
          return $this->db->insert('undmcu', $data);
      }
	}

?>