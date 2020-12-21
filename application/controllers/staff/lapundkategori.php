<?php

class Lapundkategori extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->library('pdf');
	}

	public function index()
	{
        // load view admin/overview.php
        $this->load->view("staff/laporan/lapundkategori");
	}

	function cetak_wawancara(){
        $tgl_awal = $this->uri->segment(4);
        $tgl_akhir = $this->uri->segment(5);
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->SetFont('Arial','',16);
        // mencetak string 
        $pdf->Cell(275,7,'PT LOTUS LESTARI RAYA',0,1,'C');
        $pdf->Cell(300,3,'',0,1,'C');
        $pdf->Cell(275,0,'',1,0);
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->SetFont('Arial','',11);
        // mencetak string 
        $pdf->Cell(200,7,'LAPORAN UNDANGAN WAWANCARA',0,1,'');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(190,7,'Periode :'.$tgl_awal.' & '.$tgl_akhir,0,1,'');

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30,6,'No. Undangan',1,0);
        $pdf->Cell(30,6,'No. Jadwal',1,0);
        $pdf->Cell(30,6,'Tgl Jadwal',1,0);
        $pdf->Cell(30,6,'Nama Pelamar',1,0);
        $pdf->Cell(30,6,'Alamat',1,0);
        $pdf->Cell(30,6,'Asal Kota',1,0);
        $pdf->Cell(30,6,'No. Telp',1,0);
        $pdf->Cell(30,6,'Pewawancara',1,1);
        $pdf->SetFont('Arial','',9);
        $tgl_awal = $this->uri->segment(4);
        $tgl_akhir = $this->uri->segment(5);
        $mahasiswa = $this->db->query("SELECT * FROM undwawancara INNER JOIN jadwal ON undwawancara.no_jdwl = jadwal.no_jdwl INNER JOIN pelamar ON jadwal.id_pelamar = pelamar.id_pel INNER JOIN pewawancara ON undwawancara.id_wan = pewawancara.id_wan WHERE undwawancara.tgl_und BETWEEN '$tgl_awal' AND '$tgl_akhir'")->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(30,6,$row->no_undangan,1,0);
            $pdf->Cell(30,6,$row->no_jdwl,1,0);
            $pdf->Cell(30,6,$row->tgl_jdwl,1,0);
            $pdf->Cell(30,6,$row->nmpel,1,0);
            $pdf->Cell(30,6,$row->alamatpel,1,0); 
            $pdf->Cell(30,6,$row->asalkota,1,0); 
            $pdf->Cell(30,6,$row->notelp,1,0); 
            $pdf->Cell(30,6,$row->namawan,1,1); 
        }
        $pdf->Output();
    }

    function cetak_psikotest(){
        $tgl_awal = $this->uri->segment(4);
        $tgl_akhir = $this->uri->segment(5);
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->SetFont('Arial','',16);
        // mencetak string 
        $pdf->Cell(275,7,'PT LOTUS LESTARI RAYA',0,1,'C');
        $pdf->Cell(300,3,'',0,1,'C');
        $pdf->Cell(275,0,'',1,0);
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->SetFont('Arial','',11);
        // mencetak string 
        $pdf->Cell(200,7,'LAPORAN UNDANGAN PSIKOTEST',0,1,'');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(190,7,'Periode :'.$tgl_awal.' & '.$tgl_akhir,0,1,'');

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30,6,'No. Undangan',1,0);
        $pdf->Cell(30,6,'No. Jadwal',1,0);
        $pdf->Cell(30,6,'Tgl Jadwal',1,0);
        $pdf->Cell(30,6,'Nama Pelamar',1,0);
        $pdf->Cell(30,6,'Alamat',1,0);
        $pdf->Cell(30,6,'Asal Kota',1,0);
        $pdf->Cell(30,6,'No. Telp',1,0);
        $pdf->Cell(30,6,'Tempat Test',1,1);
        $pdf->SetFont('Arial','',9);
        $mahasiswa = $this->db->query("SELECT * FROM undpsikotes INNER JOIN jadwal ON undpsikotes.no_jdwl = jadwal.no_jdwl INNER JOIN pelamar ON jadwal.id_pelamar = pelamar.id_pel INNER JOIN tmpttest ON undpsikotes.kdtmpt = tmpttest.kdtmpt WHERE undpsikotes.tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'")->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(30,6,$row->no_undpsi,1,0);
            $pdf->Cell(30,6,$row->no_jdwl,1,0);
            $pdf->Cell(30,6,$row->tgl_jdwl,1,0);
            $pdf->Cell(30,6,$row->nmpel,1,0);
            $pdf->Cell(30,6,$row->alamatpel,1,0); 
            $pdf->Cell(30,6,$row->asalkota,1,0); 
            $pdf->Cell(30,6,$row->notelp,1,0); 
            $pdf->Cell(30,6,$row->nmtmpt,1,1); 
        }
        $pdf->Output();
    }

    function cetak_mcu(){
        $tgl_awal = $this->uri->segment(4);
        $tgl_akhir = $this->uri->segment(5);
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->SetFont('Arial','',16);
        // mencetak string 
        $pdf->Cell(275,7,'PT LOTUS LESTARI RAYA',0,1,'C');
        $pdf->Cell(300,3,'',0,1,'C');
        $pdf->Cell(275,0,'',1,0);
        $pdf->Cell(190,7,'',0,1,'C');
        
        $pdf->SetFont('Arial','',11);
        // mencetak string 
        $pdf->Cell(200,7,'LAPORAN UNDANGAN MEDICAL CHECKUP',0,1,'');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(190,7,'Periode :'.$tgl_awal.' & '.$tgl_akhir,0,1,'');
        
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30,6,'No. Undangan',1,0);
        $pdf->Cell(30,6,'No. Jadwal',1,0);
        $pdf->Cell(30,6,'Tgl Jadwal',1,0);
        $pdf->Cell(30,6,'Nama Pelamar',1,0);
        $pdf->Cell(30,6,'Alamat',1,0);
        $pdf->Cell(30,6,'Asal Kota',1,0);
        $pdf->Cell(30,6,'No. Telp',1,0);
        $pdf->Cell(30,6,'klinik',1,1);
        $pdf->SetFont('Arial','',9);
        $mahasiswa = $this->db->query("SELECT * FROM undmcu INNER JOIN jadwal ON undmcu.no_jdwl = jadwal.no_jdwl INNER JOIN pelamar ON jadwal.id_pelamar = pelamar.id_pel INNER JOIN klinik ON undmcu.kdklinik = klinik.kdklinik WHERE undmcu.tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'")->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(30,6,$row->no_undmcu,1,0);
            $pdf->Cell(30,6,$row->no_jdwl,1,0);
            $pdf->Cell(30,6,$row->tgl_jdwl,1,0);
            $pdf->Cell(30,6,$row->nmpel,1,0);
            $pdf->Cell(30,6,$row->alamatpel,1,0); 
            $pdf->Cell(30,6,$row->asalkota,1,0); 
            $pdf->Cell(30,6,$row->notelp,1,0); 
            $pdf->Cell(30,6,$row->nmklinik,1,1); 
        }
        $pdf->Output();
    }
}