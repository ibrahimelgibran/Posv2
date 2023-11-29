<?php
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage(); 
$pdf->SetFont('Times','B',18);
$sqltoko = "select * from profil_perusahaan";
$profil = $this->model->General($sqltoko)->row_array();
$pdf->Image('./assets/img/profil/'.$profil['LOGO'],30,5,27,24);
$pdf->Cell(25);
$pdf->SetFont('Times','B',20);
$pdf->Cell(0,5,$profil['NAMA_PERUSAHAAN'],0,1,'C');
$pdf->Cell(25);
$pdf->SetFont('Times','B',10);
$pdf->Cell(0,5,'Website :'.$profil['WEBSITE_PERUSAHAAN'] .'/ E-Mail : '.$profil['EMAIL_PERUSAHAAN'],0,1,'C');
$pdf->Cell(25);
$pdf->SetFont('Times','B',10);
$pdf->Cell(0,5,$profil['ALAMAT_PERUSAHAAN'].' Telp. / Fax : '.$profil['TELP_PERUSAHAAN'].' / '.$profil['FAX_PERUSAHAAN'],0,1,'C');

$pdf->SetLineWidth(1);
$pdf->Line(10,36,197,36);
$pdf->SetLineWidth(0);
$pdf->Line(10,37,197,37);
$pdf->Cell(30,17,'',0,1);