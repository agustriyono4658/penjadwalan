<?php

class Laplamaranklien extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->library('pdf');
	}

	public function index()
	{
       	$data = array(
       				'data_klien' => $this->db->get('klien')->result()
       			);
        $this->load->view("staff/laporan/Laplamaranklien", $data);
	}

	function cetak(){
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
        $pdf->Cell(190,7,'LAPORAN DATA LAMARAN KLIEN',0,1,'');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'ID Pelamar',1,0);
        $pdf->Cell(30,6,'Nama Pelamar',1,0);
        $pdf->Cell(30,6,'Jenis Kelamin',1,0);
        $pdf->Cell(30,6,'Alamat',1,0);
        $pdf->Cell(30,6,'Asal Kota',1,0);
        $pdf->Cell(25,6,'No. Telp',1,0);
        $pdf->Cell(25,6,'Posisi',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get("pelamar")->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(20,6,$row->id_pel,1,0);
            $pdf->Cell(30,6,$row->nmpel,1,0);
            $pdf->Cell(30,6,$row->jenkel,1,0);
            $pdf->Cell(30,6,$row->alamatpel,1,0); 
            $pdf->Cell(30,6,$row->asalkota,1,0); 
            $pdf->Cell(25,6,$row->notelp,1,0); 
            $pdf->Cell(25,6,$row->posisiminat,1,0); 
        }
        $pdf->Output();
    }
}