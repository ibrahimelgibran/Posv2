<?php
$pdf = new FPDF('P','cm',array(8,50));
$pdf->setMargins(0.3,0.8,0.3);
// $pdf->SetAutoPageBreak(true,30);
$pdf->AddPage(); 
$pdf->SetFont('Times','B',18);

$pdf->Cell(70,0,'',0,1);
$pdf->SetFont('helvetica','B',18);
$pdf->Cell(35,0.5,$profil['NAMA_PERUSAHAAN'],0,1, 'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(35,0.5,$profil['ALAMAT_PERUSAHAAN'],0,1, 'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(35,0.5,'Telp : '.$profil['TELP_PERUSAHAAN'],0,1, 'L');

$max_id = "SELECT MAX(id_jual) AS id_jual FROM penjualan";
$id = implode($this->db->query($max_id)->row_array());

if($id_resi == null){
    $sql_general = "SELECT a.invoice, a.bayar, a.kembali, a.ppn, a.tgl, b.nama_karyawan, b.id_karyawan, c.nama_cs, c.id_cs FROM penjualan a, karyawan b, customer c  WHERE a.id_karyawan = b.id_karyawan AND a.id_cs = c.id_cs AND a.id_jual = '$id'";
    $sql_detail = "SELECT b.nama_barang, a.qty_jual, a.diskon, a.subtotal, a.harga_item FROM detil_penjualan a,  barang b
    WHERE a.id_barang = b.id_barang AND a.id_jual = '$id'";
    $sql_total = "SELECT SUM(subtotal) AS total, SUM(diskon) AS diskon FROM detil_penjualan WHERE id_jual = '$id'";
} else {
    $sql_general = "SELECT a.invoice, a.bayar, a.kembali, a.ppn, a.tgl, b.nama_karyawan, b.id_karyawan, c.nama_cs, c.id_cs FROM penjualan a, karyawan b, customer c WHERE a.id_karyawan = b.id_karyawan AND a.id_cs = c.id_cs AND a.id_jual = '$id_resi'";
    $sql_detail = "SELECT b.nama_barang, a.qty_jual, a.diskon, a.subtotal, a.harga_item FROM detil_penjualan a,  barang b
    WHERE a.id_barang = b.id_barang AND a.id_jual = '$id_resi'";
    $sql_total = "SELECT SUM(subtotal) AS total, SUM(diskon) AS diskon FROM detil_penjualan WHERE id_jual = '$id_resi'";
}
$general = $this->db->query($sql_general)->row_array();
$detail = $this->db->query($sql_detail)->result_array();
$total = $this->db->query($sql_total)->row_array();

$pdf->SetFont('helvetica','',9);
$pdf->Cell(70,0.5,'--------------------------------------------------------------------',0,1, 'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(32,0.5,'NO : '.$general['invoice'],0,1, 'L');
$pdf->Cell(35,0.5,$general['tgl'],0,1, 'L');
$pdf->Cell(35,0.5,'Nama Sales : '.$general['nama_karyawan'],0,1, 'L');
$pdf->Cell(35,0.5,'Nama Pelanggan : '.$general['nama_cs'],0,1, 'L');
$pdf->Cell(70,0.5,'--------------------------------------------------------------------',0,1, 'L');

foreach($detail as $d){
    $pdf->SetFont('helvetica','B',11);
    $pdf->Cell(5,0.8,$d['nama_barang'],0,0, 'L');
    $pdf->Cell(2.3,0.8,$d['qty_jual'],0,1, 'R');
    $pdf->Cell(3,0.4,'Rp. '.number_format($d['harga_item'],'0','.','.'),0,0, 'L');
    $pdf->Cell(4.3,0.4,'Rp. '.number_format($d['subtotal'],'0','.','.'),0,1, 'R');
    
}
$pdf->SetFont('helvetica','',9);
$pdf->Cell(70,0.5,'--------------------------------------------------------------------',0,1, 'L');
$pdf->SetFont('helvetica','B',11);
$pdf->Cell(3,0.8,'GRAND TOTAL',0,0, 'R');
$pdf->Cell(0.4,0.8,':',0,0, 'L');
$pdf->Cell(1.5,0.8,'Rp. '.number_format($total['total'],'0','.','.'),0,1, 'L');
$pdf->Cell(3,0.5,'TOTAL',0,0, 'R');
$pdf->Cell(0.4,0.5,':',0,0, 'R');
$pdf->Cell(20,0.5,'Rp. '.number_format($total['total'] + $general['ppn'],'0','.','.'),0,1, 'L');


$pdf->Cell(73,8,'',0,1, 'R');
$pdf->Cell(73,4,'',0,1, 'C');


$pdf->Output($general['invoice'].'.pdf', 'I');