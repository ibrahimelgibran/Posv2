<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('Kas_m');
	}
	public function index()
	{
		$data = array(
			'title'    => 'Kas',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'kas/index',
			'total'	=> $this->Kas_m->totalKas()
		);
		$this->load->view('templates/main', $data);
	}

	public function LoadData()
	{
		$json = array(
			"aaData"  => $this->Kas_m->getAllData()
		);
		echo json_encode($json);
	}

	public function input()
	{
		$this->Kas_m->Save();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Kas berhasil disimpan.</div>');
		redirect('kas');
	}

	public function hapus($id = '')
	{
		$this->Kas_m->Delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data Kas berhasil dihapus.</div>');
	}

	public function detilkas($id = '')
	{
		$data = $this->Kas_m->Detail($id);
		echo json_encode($data);
	}

	//  public function totalKas(){
	// 	$total = $this->Kas_m->totalKas();
	// 	echo json_encode($total);
	//  }

	public function edit()
	{
		$this->Kas_m->Edit();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data Kas berhasil diubah.</div>');
		redirect('kas');
	}
}
