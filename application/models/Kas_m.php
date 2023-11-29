<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas_m extends CI_Model
{

    protected $table = 'kas';
    protected $primary = 'id_kas';

    public function getAllData()
    {
        $sql = "SELECT a.*, b.NAMA_LENGKAP FROM kas a, user b WHERE a.id_user = b.id_user";
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
            'KODE_KAS'    => $kodekas,
            'TANGGAL'     => date('Y-m-d H:i:s'),
            'JENIS'       => htmlspecialchars($jenis, true),
            'KETERANGAN'  => htmlspecialchars($this->input->post('keterangan'), true),
            'NOMINAL'     => htmlspecialchars($this->input->post('nominal'), true),
        );
        $this->db->insert($this->table, $data);
        if ($jenis == 'Mutasi Ke Bank') {
            $bank = array(
                'ID_USER'     => $user['ID_USER'],
                'TANGGAL'     => date('Y-m-d H:i:s'),
                'JENIS'       => 'Pemasukan',
                'KETERANGAN'  => 'Mutasi Dari Kas',
                'NOMINAL'     => htmlspecialchars($this->input->post('nominal'), true),
            );
            $this->db->insert('bank', $bank);
        }
    }

    public function Delete($id)
    {
        $detail = $this->db->get_where($this->table, [$this->primary => $id])->row_array();
        if ($detail['JENIS'] == 'Mutasi Ke Bank') {
            $bank = array(
                'ID_USER'     => $detail['ID_USER'],
                'TANGGAL'     => date('Y-m-d H:i:s'),
                'JENIS'       => 'Pengeluaran',
                'KETERANGAN'  => 'Mutasi Dari Kas Telah Dihapus',
                'NOMINAL'     => $detail['NOMINAL'],
            );
            $this->db->insert('bank', $bank);
        }
        $this->db->where($this->primary, $id)->delete($this->table);
    }

    public function Detail($id)
    {
        $sql = "SELECT a.*, b.NAMA_LENGKAP FROM kas a, user b WHERE a.id_user = b.id_user AND a.id_kas = '$id'";
        return $this->db->query($sql)->row_array();
    }

    public function totalKas()
    {
        $sqlmasuk = "SELECT SUM(nominal) AS nominal FROM kas WHERE jenis = 'Pemasukan'";
        $sqlkeluar = "SELECT SUM(nominal) AS nominal FROM kas WHERE jenis = 'Pengeluaran'";
        $sql_mutasi = "SELECT SUM(nominal) AS nominal FROM kas WHERE jenis = 'Mutasi Ke Bank'";
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
