<?php
include 'report_header.php';
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,5,'LAPORAN DATA BARANG',0,1,'C');	
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,7,$sup->NAMA_SUPPLIER,0,1,'C');

$sqldetil = "SELECT a.ID_BARANG, a.NAMA_BARANG, a.BARCODE, b.SATUAN, c.KATEGORI,  a.HARGA_BELI,a.HARGA_JUAL, 
                a.STOK FROM barang a, satuan b, kategori c, supplier d WHERE c.ID_KATEGORI = a.ID_KATEGORI AND b.ID_SATUAN = a.ID_SATUAN AND a.IS_ACTIVE = 1 AND d.ID_SUPPLIER = a.ID_SUPPLIER AND a.ID_SUPPLIER = '$id' ";
$detil = $this->model->General($sqldetil)->result_array();
    $pdf->Cell(30,8,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(7,6,'NO',1,0, 'C');
    $pdf->Cell(27,6,'BARCODE',1,0, 'C');
    $pdf->Cell(73,6,'NAMA ITEM',1,0, 'C');
    $pdf->Cell(20,6,'SATUAN',1,0, 'C');
    $pdf->Cell(25,6,'HARGA BELI',1,0, 'C');
    $pdf->Cell(25,6,'HARGA JUAL',1,0, 'C');
    $pdf->Cell(15,6,'STOK',1,1, 'C');
    $i=1;
    foreach($detil as $d){
            $pdf->SetFont('Times','',9);
            $pdf->Cell(7,6,$i++,1,0);
            $pdf->Cell(27,6,$d['BARCODE'],1,0);
            $pdf->Cell(73,6,$d['NAMA_BARANG'],1,0);
            $pdf->Cell(20,6,$d['SATUAN'],1,0);
            $pdf->Cell(25,6,'Rp. '.$d['HARGA_BELI'],1,0);
            $pdf->Cell(25,6,'Rp. '.$d['HARGA_JUAL'],1,0);
            $pdf->Cell(15,6,$d['STOK'],1,1);
        
    }

$pdf->SetFont('Times','',10);

$pdf->Output('laporan_itemBySupplier.pdf', 'I');