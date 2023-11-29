<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Bank_m');
    }
    public function index()
    {
        $data = array(
            'title'    => 'Bank',
            'user'     => infoLogin(),
            'toko'     => $this->db->get('profil_perusahaan')->row(),
            'content'  => 'bank/index',
            'total'    => $this->Bank_m->totalBank(),
            'bank'    => $this->Bank_m->getAllData(),
        );
        $this->load->view('templates/main', $data);
    }


    public function input()
    {
        $this->Bank_m->Save();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data Bank berhasil disimpan.</div>');
        redirect('bank');
    }

    public function hapus($id = '')
    {
        $this->Bank_m->Delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><aria-hidden="true">×</span> </button><b>Success!</b> Data Bank berhasil dihapus.</div>');
    }
}
