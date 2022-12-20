<?php
// memanggil library FPDF
session_start();
require('assets/vendor/fpdf/fpdf.php');
include 'config.php';
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',24);
// mencetak string 
$pdf->Cell(0,7,'KARTU PESERTA UJIAN',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,15,'',0,1);

$pdf->SetFont('Arial','B',14);

$sql = "SELECT * FROM peserta WHERE no_peserta = '".$_SESSION['id']."'";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_array($query);

$pdf->Cell(70,9,'No Peserta: ',0,0);
$pdf->Cell(90,9,$data['no_peserta'],0,1);
$pdf->Cell(70,9,'NIK: ',0,0);
$pdf->Cell(90,9,$data['nik'],0,1);
$pdf->Cell(70,9,'Nama: ',0,0);
$pdf->Cell(90,9,$data['nama'],0,1);
$pdf->Cell(70,9,'Tempat / Tanggal Lahir: ',0,0);
$pdf->Cell(90,9,$data['tempat_lahir']." / ".$data['tanggal_lahir'],0,1);
$pdf->Cell(70,9,'Kualifikasi Pendidikan: ',0,0);
$pdf->Cell(90,9,$data['pendidikan'],0,1);
$pdf->Cell(70,9,'Formasi Jabatan: ',0,0);
$pdf->Cell(90,9,$data['jabatan'],0,1);

$pdf->Image('assets/image/'.$data['pas_foto'], 220, 30, 60, 80);


$pdf->Output();
?>