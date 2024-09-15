<?php

include "fpdf186/fpdf.php";
include "koneksi.php";

$pdf = new FPDF();
$pdf-> AddPage();

$pdf->SetFont('Arial', 'B',16);
$pdf->Image('img/utdrs.png', 10, 10, 30);
$pdf->Cell(0,20,'UTDRS','0','1','C',false);
$pdf->SetFont('Arial', 'i', 8);
$pdf->Cell(0,5,'Alamat : Jl. A. Yani Banjarmasin', '0', '1', 'C', false);
$pdf->Cell(0,2,'Code by mbayu4116@gmail.com','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,5,'GOLONGAN DARAH','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','B',7);
$pdf->Cell(8,6,'NO',1,0,'C');
$pdf->Cell(35,6,'NAMA',1,0,'C');
$pdf->Cell(23,6,'TEMPAT LAHIR',1,0,'C');
$pdf->Cell(23,6,'TANGGAL LAHIR',1,0,'C');
$pdf->Cell(35,6,'ALAMAT',1,0,'C');
$pdf->Cell(23,6,'TELEPON',1,0,'C');
$pdf->Cell(40,6,'GOLONGAN DARAH',1,0,'C');
$pdf->Ln(2);
$no = 0;
$sql = mysqli_query($koneksi, "SELECT * FROM goldarah ORDER BY id_goldarah");
while($data = mysqli_fetch_array($sql)) {
    $no++;
    $pdf->Ln(4);
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(8,4,$no,1,0,'L');
    $pdf->Cell(35,4,$data['nama'],1,0,'L');
    $pdf->Cell(23,4,$data['tempat_lahir'],1,0,'L');
    $pdf->Cell(23,4,$data['tanggal_lahir'],1,0,'L');
    $pdf->Cell(35,4,$data['alamat'],1,0,'L');
    $pdf->Cell(23,4,$data['telepon'],1,0,'L');
    $pdf->Cell(40,4,$data['golongan_darah'],1,0,'L');
}

$pdf->Output();

?>