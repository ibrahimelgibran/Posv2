<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
	}
	public function index()
	{
		$data = array(
			'title'    => 'Mutasi Barang',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'mutasi/index'
		);
		$this->load->view('templates/main', $data);
	}
	public function entry()
	{
		$data = array(
			'title'    => 'Mutasi Barang',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'mutasi/inputmutasi'
		);
		$this->load->view('templates/main', $data);
	}
}
