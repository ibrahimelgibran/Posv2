<?php
include 'report_header.php';

$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN PEMBELIAN', 0, 1, 'C');
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(0, 7, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');
$sql = "SELECT b.id_beli, b.kode_beli, b.faktur_beli, b.tgl_faktur, c.nama_supplier, SUM(a.qty_beli)   
        AS qty_beli, b.total, b.diskon, d.nama_lengkap FROM detil_pembelian a, pembelian b, supplier c, user d
        WHERE b.id_beli = a.id_beli AND c.id_supplier = b.id_supplier AND b.is_active = 1 AND d.id_user = b.id_user AND SUBSTRING(b.tgl, 1, 10) BETWEEN '$awal' AND '$akhir' GROUP BY a.id_beli";

$sqldetil = "SELECT b.id_beli, a.kode_detil_beli, c.barcode, c.nama_barang, a.hrg_beli, a.hrg_jual, 
         a.qty_beli, a.subtotal FROM detil_pembelian a, pembelian b, barang c
         WHERE b.id_beli = a.id_beli AND c.id_barang = a.id_barang AND SUBSTRING(b.tgl, 1, 10) BETWEEN '$awal' AND '$akhir'";

$detil = $this->model->General($sqldetil)->result_array();
$beli = $this->model->General($sql)->result_array();

foreach ($beli as $b) {
    $pdf->Cell(30, 17, '', 0, 1);
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(30, 6, 'NO. FAKTUR', 0, 0, 'L');
    $pdf->Cell(2, 6, ': ', 0, 0, 'C');
    $pdf->Cell(65, 6, $b['faktur_beli'], 0, 0, 'L');
    $pdf->Cell(25, 6, 'SUPPLIER', 0, 0, 'L');
    $pdf->Cell(3, 6, ': ', 0, 0, 'R');
    $pdf->Cell(50, 6, $b['nama_supplier'], 0, 1, 'L');
    $pdf->Cell(30, 0, '', 0, 1);
    $pdf->Cell(30, 6, 'TGL. FAKTUR', 0, 0, 'L');
    $pdf->Cell(3, 6, ': ', 0, 0, 'C');
    $pdf->Cell(64, 6, $b['tgl_faktur'], 0, 0, 'L');
    $pdf->Cell(25, 6, 'USER', 0, 0, 'L');
    $pdf->Cell(3, 6, ': ', 0, 0, 'R');
    $pdf->Cell(20, 6, $b['nama_lengkap'], 0, 0, 'L');
    $pdf->Cell(30, 6, '', 0, 1);
    $pdf->SetFont('Times', 'B', 9);
    $pdf->Cell(7, 6, 'NO', 1, 0, 'C');
    $pdf->Cell(25, 6, 'BARCODE', 1, 0, 'C');
    $pdf->Cell(68, 6, 'ITEM', 1, 0, 'C');
    $pdf->Cell(28, 6, 'HARGA BELI', 1, 0, 'C');
    $pdf->Cell(28, 6, 'HARGA JUAL', 1, 0, 'C');
    $pdf->Cell(11, 6, 'QTY', 1, 0, 'C');
    $pdf->Cell(25, 6, 'SUBTOTAL', 1, 1, 'C');
    $i = 1;
    foreach ($detil as $d) {
        if ($b['id_beli'] == $d['id_beli']) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(7, 6, $i++, 1, 0);
            $pdf->Cell(25, 6, $d['barcode'], 1, 0);
            $pdf->Cell(68, 6, $d['nama_barang'], 1, 0);
            $pdf->Cell(28, 6, 'Rp. ' . $d['hrg_beli'], 1, 0);
            $pdf->Cell(28, 6, 'Rp. ' . $d['hrg_jual'], 1, 0);
            $pdf->Cell(11, 6, $d['qty_beli'], 1, 0);
            $pdf->Cell(25, 6, 'Rp. ' . $d['subtotal'], 1, 1);
        }
    }
    $pdf->Cell(132, 2, '', 0, 1, 'R');
    $pdf->Cell(132, 6, '', 0, 0, 'R');
    $pdf->SetFont('Times', 'B', 10);
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(28, 6, 'Disc (Rp)', 1, 0, 'L');
    $pdf->Cell(32, 6, 'Rp. ' . $b['diskon'], 1, 1, 'L');
    $pdf->Cell(132, 6, '', 0, 0, 'R');
    $pdf->Cell(28, 6, 'Grand Total', 1, 0, 'L');
    $pdf->Cell(32, 6, 'Rp. ' . $b['total'], 1, 1, 'L');
}

$pdf->SetFont('Times', '', 10);

$pdf->Output('laporan_pembelian.pdf', 'I');
