<?php
include 'report_header.php';
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,5,'LAPORAN DATA STOK OPNAME',0,1,'C');	
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,7,'Periode : '.$awal.' s/d '.$akhir,0,1,'C');
$sql = "SELECT a.id_stok_opname, b.barcode, b.nama_barang, a.stok, a.stok_nyata, a.selisih, a.keterangan, 
 a.nilai FROM stok_opname a, barang b WHERE a.id_barang = b.id_barang AND SUBSTRING(a.tanggal, 1, 10) BETWEEN '$awal' AND '$akhir'";
$data = $this->model->General($sql)->result_array();
    $pdf->Cell(30,8,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(7,6,'NO',1,0, 'C');
    $pdf->Cell(25,6,'BARCODE',1,0, 'C');
    $pdf->Cell(68,6,'NAMA ITEM',1,0, 'C');
    $pdf->Cell(11,6,'STOK',1,0, 'C');
    $pdf->Cell(18,6,'STOK NYT',1,0, 'C');
    $pdf->Cell(15,6,'SELISIH',1,0, 'C');
    $pdf->Cell(20,6,'NILAI (Rp)',1,0, 'C');
    $pdf->Cell(30,6,'KETERANGAN',1,1, 'C');
    $i=1;
    foreach($data as $d){
            $pdf->SetFont('Times','',9);
            $pdf->Cell(7,6,$i++,1,0);
            $pdf->Cell(25,6,$d['barcode'],1,0);
            $pdf->Cell(68,6,$d['nama_barang'],1,0);
            $pdf->Cell(11,6,$d['stok'],1,0);
            $pdf->Cell(18,6,$d['stok_nyata'],1,0);
            $pdf->Cell(15,6,$d['selisih'],1,0);
            $pdf->Cell(20,6,'Rp. '.$d['nilai'],1,0);
            $pdf->Cell(30,6,$d['keterangan'],1,1);
    }

$pdf->SetFont('Times','',10);

$pdf->Output('laporan_stokOpname.pdf', 'I');