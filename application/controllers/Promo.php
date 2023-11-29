<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
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
      'title'    => 'Setting Promo',
      'user'     => infoLogin(),
      'toko'     => $this->db->get('profil_perusahaan')->row(),
      'content'  => 'setting/promo/index'

    );
    $this->load->view('templates/main', $data);
  }
}
