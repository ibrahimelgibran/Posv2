<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hutang extends CI_Controller
{
  public function __construct()
  {

    parent::__construct();
    cek_login();
    //cek_user();
    $this->load->model('Hutang_m');
  }
  public function index()
  {
    $data = array(
      'title'    => 'Data Hutang',
      'user'     => infoLogin(),
      'toko'     => $this->db->get('profil_perusahaan')->row(),
      'content'  => 'hutang/index',
      'hutang'   => $this->Hutang_m->getAllData()
    );
    $this->load->view('templates/main', $data);
  }

  // public function add(){
  //   $data = array (
  //     'title'    => 'Tambah Hutang',
  //     'user'     => infoLogin(),
  //     'toko'     => $this->db->get('profil_perusahaan')->row(),
  //     'content'  => 'hutang/add',
  //     'pembelian'=> $this->db->get('pembelian')->result_array()
  //   ); 
  //   $this->load->view('templates/main', $data);
  // }

  public function detail_pembelian($id = '')
  {
    $data = $this->Hutang_m->getDetailBeli($id);
    echo json_encode($data);
  }

  public function save()
  {
    $this->Hutang_m->Save();
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Hutang berhasil disimpan.</div>');
    redirect('hutang/index');
  }

  public function payment($id)
  {
    $id = decrypt_url($id);
    $data = array(
      'title'    => 'Pembayaran Hutang',
      'user'     => infoLogin(),
      'toko'     => $this->db->get('profil_perusahaan')->row(),
      'content'  => 'hutang/payment',
      'val'      => $this->db->query('select id_hutang, sisa from hutang where id_hutang = ' . $id)->row_array(),
      'detail'   => $this->Hutang_m->getDetail($id)
    );
    $this->load->view('templates/main', $data);
  }

  public function bayar()
  {
    $id = $this->input->post('id_hutang');
    $this->Hutang_m->Bayar($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Pembayaran berhasil.</div>');
    redirect('hutang/payment/' . encrypt_url($id));
  }

  public function hapus_pembayaran($id = '')
  {
    $this->Hutang_m->delete_payment($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Pembayaran berhasil dihapus.</div>');
  }

  public function detail_payment($id = '')
  {
    $data = $this->Hutang_m->getDetail($id);
    echo json_encode($data);
  }
}
