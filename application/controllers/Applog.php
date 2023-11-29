<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applog extends CI_Controller
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
      'title'    => 'Application Log',
      'user'     => infoLogin(),
      'toko'     => $this->db->get('profil_perusahaan')->row(),
      'content'  => 'applog/index'
    );
    $this->load->view('templates/main', $data);
  }
}
