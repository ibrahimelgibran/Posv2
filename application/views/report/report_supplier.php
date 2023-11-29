<?php
include 'report_header.php';

$pdf->SetFont('Times','B',14);
$pdf->Cell(0,5,'LAPORAN DATA SUPPLIER',0,1,'C');	
foreach($sup as $s){
    $pdf->Cell(30,17,'',0,1);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(35,6,'KODE SUPPLIER',0,0, 'L');
    $pdf->Cell(2,6,': ',0,0, 'C');
    $pdf->Cell(45,6,$s['KODE_SUPPLIER'],0,0, 'L');
    $pdf->Cell(37,6,'NAMA SUPPLIER',0,0, 'L');
    $pdf->Cell(3,6,': ',0,0, 'R');
    $pdf->Cell(30,6,$s['NAMA_SUPPLIER'],0,1, 'L');
    $pdf->Cell(30,0,'',0,1);
    $pdf->Cell(35,6,'TELP SUPPLIER',0,0, 'L');
    $pdf->Cell(3,6,': ',0,0, 'C');
    $pdf->Cell(44,6,$s['TELP_SUPPLIER'],0,0, 'L');
    $pdf->Cell(38,6,'FAX SUPPLIER',0,0, 'L');
    $pdf->Cell(3,6,': ',0,0, 'R');
    $pdf->Cell(20,6,$s['FAX_SUPPLIER'],0,0, 'L');
    $pdf->Cell(30,6,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(45,6,'ALAMAT',1,0, 'C');
    $pdf->Cell(40,6,'EMAIL',1,0, 'C');
    $pdf->Cell(28,6,'BANK',1,0, 'C');
    $pdf->Cell(40,6,'REKENING',1,0, 'C');
    $pdf->Cell(40,6,'ATAS NAMA',1,1, 'C');
    foreach($detil as $d){
        if($s['ID_SUPPLIER'] == $d['ID_SUPPLIER']){
            $pdf->SetFont('Times','',9);
            $pdf->Cell(45,6,$d['ALAMAT_SUPPLIER'],1,0);
            $pdf->Cell(40,6,$d['EMAIL_SUPPLIER'],1,0);
            $pdf->Cell(28,6,$d['BANK'],1,0);
            $pdf->Cell(40,6,$d['REKENING'],1,0);
            $pdf->Cell(40,6,$d['ATAS_NAMA'],1,1);
        }
    }
}

$pdf->SetFont('Times','',10);

$pdf->Output('laporan_supplier.pdf', 'I');