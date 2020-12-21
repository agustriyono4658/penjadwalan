<?php

class Lapsp extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->library('pdf');
	}

	public function index()
	{
        // load view admin/overview.php
        $this->load->view("staff/laporan/Lapsp");
	}

	function cetak(){

        $tgl_awal = $this->input->post('tglawal');
        $tgl_akhir = $this->input->post('tglakhir');
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->SetFont('Arial','',16);
        // mencetak string 
        $pdf->Cell(190,7,'PT LOTUS LESTARI RAYA',0,1,'C');
        $pdf->Cell(190,3,'',0,1,'C');
        $pdf->Cell(190,0,'',1,0);
        $pdf->Cell(190,7,'',0,1,'C');
        
        $pdf->SetFont('Arial','',11);
        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN SURAT PENGAJUAN',0,1,'');
        
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(190,7,'Periode :'.$tgl_awal.' & '.$tgl_akhir,0,1,'');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'No. SP',1,0);
        $pdf->Cell(25,6,'Tgl SP',1,0);
        $pdf->Cell(27,6,'No. WO',1,0);
        $pdf->Cell(25,6,'Tgl WO',1,0);
        $pdf->Cell(20,6,'Lokasi',1,0);
        $pdf->Cell(25,6,'Posisi',1,0);
        $pdf->Cell(25,6,'Jumlah',1,0);
        $pdf->Cell(25,6,'Deskripsi',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->query("SELECT * FROM sp INNER JOIN wo ON sp.no_wo = wo.no_wo INNER JOIN detilwo ON wo.no_wo = detilwo.no_wo INNER JOIN posisi ON detilwo.id_pos = posisi.id_pos INNER JOIN lokasi ON wo.idlokasi = lokasi.idlokasi WHERE sp.tgl_sp BETWEEN '$tgl_awal' AND '$tgl_akhir'")->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(20,6,$row->no_sp,1,0);
            $pdf->Cell(25,6,$row->tgl_sp,1,0);
            $pdf->Cell(27,6,$row->no_wo,1,0);
            $pdf->Cell(25,6,$row->tgl_wo,1,0); 
            $pdf->Cell(20,6,$row->nmlokasi,1,0); 
            $pdf->Cell(25,6,$row->nmpos,1,0); 
            $pdf->Cell(25,6,$row->jml,1,0); 
            $pdf->Cell(25,6,$row->deskripsi,1,0); 
        }
        $pdf->Output();
    }
}