<?php

class Lapjadkategori extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->library('pdf');
	}

	public function index()
	{
        // load view admin/overview.php
        $this->load->view("staff/laporan/Lapjadkategori");
	}

	function cetak(){
        $tgl_awal = $this->input->post('tglawal');
        $tgl_akhir = $this->input->post('tglakhir');
        $kategori = $this->input->post('kategori');
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','',15);
        // mencetak string 
        $pdf->Cell(190,7,'PT LOTUS LESTARI RAYA',0,1,'C');
        $pdf->Cell(190,3,'',0,1,'C');
        $pdf->Cell(190,0,'',1,0);
        $pdf->Cell(190,7,'',0,1,'C');
        
        $pdf->SetFont('Arial','',11);
        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN DATA JADWAL PER KATEGORI',0,1,'');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(190,7,'Periode :'.$tgl_awal.' & '.$tgl_akhir,0,1,'');

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'No. Jadwal',1,0);
        $pdf->Cell(30,6,'Tgl Jadwal',1,0);
        $pdf->Cell(30,6,'Nama Pelamar',1,0);
        $pdf->Cell(30,6,'Alamat',1,0);
        $pdf->Cell(30,6,'Asal Kota',1,0);
        $pdf->Cell(25,6,'No. Telp',1,0);
        $pdf->Cell(25,6,'Posisi Minat',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->query("SELECT * FROM jadwal INNER JOIN pelamar ON jadwal.id_pelamar = pelamar.id_pel WHERE jadwal.kategori = '$kategori' AND jadwal.tgl_jdwl BETWEEN '$tgl_awal' AND '$tgl_akhir'")->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(20,6,$row->no_jdwl,1,0);
            $pdf->Cell(30,6,$row->tgl_jdwl,1,0);
            $pdf->Cell(30,6,$row->nmpel,1,0);
            $pdf->Cell(30,6,$row->alamatpel,1,0); 
            $pdf->Cell(30,6,$row->asalkota,1,0); 
            $pdf->Cell(25,6,$row->notelp,1,0); 
            $pdf->Cell(25,6,$row->posisiminat,1,1); 
        }
        $pdf->Output();
    }
}