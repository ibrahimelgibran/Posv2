<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_m extends CI_Model
{

    protected $table = 'penjualan';
    protected $primary = 'id_jual';

    public function getAllData()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getDetilJual()
    {
        $sql = "SELECT a.id_detil_jual, b.barcode, b.nama_barang, a.harga_item as harga_jual, a.qty_jual, a.diskon, a.subtotal FROM detil_penjualan a, barang b WHERE b.id_barang = a.id_barang AND a.id_jual IS NULL";
        return $this->db->query($sql)->result_array();
    }

    function cekHargaMinimum($id, $harga){
        $this->db->select('harga_jual');
        $this->db->where('id_barang',$id);
        $this->db->from('barang');
        $barang = $this->db->get()->row();
        $harga_jual =  $barang->harga_jual;

        $harga_min = $harga_jual - ($harga_jual * 0.05);

        return $harga < $harga_min;
    }

    public function addItem($id, $qty, $subtotal, $harga)
    {
        $cekHarga = $this->cekHargaMinimum($id, $harga);
        
        if ($cekHarga) {    
            $result = array(
                'status'     => 'failed',
                'message'     => 'Harga terlalu rendah',
            );
            echo json_encode($result);
        } else {
            $this->db->select("RIGHT (detil_penjualan.kode_detil_jual, 7) as kode_detil_jual", false);
            $this->db->order_by("kode_detil_jual", "DESC");
            $this->db->limit(1);
            $query = $this->db->get('detil_penjualan');

            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_detil_jual) + 1;
            } else {
                $kode = 1;
            }
            $kodedetil = str_pad($kode, 7, "0", STR_PAD_LEFT);
            $detiljual = "DJ-" . $kodedetil;
            $data = array(
                'ID_BARANG'           => $id,
                'KODE_DETIL_JUAL'     => $detiljual,
                'DISKON'              => 0,
                'HARGA_ITEM'          => $harga,
                'QTY_JUAL'            => $qty,
                'SUBTOTAL'            => $subtotal,

            );
            // var_dump($data);exit;
            $this->db->insert('detil_penjualan', $data);
            $sqlstok = "select stok from barang where id_barang = '$id'";
            $stok = implode($this->db->query($sqlstok)->row_array());
            $hasil = $stok - $qty;
            $update = "update barang set stok = '$hasil' where id_barang = '$id'";
            $this->db->query($update);
            $sql = "SELECT sum(subtotal) as subtotal FROM detil_penjualan WHERE id_jual IS NULL";
            $data = $this->db->query($sql)->row_array();
            
            $result = array(
                'data'     => $data,
                'status'     => 'success',
                'message'     => 'Item berhasil ditambahkan',
            );
            echo json_encode($result);
        }
        
    }

    public function editDetailPenjualan($id, $harga, $diskon, $qty, $hakhir)
    {

        $data = array(
            'HARGA_ITEM'   => $harga,
            'DISKON'       => $diskon,
            'QTY_JUAL'     => $qty,
            'SUBTOTAL'     => $hakhir,
        );
        return $this->db->set($data)->where('ID_DETIL_JUAL', $id)->update('detil_penjualan');
    }

    public function hapusDetail($id)
    {
        $getDetil = $this->db->get_where('detil_penjualan', ['ID_DETIL_JUAL' => $id])->row_array();
        $qty = $getDetil['QTY_JUAL'];
        $idBrg = $getDetil['ID_BARANG'];
        $getBrg = $this->db->get_where('barang', ['ID_BARANG' => $idBrg])->row_array();
        $stokBrg = $getBrg['STOK'];
        $stok = $qty + $stokBrg;
        $updateStok = $this->db->set(array('STOK' => $stok))->where('ID_BARANG', $idBrg)->update('barang');

        $sql = "delete from detil_penjualan where id_detil_jual = '$id'";
        $this->db->query($sql);

        $subtotal = "SELECT sum(subtotal) as subtotal FROM detil_penjualan WHERE id_jual IS NULL";
        $data = $this->db->query($subtotal)->row_array();
        echo json_encode($data);
    }

    public function simpanPenjualan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $kodeinvoice = "POS" . date('YmdHis');

        $this->db->select("RIGHT (penjualan.kode_jual, 7) as kode_jual", false);
        $this->db->order_by("kode_jual", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('penjualan');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_jual) + 1;
        } else {
            $kode = 1;
        }
        $kodejual = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $kodepenjualan = "KJ-" . $kodejual;
        $bulan = date('F');
        $month = "select id_bulan from bulan where bulan = '$bulan'";
        $idBulan = implode($this->model->General($month)->row_array());
        $kembalian = $this->input->post('kembali');
        $bayar = $this->input->post('bayar');

        if ($kembalian < 0) {
            $kembalian = 0;
        }

        $data = array(
            'ID_USER'     => $this->input->post('kasir'),
            'ID_KARYAWAN' => $this->input->post('kary'),
            'ID_CS'       => $this->input->post('cus'),
            'KODE_JUAL'   => $kodepenjualan,
            'INVOICE'     => $kodeinvoice,
            'BAYAR'          => $bayar,
            'KEMBALI'     => $kembalian,
            'PPN'         => $this->input->post('nominal_ppn'),
            'TGL'         => date('Y-m-d H:i:s'),
            'ID_BULAN'    => $idBulan,
            'TAHUN'       => date('Y'),
            'IS_ACTIVE'   => 1,

        );
        $this->db->insert('penjualan', $data);

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
            'ID_USER'     => $this->input->post('kasir'),
            'KODE_KAS'    => $kodekas,
            'TANGGAL'    => date('Y-m-d H:i:s'),
            'JENIS'        => 'Pemasukan',
            'KETERANGAN' => 'Penjualan',
            'NOMINAL'    => $nominal,
        );

        $this->db->insert('kas', $kas);

        $this->db->select("RIGHT (pajak_ppn.kode_pajak, 7) as kode_pajak", false);
        $this->db->order_by("kode_pajak", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('pajak_ppn');
        $pajak_ppn = $this->input->post('nominal_ppn');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_pajak) + 1;
        } else {
            $kode = 1;
        }
        $kodeppn = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $kode_pajak = "PPN-" . $kodeppn;
        $ppn = array(
            'KODE_PAJAK' => $kode_pajak,
            'JENIS'        => 'PPN Keluaran',
            'NOMINAL'    => $pajak_ppn,
            'TANGGAL'    => date('Y-m-d H:i:s'),
            'KETERANGAN' => 'Penjualan',
            'ID_USER'     => $this->input->post('kasir'),
        );

        $this->db->insert('pajak_ppn', $ppn);

        $idjual = "select max(id_jual) as id_jual from penjualan";
        $id = implode($this->model->General($idjual)->row_array());
        $sql = "update detil_penjualan set id_jual = '$id' where id_jual is null";
        $this->db->query($sql);
        $kembali = $this->input->post('kembali');

        if ($kembali < 0) {
            $jml_piutang = abs($kembali);
            $piutang = array(
                'ID_JUAL'          => $id,
                'TGL_PIUTANG'    => date('Y-m-d H:i:s'),
                'JML_PIUTANG'    => $jml_piutang,
                'BAYAR'            => 0,
                'SISA'             => $jml_piutang,
                'STATUS'         => 'Belum Lunas',
            );
            $this->db->insert('piutang', $piutang);
        }
    }
}
