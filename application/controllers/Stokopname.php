<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stokopname extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
		$this->load->model('Stokopname_m');
	}

	public function index()
	{
		$data = array(
			'title'    => 'Data Stok Opname',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'stokopname/index',
			'opname'	=>  $this->Stokopname_m->getAllData()
		);
		$this->load->view('templates/main', $data);
	}

	//   public function LoadData(){
	// 	 $data = array(
	// 		 "aaData"	=> $this->Stokopname_m->getAllData()
	// 	 );
	// 	 echo json_encode($data);
	//   }

	public function entry()
	{
		$data = array(
			'title'    => 'Entry Stok Opname',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'stokopname/inputopname'
		);
		$this->load->view('templates/main', $data);
	}

	public function create()
	{
		$this->Stokopname_m->Save();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data Stok Opname berhasil disimpan.</div>');
		redirect('stokopname');
	}

	public function delete($id = '')
	{
		$this->Stokopname_m->Delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data Stok Opname berhasil dihapus.</div>');
	}

	public function edit($id)
	{
		$id = decrypt_url($id);
		$data = array(
			'title'    => 'Edit Stok Opname',
			'user'     => infoLogin(),
			'opname'   => $this->Stokopname_m->Detail($id),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'stokopname/edit'
		);
		$this->load->view('templates/main', $data);
	}

	public function update()
	{
		$this->Stokopname_m->Edit();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data Stok Opname berhasil diubah.</div>');
		redirect('stokopname');
	}
}
