<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends CI_Controller
{
   public function __construct()
   {

      parent::__construct();
      cek_login();
      cek_user();
      $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
   }
   public function karyawan()
   {
      if (isset($_FILES["importkar"]["name"])) {
         $path = $_FILES["importkar"]["tmp_name"];
         $object = IOFactory::load($path);

         foreach ($object->getWorksheetIterator() as $worksheet) {

            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
               $kode = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
               $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
               $telp = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
               $email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
               $status = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
               $tmptLahir = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
               $tglLahir = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
               $tglMasuk = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
               $alamat = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
               $data[] = array(
                  'KODE_KARYAWAN'   => $kode,
                  'NAMA_KARYAWAN'   => $nama,
                  'TELP_KARYAWAN'    => $telp,
                  'EMAIL_KARYAWAN'  => $email,
                  'STATUS_KARYAWAN' => $status,
                  'TMPT_LAHIR'       => $tmptLahir,
                  'TGL_LAHIR'       => $tglLahir,
                  'TGL_MASUK'       => $tglMasuk,
                  'ALAMAT'          => $alamat,
               );
            }
         }
         $this->db->insert_batch('karyawan', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Karyawan berhasil diimport.</div>');
         redirect('karyawan');
      }
   }
   public function customer()
   {
      if (isset($_FILES["importcus"]["name"])) {
         $path = $_FILES["importcus"]["tmp_name"];
         $object = IOFactory::load($path);

         foreach ($object->getWorksheetIterator() as $worksheet) {

            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++) {
               $kode = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
               $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
               $telp = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
               $email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
               $alamat = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
               $jenis = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
               $data[] = array(
                  'KODE_CS'   => $kode,
                  'NAMA_CS'   => $nama,
                  'TELP'       => $telp,
                  'EMAIL'     => $email,
                  'ALAMAT'    => $alamat,
                  'JENIS_CS'   => $jenis,
               );
            }
         }
         $this->db->insert_batch('customer', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Customer berhasil diimport.</div>');
         redirect('customer');
      }
   }
   public function supplier()
   {
      if (isset($_FILES["importsupp"]["name"])) {
         $path = $_FILES["importsupp"]["tmp_name"];
         $object = IOFactory::load($path);

         foreach ($object->getWorksheetIterator() as $worksheet) {

            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
               $kode = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
               $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
               $alamat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
               $telp = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
               $fax = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
               $email = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
               $bank = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
               $rekening = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
               $atasNama = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
               $data[] = array(
                  'KODE_SUPPLIER'    => $kode,
                  'NAMA_SUPPLIER'    => $nama,
                  'ALAMAT_SUPPLIER'   => $alamat,
                  'TELP_SUPPLIER'    => $telp,
                  'FAX_SUPPLIER'     => $fax,
                  'EMAIL_SUPPLIER'   => $email,
                  'BANK'               => $bank,
                  'REKENING'         => $rekening,
                  'ATAS_NAMA'         => $atasNama,
               );
            }
         }
         $this->db->insert_batch('supplier', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Supplier berhasil diimport.</div>');
         redirect('supplier');
      }
   }
   public function barang()
   {
      if (isset($_FILES["importbrg"]["name"])) {
         $path = $_FILES["importbrg"]["tmp_name"];
         $object = IOFactory::load($path);

         foreach ($object->getWorksheetIterator() as $worksheet) {

            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++) {
               $kode = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
               $barcode = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
               $nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
               $satuan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
               $stokMinimal = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
               $beli = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
               $jual = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
               $stok = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
               $sql = "select id_satuan from satuan where satuan = '$satuan'";
               $dataSatuan = implode($this->db->query($sql)->row_array());

               $data[] = array(
                  'KODE_BARANG'   => $kode,
                  'BARCODE'       => $barcode,
                  'NAMA_BARANG'   => $nama,
                  'ID_SATUAN'      => $dataSatuan,
                  'STOK_MINIMAL'  => $stokMinimal,
                  'HARGA_BELI'    => $beli,
                  'HARGA_JUAL'      => $jual,
                  'STOK'            => $stok,
                  'IS_ACTIVE'     => 1
               );
            }
         }
         $this->db->insert_batch('barang', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Barang berhasil diimport.</div>');
         redirect('barang');
      }
   }
}
