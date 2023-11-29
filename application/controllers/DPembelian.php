<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DPembelian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_login();
  }
  public function index()
  {
    $data = array(
      'title'    => 'Daftar Pembelian',
      'user'     => infoLogin(),
      'toko'     => $this->db->get('profil_perusahaan')->row(),
      'content'  => 'daftarpembelian/index'
    );
    $this->load->view('templates/main', $data);
  }
  public function LoadData()
  {
    $sql = "SELECT b.id_beli, b.kode_beli, b.faktur_beli, b.tgl_faktur, c.nama_supplier, SUM(a.qty_beli)   
          AS qty_beli, b.total, b.diskon FROM detil_pembelian a, pembelian b, supplier c
          WHERE b.id_beli = a.id_beli AND c.id_supplier = b.id_supplier AND b.is_active = 1 GROUP BY a.id_beli";

    $json = array(
      "aaData"  => $this->model->General($sql)->result_array()
    );
    echo json_encode($json);
  }
  public function detilPembelian($id = '')
  {
    $sql = "SELECT a.kode_detil_beli, c.barcode, c.nama_barang, c.harga_beli, c.harga_jual, a.qty_beli, 
          a.subtotal FROM detil_pembelian a, pembelian b, barang c
          WHERE b.id_beli = a.id_beli AND c.id_barang = a.id_barang AND a.id_beli = '$id'";

    $data = $this->model->General($sql)->result_array();
    echo json_encode($data);
  }
}
