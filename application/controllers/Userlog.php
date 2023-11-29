<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlog extends CI_Controller
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
      'title'    => 'User Log',
      'user'     => infoLogin(),
      'toko'     => $this->db->get('profil_perusahaan')->row(),
      'content'  => 'userlog/index'
    );
    $this->load->view('templates/main', $data);
  }
  public function LoadData()
  {
    $sql = "select a.username, a.nama_lengkap, a.tipe, b.waktu from user a, user_log b where a.id_user  = b.id_user 
    order by id_log desc";
    $data = $this->model->General($sql)->result_array();
    $json = array(
      "aaData"  => $data
    );
    echo json_encode($json);
  }
}
