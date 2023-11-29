<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_m extends CI_Model
{

    protected $table = 'pembelian';
    protected $primary = 'id_beli';

    public function getAllData()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getDetilBeli()
    {
        $sql = "SELECT a.id_detil_beli, b.barcode, b.nama_barang, b.harga_beli, b.harga_jual, a.qty_beli, a.subtotal FROM detil_pembelian a, barang b WHERE b.id_barang = a.id_barang AND a.id_beli IS NULL";
        return $this->db->query($sql)->result_array();
    }

    public function addItem($id, $qty, $subtotal, $jual, $beli)
    {
        $this->db->select("RIGHT (detil_pembelian.kode_detil_beli, 7) as kode_detil_beli", false);
        $this->db->order_by("kode_detil_beli", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('detil_pembelian');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_detil_beli) + 1;
        } else {
            $kode = 1;
        }
        $kodebeli = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $detilbeli = "DB-" . $kodebeli;
        $data = array(
            'ID_BARANG'           => $id,
            'KODE_DETIL_BELI'     => $detilbeli,
            'HRG_BELI'            => $beli,
            'HRG_JUAL'            => $jual,
            'QTY_BELI'            => $qty,
            'SUBTOTAL'            => $subtotal,

        );
        $this->db->insert('detil_pembelian', $data);
        $sqlstok = "select stok from barang where id_barang = '$id'";
        $stok = implode($this->db->query($sqlstok)->row_array());
        $hasil = $stok + $qty;
        $barang = array(
            'HARGA_BELI'  => $beli,
            'HARGA_JUAL'  => $jual,
            'STOK'        => $hasil
        );

        $this->db->set($barang)->where('ID_BARANG', $id)->update('barang');
        $sql = "SELECT sum(subtotal) as subtotal FROM detil_pembelian WHERE id_beli IS NULL";
        $data = $this->db->query($sql)->row_array();
        echo json_encode($data);
    }

    public function hapusDetail($id)
    {
        $getDetil = $this->db->get_where('detil_pembelian', ['ID_DETIL_BELI' => $id])->row_array();
        $qty = $getDetil['QTY_BELI'];
        $idBrg = $getDetil['ID_BARANG'];
        $getBrg = $this->db->get_where('barang', ['ID_BARANG' => $idBrg])->row_array();
        $stokBrg = $getBrg['STOK'];
        $stok = $stokBrg - $qty;
        $updateStok = $this->db->set(array('STOK' => $stok))->where('ID_BARANG', $idBrg)->update('barang');

        $sql = "delete from detil_pembelian where id_detil_beli = '$id'";
        $this->db->query($sql);

        $totalbeli = "SELECT sum(subtotal) as subtotalbeli FROM detil_pembelian WHERE id_beli IS NULL";
        $data = $this->db->query($totalbeli)->row_array();
        echo json_encode($data);
    }

    public function simpanPembelian()
    {
        $this->db->select("RIGHT (pembelian.kode_beli, 7) as kode_beli", false);
        $this->db->order_by("kode_beli", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('pembelian');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_beli) + 1;
        } else {
            $kode = 1;
        }
        $kodebeli = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $beli = "PB-" . $kodebeli;
        $kembalian = $this->input->post('kembali');
        $bayar = $this->input->post('bayar');

        if ($kembalian < 0) {
            $kembalian = 0;
        }

        $data = array(
            'ID_SUPPLIER'    => htmlspecialchars($this->input->post('sup'), true),
            'ID_USER'        => htmlspecialchars($this->input->post('kasir'), true),
            'KODE_BELI'        => $beli,
            'TGL_FAKTUR'    => htmlspecialchars($this->input->post('tgl_faktur'), true),
            'FAKTUR_BELI'    => htmlspecialchars($this->input->post('no_faktur'), true),
            'DISKON'        => htmlspecialchars($this->input->post('diskon1'), true),
            'TOTAL'            => htmlspecialchars($this->input->post('grandtotal'), true),
            'BAYAR'            => htmlspecialchars($bayar, true),
            'KEMBALI'        => htmlspecialchars($kembalian, true),
            'TGL'            => date('Y-m-d H:i:s'),
            'IS_ACTIVE'        => 1,
        );
        $this->db->insert('pembelian', $data);

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
        $nominal = $bayar - $kembalian;
        $kas = array(
            'ID_USER'     => htmlspecialchars($this->input->post('kasir'), true),
            'KODE_KAS'    => $kodekas,
            'TANGGAL'    => date('Y-m-d H:i:s'),
            'JENIS'        => 'Pengeluaran',
            'KETERANGAN' => 'Pembelian',
            'NOMINAL'    => $nominal,
        );
        $this->db->insert('kas', $kas);

        $idbeli = "select max(id_beli) as id_beli from pembelian";
        $id = implode($this->db->query($idbeli)->row_array());
        $sql = "update detil_pembelian set id_beli = '$id' where id_beli is null";
        $this->db->query($sql);
        $kembali = $this->input->post('kembali');

        if ($kembali < 0) {
            $jml_hutang = abs($kembali);
            $hutang = array(
                'ID_BELI'          => $id,
                'TGL_HUTANG'    => date('Y-m-d H:i:s'),
                'JML_HUTANG'    => $jml_hutang,
                'BAYAR'            => 0,
                'SISA'             => $jml_hutang,
                'STATUS'         => 'Belum Lunas',
            );
            $this->db->insert('hutang', $hutang);
        }
    }

    public function editDetail($id, $qty, $hakhir)
    {
        $data = array(
            'QTY_BELI'     => $qty,
            'SUBTOTAL'     => $hakhir,
        );
        return $this->db->set($data)->where('ID_DETIL_BELI', $id)->update('detil_pembelian');
    }
}
