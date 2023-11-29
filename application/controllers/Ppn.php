<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppn extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        //cek_user();
        $this->load->model('Ppn_m');
    }
    public function index()
    {
        $data = array(
            'title'    => 'Data PPN',
            'user'     => infoLogin(),
            'toko'     => $this->db->get('profil_perusahaan')->row(),
            'content'  => 'ppn/index',
            'ppn'      => $this->Ppn_m->getAllData(),
            'total'  => $this->Ppn_m->getNominal(),
        );
        $this->load->view('templates/main', $data);
    }

    public function input()
    {
        $this->Ppn_m->Save();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data PPN berasil disetorkan.</div>');
        redirect('ppn');
    }

    public function detail($id = '')
    {
        $data = $this->Ppn_m->Detail($id);
        echo json_encode($data);
    }

    public function edit()
    {
        $this->Ppn_m->Edit();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data PPN berasil diubah.</div>');
        redirect('ppn');
    }

    public function delete($id = '')
    {
        $this->Ppn_m->Delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Success!</b> Data PPN berasil dihapus.</div>');
    }
}
