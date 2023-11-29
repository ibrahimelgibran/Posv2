<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		//cek_user();
		$this->load->model('Pembelian_m');
	}
	public function index()
	{
		$data = array(
			'title'    => 'Pembelian',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'pembelian/index'

		);
		$this->load->view('templates/main', $data);
	}

	public function LoadData()
	{
		$json = array(
			"aaData"  => $this->Pembelian_m->getDetilBeli()
		);
		echo json_encode($json);
	}

	public function tambahbeli($id, $qty, $subtotal, $jual, $beli)
	{
		$this->Pembelian_m->addItem($id, $qty, $subtotal, $jual, $beli);
	}

	public function hapusdetil($id = '')
	{
		$this->Pembelian_m->hapusDetail($id);
	}

	public function simpanpembelian()
	{
		$this->Pembelian_m->simpanPembelian();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data pembelian berhasil disimpan.</div>');
		redirect('pembelian/index');
	}

	public function detilitembeli($id = '')
	{
		$sql = "SELECT a.id_detil_beli, b.barcode, b.id_barang, b.nama_barang, b.harga_beli, a.qty_beli, a.subtotal FROM 		detil_pembelian a, barang b WHERE b.id_barang = a.id_barang AND a.id_detil_beli = '$id'";

		$data = $this->model->General($sql)->row_array();
		echo json_encode($data);
	}
	public function hargatotal()
	{
		$sql = "SELECT SUM(subtotal) AS subtotal FROM detil_pembelian WHERE id_beli IS NULL";
		$data = $this->model->General($sql)->row_array();
		echo json_encode($data);
	}

	public function editdetilbeli($id, $qty, $hakhir)
	{
		$this->Pembelian_m->editDetail($id, $qty, $hakhir);
	}
}
