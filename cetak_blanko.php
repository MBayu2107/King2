<?php

include "fpdf186/fpdf.php";
include "koneksi.php";

$pdf = new FPDF();
$pdf-> AddPage();

$pdf->SetFont('Times', 'B',16);
$pdf->Image('img/RSUDUlin.png', 10, 15, 30);
$pdf->Cell(0,5,'UNIT TRANSFUSI DARAH','0','1','C',false);
$pdf->Cell(0,10,'RSUD ULIN BANJARMASIN', '0', '1', 'C', false);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(0,5,'Jl. A. Yani KM. 2,5 NO. 43 Telp (0511) 325180 Ext 1044','0','1','C',false);
$pdf->SetFont('Times', 'B',16);
$pdf->Cell(0,10,'BANJARMASIN','0','1','C',false);
$pdf->Image('img/utdrs.png', 170, 10, 30,);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Times','B',14);
$pdf->Cell(0,5,'BLANKO REAKSI DARAH','0','1','C',false);
$pdf->Ln(3);



$pdf->SetFont('Arial','B',5);
$pdf->Cell(6,6,'NO',1,0,'C');
$pdf->Cell(12,6,'TANGGAL',1,0,'C');
$pdf->Cell(10,6,'NO. RMK',1,0,'C');
$pdf->Cell(13,6,'NAMA PASIEN',1,0,'C');
$pdf->Cell(12,6,'RUANGAN',1,0,'C');
$pdf->Cell(19,6,'GOLONGAN DARAH',1,0,'C');
$pdf->Cell(12,6,'RHESUS',1,0,'C');
$pdf->Cell(17,6,'NO. CROSS TEST',1,0,'C');
$pdf->Cell(20,6,'NO. KANTONG DARAH',1,0,'C');
$pdf->Cell(13,6,'JENIS DARAH',1,0,'C');
$pdf->Cell(20,6,'HASIL PEMERIKSAAN',1,0,'C');
$pdf->Cell(20,6,'REAKSI TRANSFUSI',1,0,'C');
$pdf->Cell(13,6,'KETERANGAN',1,0,'C');
$pdf->Cell(11,6,'PEMERIKSA',1,0,'C');
$pdf->Ln(2);
$no = 0;
$sql = mysqli_query($koneksi, "SELECT * FROM blanko ORDER BY id_blanko");
while($data = mysqli_fetch_array($sql)) {
    $no++;
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',4);
    $pdf->Cell(6,4,$no,1,0,'L');
    $pdf->Cell(12,4,$data['tanggal'],1,0,'L');
    $pdf->Cell(10,4,$data['no_rmk'],1,0,'L');
    $pdf->Cell(13,4,$data['nama_pasien'],1,0,'L');
    $pdf->Cell(12,4,$data['ruangan'],1,0,'L');
    $pdf->Cell(19,4,$data['golongan_darah'],1,0,'L');
    $pdf->Cell(12,4,$data['rhesus'],1,0,'L');
    $pdf->Cell(17,4,$data['cross_test'],1,0,'L');
    $pdf->Cell(20,4,$data['kantong_darah'],1,0,'L');
    $pdf->Cell(13,4,$data['jenis_darah'],1,0,'L');
    $pdf->Cell(20,4,$data['hasil'],1,0,'L');
    $pdf->Cell(20,4,$data['reaksi'],1,0,'L');
    $pdf->Cell(13,4,$data['keterangan'],1,0,'L');
    $pdf->Cell(11,4,$data['pemeriksa'],1,0,'L');
}

$pdf->Output();

?>