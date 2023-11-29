<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
		$this->load->model('Karyawan_m');
	}
	public function index()
	{
		$data = array(
			'title'    => 'Karyawan',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'karyawan/index'

		);
		$this->load->view('templates/main', $data);
	}
	public function LoadData()
	{
		$json = array(
			"aaData"  => $this->Karyawan_m->getAllData()
		);
		echo json_encode($json);
	}

	public function inputkaryawan()
	{
		$this->Karyawan_m->Save();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Karyawan berhasil disimpan.</div>');
		redirect('karyawan');
	}

	public function detilkaryawan($id = '')
	{
		$data = $this->Karyawan_m->Detail($id);
		echo json_encode($data);
	}

	public function editkaryawan()
	{
		$this->Karyawan_m->Edit();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Karyawan berhasil diubah.</div>');
		redirect('karyawan');
	}

	public function hapuskaryawan($id = '')
	{
		$this->Karyawan_m->Delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Karyawan berhasil dihapus.</div>');
	}
}
