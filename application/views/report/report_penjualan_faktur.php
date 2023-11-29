<?php
include 'report_header.php';
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN PENJUALAN Per-FAKTUR', 0, 1, 'C');

$pdf->Cell(0, 7, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');
$sql = "SELECT b.id_jual, b.invoice, d.nama_lengkap, c.nama_cs, e.nama_karyawan, f.nama_barang, a.harga_item, SUM(a.diskon) AS diskon, SUM(a.subtotal) AS total, SUBSTRING(b.tgl, 1, 10) AS tgl, b.tgl AS waktu, SUM(a.qty_jual) AS qty FROM detil_penjualan a, penjualan b, customer c, user d, karyawan e, barang f  WHERE b.id_jual = a.id_jual AND c.id_cs = b.id_cs AND d.id_user = b.id_user AND e.id_karyawan = b.id_karyawan AND f.id_barang = a.id_barang AND b.is_active= 1
AND SUBSTRING(b.tgl, 1, 10) BETWEEN '$awal' AND '$akhir' GROUP BY a.id_jual ORDER BY tgl ASC";

// $sqldetil = "SELECT b.id_jual, a.kode_detil_jual, c.barcode, c.nama_barang, a.harga_item, a.qty_jual, a.diskon,  a.subtotal FROM detil_penjualan a, penjualan b, barang c WHERE b.id_jual = a.id_jual AND c.id_barang = a.id_barang";

//$detil = $this->model->General($sqldetil)->result_array();
$jual = $this->model->General($sql)->result_array();
// foreach ($jual as $j) {
    $pdf->SetFont('Times', '', 10);
    
    $pdf->Cell(30, 6, '', 0, 1);
    $pdf->Cell(7, 6, 'NO', 1, 0, 'C');
    $pdf->Cell(30, 6, 'TANGGAL', 1, 0, 'C');
    $pdf->Cell(35, 6, 'NO FAKTUR', 1, 0, 'C');
    $pdf->Cell(43, 6, 'PELANGGAN', 1, 0, 'C');
    $pdf->Cell(43, 6, 'KASIR/PEGAWAI', 1, 0, 'C');
    $pdf->Cell(25, 6, 'SUBTOTAL', 1, 1, 'C');
    $i = 1;
    $grandtotal = 0;
    foreach ($jual as $d) {
       // if ($j['id_jual'] == $d['id_jual']) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(7, 6, $i++, 1, 0);
            $pdf->Cell(30, 6, $d['waktu'], 1, 0);
            $pdf->Cell(35, 6, $d['invoice'], 1, 0);
            $pdf->Cell(43, 6, $d['nama_cs'], 1, 0);
            $pdf->Cell(43, 6, $d['nama_karyawan'], 1, 0);
            $pdf->Cell(25, 6, 'Rp. '. number_format($d['total']), 1, 1);
       // }
    $total = $d['qty'] * $d['harga_item'];
    $grandtotal += $total;
    }
    // $grandtot = $d['total'];
    $pdf->Cell(128, 2, '', 0, 1, 'R');
    $pdf->Cell(128, 6, '', 0, 0, 'R');
    // $pdf->SetFont('Times', 'B', 10);
    // $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(28, 6, 'Grand Total (Rp)', 1, 0, 'L');
    $pdf->Cell(28, 6, 'Rp. ' . number_format($grandtotal), 1, 1, 'L');
// }

$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_penjualan_perfaktur.pdf', 'I');
