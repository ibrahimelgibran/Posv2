<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('Supplier_m');
	}

	public function index()
	{
		$data = array(
			'title'    => 'Supplier',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'supplier/index'

		);
		$this->load->view('templates/main', $data);
	}

	public function LoadData()
	{
		$json = array(
			"aaData"  => $this->Supplier_m->getAllData()
		);
		echo json_encode($json);
	}

	public function inputsupplier()
	{
		$this->Supplier_m->Save();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data Supplier berhasil disimpan.</div>');
		redirect('supplier');
	}

	public function detilsupplier($id = '')
	{
		$data = $this->Supplier_m->Detail($id);
		echo json_encode($data);
	}

	public function editsupplier()
	{
		$this->Supplier_m->Edit();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data Supplier berhasil diubah.
		</div>');
		redirect('supplier');
	}

	public function hapussupplier($id = '')
	{
		$this->Supplier_m->Delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data Supplier berhasil dihapus.</div>');
	}

	public function cek_delete($id = '')
	{
		$data = $this->Supplier_m->cekDelete($id);
		echo json_encode($data);
	}
}
