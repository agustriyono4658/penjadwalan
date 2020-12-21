<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Jadwan_mod extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function kode(){
			$this->db->select('RIGHT(jadwal.no_jdwl,2) as no_jdwl', FALSE);
          	$this->db->order_by('no_jdwl','DESC');    
          	$this->db->limit(1);    
          	$query = $this->db->get('jadwal');  //cek dulu apakah ada sudah ada kode di tabel.    
          	if($query->num_rows() <> 0){      
               	//cek kode jika telah tersedia    
               	$data = $query->row();      
               	$kode = intval($data->no_jdwl) + 1; 
          	}
          	else{      
               	$kode = 1;  //cek jika kode belum terdapat pada table
          	}
			$random = rand(00,99);  
			$batas = str_pad($kode, 1, "0", STR_PAD_LEFT);    
			$kodetampil = "JDL".$random.$batas;  //format kode
			return $kodetampil; 
		}

		function getpelamar($nmpel){
			$this->db->where('nmpel', $nmpel);
			return $this->db->get('pelamar');
		}

		function datajadwal(){
			return $this->db->query("SELECT * FROM jadwal INNER JOIN pelamar ON jadwal.id_pelamar = pelamar.id_pel INNER JOIN sp ON jadwal.no_sp = sp.no_sp INNER JOIN wo ON sp.no_wo = wo.no_wo INNER JOIN lokasi ON wo.idlokasi = lokasi.idlokasi WHERE jadwal.kategori = 'Wawancara'");
		}

		function datasp(){
			return $this->db->get('sp');
		}

		function simpan($data){
			return $this->db->insert('jadwal', $data);
		}
	}


 ?>