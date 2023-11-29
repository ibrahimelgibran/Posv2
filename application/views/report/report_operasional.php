<?php 
include 'report_header.php';
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,5,'LAPORAN BARANG OPERASIONAL',0,1,'C');	
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,7,'Periode :'.$awal.' s/d '.$akhir,0,1,'C');
$sql = "SELECT d.id_brg_operasional, a.barcode, a.nama_barang, d.jenis, d.nilai, SUBSTRING(d.tanggal, 1, 10) AS tanggal, d.jml, c.satuan, b.kategori FROM  barang a, kategori b, satuan c, barang_operasional d        
WHERE a.id_satuan = c.id_satuan AND a.id_kategori = b.id_kategori AND d.id_barang = a.id_barang AND d.jenis = 'Operasional' AND SUBSTRING(d.tanggal, 1, 10) BETWEEN '$awal' AND '$akhir'";
$data = $this->db->query($sql)->result_array();
        
    $pdf->Cell(30,8,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(30,6,'BARCODE',1,0, 'C');
    $pdf->Cell(60,6,'NAMA ITEM',1,0, 'C');
    $pdf->Cell(17,6,'SATUAN',1,0, 'C');
    $pdf->Cell(17,6,'JUMLAH',1,0, 'C');
    $pdf->Cell(25,6,'NILAI',1,0, 'C');
    $pdf->Cell(23,6,'JENIS',1,0, 'C');
    $pdf->Cell(23,6,'TANGGAL',1,1, 'C');
    foreach($data as $d){
        $pdf->SetFont('Times','',9);
        $pdf->Cell(30,6,$d['barcode'],1,0);
        $pdf->Cell(60,6,$d['nama_barang'],1,0);			
        $pdf->Cell(17,6,$d['satuan'],1,0);
        $pdf->Cell(17,6,$d['jml'],1,0);
        $pdf->Cell(25,6,'Rp. '.number_format($d['nilai'],'0','.','.'),1,0);
        $pdf->Cell(23,6,$d['jenis'],1,0);
        $pdf->Cell(23,6,$d['tanggal'],1,1);
    }
    $sql_nilai = "SELECT SUM(nilai) AS nilai FROM barang_operasional WHERE jenis = 'Operasional' AND SUBSTRING(tanggal, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $nilai = $this->model->General($sql_nilai)->row_array();

    $pdf->Cell(118,2,'',0,1, 'R');
    $pdf->Cell(118,6,'',0,0, 'R');
    $pdf->SetFont('Times','B',10);
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(40,6,'Total Nilai',1,0, 'L');
    $pdf->Cell(37,6,'Rp. '.number_format($nilai['nilai'],'0','.','.').',-',1,1, 'L');

$pdf->Output('laporan_barang_operasional.pdf', 'I');