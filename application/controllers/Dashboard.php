<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_login();
    cek_user();
    $this->load->model('Barang_m');
  }
  public function index()
  {
    $date = date('Y-m-d');
    $sql = "SELECT a.username, a.nama_lengkap, a.tipe, b.waktu FROM user a, user_log b WHERE a.id_user  = b.id_user ORDER BY id_log DESC LIMIT 5";

    $kategori = "SELECT b.kategori, COUNT(a.id_kategori) AS jml_kategori
      FROM barang a, kategori b WHERE a.id_kategori = b.id_kategori GROUP BY a.id_kategori";

    $sqlmasuk = "SELECT SUM(nominal) AS nominal FROM kas WHERE jenis = 'Pemasukan' AND SUBSTRING(tanggal, 1, 10) = '$date'";

    $sqlkeluar = "SELECT SUM(nominal) AS nominal FROM kas WHERE jenis = 'Pengeluaran' AND SUBSTRING(tanggal, 1, 10) = '$date'";

    $pemasukan = implode($this->model->General($sqlmasuk)->row_array());
    $pengeluaran = implode($this->model->General($sqlkeluar)->row_array());

    $pendapatan = "SELECT SUBSTRING(b.tgl, 1, 10) AS tgl, SUM(c.subtotal) AS total FROM bulan a, penjualan b, detil_penjualan c WHERE a.id_bulan = b.id_bulan AND  a.bulan = DATE_FORMAT(CURDATE(), '%M') AND b.is_active = 1 AND c.id_jual = b.id_jual GROUP BY SUBSTRING(b.tgl, 1, 10)";
    $tahun = "SELECT tahun FROM penjualan GROUP BY tahun";

    $sql_jual_today = "SELECT COUNT(id_jual) AS total FROM penjualan WHERE is_active = 1 AND SUBSTRING(tgl ,1, 10) = '$date'";

    if ($pengeluaran == "") {
      $pengeluaran = 0;
    }
    if ($pemasukan == "") {
      $pemasukan = 0;
    }
    $kas = "SELECT jenis, SUM(nominal) AS jumlah FROM kas GROUP BY jenis";


    $data = array(
      'title'      => 'Dashboard',
      'user'       => infoLogin(),
      'toko'       => $this->db->get('profil_perusahaan')->row(),
      'userlog'    => $this->model->General($sql)->result_array(),
      'supplier'   => $this->db->get('supplier')->num_rows(),
      'customer'   => $this->db->get('customer')->num_rows(),
      'barang'     => $this->db->get('barang')->num_rows(),
      'jual'       => $this->db->query($sql_jual_today)->row_array(),
      'kategori'   => $this->model->General($kategori)->result(),
      'pemasukan'  => $pemasukan,
      'pengeluaran' => $pengeluaran,
      'kas'        => $this->model->General($kas)->result(),
      'pendapatan' =>  $this->model->General($pendapatan)->result(),
      'tahun'      => $this->model->General($tahun)->result_array(),
      'content'    => 'dashboard/index',
      'stok'       => $this->Barang_m->getStokHabis()
    );
    $this->load->view('templates/main', $data);
  }
}
