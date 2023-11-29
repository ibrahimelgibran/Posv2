<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
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
      'title'    => 'Backup Data',
      'user'     => infoLogin(),
      'toko'     => $this->db->get('profil_perusahaan')->row(),
      'content'  => 'backup/index'
    );
    $this->load->view('templates/main', $data);
  }
  public function backup()
  {
    $this->load->dbutil();
    $prefs = array(
      'format'    => 'zip',
      'filename'  => 'dbpos.sql'
    );
    $backup = $this->dbutil->backup($prefs);
    $this->load->helper('file');
    $dbname = 'dbpos-backup-on-' . date('YmdHis') . '.zip';
    $path = '/backup' . $dbname;
    write_file($path, $backup);
    $this->load->helper('download');
    force_download($dbname, $backup);
  }
}
