<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
   public function __construct()
   {

      parent::__construct();
      cek_login();
      cek_user();
   }
   public function barang()
   {
      $sql = "select * from supplier";
      $data = array(
         'title'    => 'Laporan Data Barang',
         'user'     => infoLogin(),
         'supplier' => $this->model->General($sql)->result_array(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'barang/item/laporan'
      );
      $this->load->view('templates/main', $data);
   }

   public function pembelian()
   {
      $data = array(
         'title'    => 'Laporan Pembelian',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'pembelian/laporan'
      );
      $this->load->view('templates/main', $data);
   }

   public function penjualan()
   {
      $sql = "select * from karyawan";
      $data = array(
         'title'    => 'Laporan Penjualan',
         'user'     => infoLogin(),
         'karyawan' => $this->model->General($sql)->result_array(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'penjualan/laporan'
      );
      $this->load->view('templates/main', $data);
   }

   public function penjualan_perFak()
   {
      $data = array(
         'title'    => 'Laporan Penjualan Per-Faktur',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'penjualan/lap_perFak'
      );
      $this->load->view('templates/main', $data);
   }


   public function stokopname()
   {
      $data = array(
         'title'    => 'Laporan Stok Opname',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'stokopname/laporan'
      );
      $this->load->view('templates/main', $data);
   }

   public function laba_rugi()
   {
      $data = array(
         'title'    => 'Laporan Laba Rugi',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'penjualan/laba_rugi'
      );
      $this->load->view('templates/main', $data);
   }
   public function kas()
   {
      $data = array(
         'title'    => 'Laporan Kas',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'kas/laporan'
      );
      $this->load->view('templates/main', $data);
   }
   public function kas_bank()
   {
      $data = array(
         'title'    => 'Laporan Kas Bank',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'bank/laporan'
      );
      $this->load->view('templates/main', $data);
   }
   public function barang_operasional()
   {
      $data = array(
         'title'    => 'Laporan Barang Operasional',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'barang/barang_operasional/laporan'
      );
      $this->load->view('templates/main', $data);
   }
   public function barang_rusak()
   {
      $data = array(
         'title'    => 'Laporan Barang Rusak',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'barang/barang_rusak/laporan'
      );
      $this->load->view('templates/main', $data);
   }
   public function hutang()
   {
      $data = array(
         'title'    => 'Laporan Hutang',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'hutang/laporan',
         'supplier' => $this->db->get('supplier')->result_array()
      );
      $this->load->view('templates/main', $data);
   }
   public function piutang()
   {
      $data = array(
         'title'    => 'Laporan Piutang',
         'user'     => infoLogin(),
         'toko'     => $this->db->get('profil_perusahaan')->row(),
         'content'  => 'piutang/laporan',
         'customer' => $this->db->get('customer')->result_array()
      );
      $this->load->view('templates/main', $data);
   }
}
