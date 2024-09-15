<?php

include "fpdf186/fpdf.php";
include "koneksi.php";

$pdf = new FPDF();
$pdf-> AddPage();

$pdf->SetFont('Times', 'B',16);
$pdf->Cell(0,5,'DAFTAR PENDONOR DARAH UNIT TRANSFUSI DARAH','0','1','C',false);
$pdf->Cell(0,10,'RSUD ULIN BANJARMASIN', '0', '1', 'C', false);
$pdf->Cell(0,5,'BULAN SEPTEMBER 2024', '0', '1', 'C', false);
$pdf->Ln(3);



$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,8,'NO',1,0,'C');
$pdf->Cell(45,8,'TANGGAL',1,0,'C');
$pdf->Cell(45,8,'NAMA PENDONOR',1,0,'C');
$pdf->Cell(45,8,'GOLONGAN DARAH',1,0,'C');
$pdf->Cell(45,8,'KATEGORI DONOR',1,0,'C');
$pdf->Ln(3);
$no = 0;
$sql = mysqli_query($koneksi, "SELECT * FROM pendonor ORDER BY id_pendonor");
while($data = mysqli_fetch_array($sql)) {
    $no++;
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(8,5,$no,1,0,'L');
    $pdf->Cell(45,5,$data['tanggal'],1,0,'L');
    $pdf->Cell(45,5,$data['nama_pendonor'],1,0,'L');
    $pdf->Cell(45,5,$data['golongan_darah'],1,0,'L');
    $pdf->Cell(45,5,$data['kategori_donor'],1,0,'L');
}

$pdf->Output();

?>