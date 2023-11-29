<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank_m extends CI_Model
{

    protected $table = 'bank';
    protected $primary = 'id_bank';

    public function getAllData()
    {
        $sql = "SELECT a.*, b.NAMA_LENGKAP FROM bank a, user b WHERE a.id_user = b.id_user";
        return $this->db->query($sql)->result_array();
    }

    public function Save()
    {
        $jenis = $this->input->post('jenis');
        $user = $this->db->get_where('user', ['USERNAME' => $this->session->userdata('username')])->row_array();
        $this->db->select("RIGHT (kas.kode_kas, 7) as kode_kas", false);
        $this->db->order_by("kode_kas", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('kas');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_kas) + 1;
        } else {
            $kode = 1;
        }
        $kodeks = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $kodekas = "KS-" . $kodeks;
        $data = array(
            'ID_USER'     => $user['ID_USER'],
            'TANGGAL'     => date('Y-m-d H:i:s'),
            'JENIS'       => htmlspecialchars($jenis, true),
            'KETERANGAN'  => htmlspecialchars($this->input->post('keterangan'), true),
            'NOMINAL'     => htmlspecialchars($this->input->post('nominal'), true),
        );
        $this->db->insert($this->table, $data);
        if ($jenis == 'Mutasi Ke Kas') {
            $kas = array(
                'ID_USER'     => $user['ID_USER'],
                'KODE_KAS'    => $kodekas,
                'TANGGAL'     => date('Y-m-d H:i:s'),
                'JENIS'       => 'Pemasukan',
                'KETERANGAN'  => 'Mutasi Dari Bank',
                'NOMINAL'     => htmlspecialchars($this->input->post('nominal'), true),
            );
            $this->db->insert('kas', $kas);
        }
    }


    public function Delete($id)
    {
        $this->db->select("RIGHT (kas.kode_kas, 7) as kode_kas", false);
        $this->db->order_by("kode_kas", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('kas');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_kas) + 1;
        } else {
            $kode = 1;
        }
        $kodeks = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $kodekas = "KS-" . $kodeks;
        $detail = $this->db->get_where($this->table, [$this->primary => $id])->row_array();
        if ($detail['JENIS'] == 'Mutasi Ke Kas') {
            $kas = array(
                'ID_USER'     => $detail['ID_USER'],
                'KODE_KAS'    => $kodekas,
                'TANGGAL'     => date('Y-m-d H:i:s'),
                'JENIS'       => 'Pengeluaran',
                'KETERANGAN'  => 'Mutasi Dari Bank Telah Dihapus',
                'NOMINAL'     => $detail['NOMINAL'],
            );
            $this->db->insert('kas', $kas);
        }
        $this->db->where($this->primary, $id)->delete($this->table);
    }

    public function Detail($id)
    {
        $sql = "SELECT a.*, b.NAMA_LENGKAP FROM bank a, user b WHERE a.id_user = b.id_user AND a.id_bank = '$id'";
        return $this->db->query($sql)->row_array();
    }

    public function totalBank()
    {
        $sqlmasuk = "SELECT SUM(nominal) AS nominal FROM bank WHERE jenis = 'Pemasukan'";
        $sqlkeluar = "SELECT SUM(nominal) AS nominal FROM bank WHERE jenis = 'Pengeluaran'";
        $sql_mutasi = "SELECT SUM(nominal) AS nominal FROM bank WHERE jenis = 'Mutasi Ke Kas'";
        $pemasukan = implode($this->model->General($sqlmasuk)->row_array());
        $pengeluaran = implode($this->model->General($sqlkeluar)->row_array());
        $mutasi = implode($this->model->General($sql_mutasi)->row_array());
        if ($pengeluaran == "") {
            $pengeluaran = 0;
        }
        if ($pemasukan == "") {
            $pemasukan = 0;
        }
        if ($mutasi == "") {
            $mutasi = 0;
        }
        $total = $pemasukan - $pengeluaran - $mutasi;
        return $total;
    }
}
