<?php 
include 'report_header.php';
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,5,'LAPORAN DATA HUTANG',0,1,'C');	
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,7,'Periode :'.$awal.' s/d '.$akhir,0,1,'C');

if($supplier == "Semua"){
    $sql = "SELECT a.id_hutang, b.kode_beli, c.nama_supplier, SUBSTRING(a.tgl_hutang, 1, 10) AS tanggal, a.jml_hutang, a.bayar, a.sisa, a.status FROM hutang a, pembelian b, supplier c WHERE a.id_beli = b.id_beli AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir' ORDER BY SUBSTRING(a.tgl_hutang, 1, 10) ASC";
    $data = $this->db->query($sql)->result_array();
} else {
    $sql = "SELECT a.id_hutang, b.kode_beli, c.nama_supplier, SUBSTRING(a.tgl_hutang, 1, 10) AS tanggal, a.jml_hutang, a.bayar, a.sisa, a.status FROM hutang a, pembelian b, supplier c WHERE a.id_beli = b.id_beli AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND c.id_supplier = '$supplier' ORDER BY SUBSTRING(a.tgl_hutang, 1, 10) ASC";
    $data = $this->db->query($sql)->result_array();
}

        
    $pdf->Cell(30,8,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(37,6,'KODE BELI',1,0, 'C');
    $pdf->Cell(35,6,'SUPPLIER',1,0, 'C');
    $pdf->Cell(25,6,'TANGGAL',1,0, 'C');
    $pdf->Cell(25,6,'JUMLAH',1,0, 'C');
    $pdf->Cell(25,6,'BAYAR',1,0, 'C');
    $pdf->Cell(25,6,'SISA',1,0, 'C');
    $pdf->Cell(20,6,'STATUS',1,1, 'C');
    foreach($data as $d){
        $pdf->SetFont('Times','',9);
        $pdf->Cell(37,6,$d['kode_beli'],1,0);
        $pdf->Cell(35,6,$d['nama_supplier'],1,0);			
        $pdf->Cell(25,6,$d['tanggal'],1,0);
        $pdf->Cell(25,6,'Rp. '.number_format($d['jml_hutang'],'0','.','.'),1,0);
        $pdf->Cell(25,6,'Rp. '.number_format($d['bayar'],'0','.','.'),1,0);
        $pdf->Cell(25,6,'Rp. '.number_format($d['sisa'],'0','.','.'),1,0);
        $pdf->Cell(20,6,$d['status'],1,1);
    }
    $query_total = "SELECT SUM(jml_hutang) AS total FROM hutang WHERE SUBSTRING(tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $query_lunas = "SELECT SUM(jml_hutang) AS total FROM hutang WHERE status = 'Lunas' AND SUBSTRING(tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $query_sisa= "SELECT SUM(sisa) AS sisa FROM hutang WHERE SUBSTRING(tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $query_bayar= "SELECT SUM(bayar) AS bayar FROM hutang WHERE SUBSTRING(tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir'";

    $total = $this->model->General($query_total)->row_array();
    $lunas = $this->model->General($query_lunas)->row_array();
    $sisa = $this->model->General($query_sisa)->row_array();
    $bayar = $this->model->General($query_bayar)->row_array();

    $pdf->Cell(115,2,'',0,1, 'R');
    $pdf->Cell(115,6,'',0,0, 'R');
    $pdf->SetFont('Times','B',10);
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(40,6,'Total Hutang',1,0, 'L');
    $pdf->Cell(37,6,'Rp. '.number_format($total['total'],'0','.','.').',-',1,1, 'L');
    $pdf->Cell(115,6,'',0,0, 'R');
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(40,6,'Hutang Dibayarkan',1,0, 'L');
    $pdf->Cell(37,6,'Rp. '.number_format($bayar['bayar'],'0','.','.').',-',1,1, 'L');
    $pdf->Cell(115,6,'',0,0, 'R');
    $pdf->Cell(40,6,'Total Lunas',1,0, 'L');
    $pdf->Cell(37,6,'Rp. '.number_format($lunas['total'],'0','.','.').',-',1,1, 'L');
    $pdf->Cell(115,6,'',0,0, 'R');
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(40,6,'Sisa Hutang',1,0, 'L');
    $pdf->Cell(37,6,'Rp. '.number_format($sisa['sisa'],'0','.','.').',-',1,0, 'L');

$pdf->Output('laporan_hutang.pdf', 'I');