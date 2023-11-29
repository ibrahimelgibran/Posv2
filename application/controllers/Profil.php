<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
			'title'    => 'Profil Toko',
			'user'     => infoLogin(),
			'toko'     => $this->db->get('profil_perusahaan')->row(),
			'content'  => 'setting/profil/index'
		);
		$this->form_validation->set_rules('namatoko', 'Nama Perusahaan', 'required');
		$this->form_validation->set_rules('alamattoko', 'Alamat Perusahaan', 'required');
		$this->form_validation->set_rules('telp', 'Telp Perusahaan', 'required');
		$this->form_validation->set_rules('fax', 'Fax Perusahaan', 'required');
		$this->form_validation->set_rules('email', 'Email Perusahaan', 'required');
		$this->form_validation->set_rules('website', 'Website Perusahaan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/main', $data);
		} else {
			$profil = array(
				'NAMA_PERUSAHAAN'     => htmlspecialchars($this->input->post('namatoko'), true),
				'ALAMAT_PERUSAHAAN'   => htmlspecialchars($this->input->post('alamattoko'), true),
				'TELP_PERUSAHAAN'     => htmlspecialchars($this->input->post('telp'), true),
				'FAX_PERUSAHAAN'      => htmlspecialchars($this->input->post('fax'), true),
				'EMAIL_PERUSAHAAN'    => htmlspecialchars($this->input->post('email'), true),
				'WEBSITE_PERUSAHAAN'  => htmlspecialchars($this->input->post('website'), true),
			);
			$id = $this->input->post('idtoko');

			$upload_image = $_FILES['logo']['name'];

			if ($upload_image) {
				$old_image = $data['profil']['LOGO'];
				if ($old_image != 'user.png') {
					unlink(FCPATH . 'assets/img/profil/' . $old_image);
				}

				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/img/profil/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('logo')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('LOGO', $new_image);
				} else {

					echo $this->upload->display_errors();
				}
			}

			$this->db->set($profil);
			$this->db->where('ID_PERUSAHAAN', $id);
			$this->db->update('profil_perusahaan');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data Toko berhasil diubah.</div>');
			redirect('profil');
		}
	}
}
