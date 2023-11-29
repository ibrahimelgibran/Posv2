<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Piutang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_login();
    //cek_user();
    $this->load->model('Piutang_m');
  }
  public function index()
  {
    $data = array(
      'title'    => 'Data Piutang',
      'user'     => infoLogin(),
      'toko'     => $this->db->get('profil_perusahaan')->row(),
      'content'  => 'piutang/index',
      'piutang'  => $this->Piutang_m->getAllData()
    );
    $this->load->view('templates/main', $data);
  }

  public function payment($id)
  {
    $id = decrypt_url($id);
    $data = array(
      'title'    => 'Pembayaran Piutang',
      'user'     => infoLogin(),
      'toko'     => $this->db->get('profil_perusahaan')->row(),
      'content'  => 'piutang/payment',
      'val'      => $this->db->query('select id_piutang, sisa from piutang where id_piutang = ' . $id)->row_array(),
      'detail'   => $this->Piutang_m->getDetail($id)
    );
    $this->load->view('templates/main', $data);
  }

  public function bayar()
  {
    $id = $this->input->post('id_piutang');
    $this->Piutang_m->Bayar($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Pembayaran berhasil.</div>');
    redirect('piutang/payment/' . encrypt_url($id));
  }

  public function detail_payment($id = '')
  {
    $data = $this->Piutang_m->getDetail($id);
    echo json_encode($data);
  }

  public function hapus_pembayaran($id = '')
  {
    $this->Piutang_m->delete_payment($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Pembayaran berhasil dihapus.</div>');
  }
}
