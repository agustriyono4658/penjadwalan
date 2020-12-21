<?php
Class Lappelamar extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->SetFont('Arial','',15);
        // mencetak string 
        $pdf->Cell(190,7,'PT LOTUS LESTARI RAYA',0,1,'C');
        $pdf->Cell(190,3,'',0,1,'C');
        $pdf->Cell(190,0,'',1,0);
        $pdf->Cell(190,7,'',0,1,'C');
        
        $pdf->SetFont('Arial','',11);
        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN DATA PELAMAR',0,1,'');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'ID pelamar',1,0);
        $pdf->Cell(85,6,'NAMA Pelamar',1,0);
        $pdf->Cell(27,6,'Jenis Kelamin',1,0);
        $pdf->Cell(25,6,'Alamat',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get('pelamar')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(20,6,$row->id_pel,1,0);
            $pdf->Cell(85,6,$row->nmpel,1,0);
            $pdf->Cell(27,6,$row->jenkel,1,0);
            $pdf->Cell(25,6,$row->alamatpel,1,1); 
        }
        $pdf->Output();
    }
}