<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hutang_m extends CI_Model {

    protected $table = 'hutang';
    protected $primary = 'id_hutang';
    
    public function getAllData(){
        $sql = "SELECT a.id_hutang, b.kode_beli, c.nama_supplier, a.tgl_hutang, a.jml_hutang, a.bayar, a.sisa, a.status FROM hutang a, pembelian b, supplier c WHERE a.id_beli = b.id_beli AND c.id_supplier = b.id_supplier";
        return $this->db->query($sql)->result_array();
    }
    public function getDetailBeli($id){
        $sql = "SELECT a.id_beli, b.nama_supplier, a.faktur_beli, a.tgl, a.tgl_faktur, a.total FROM pembelian a, supplier b WHERE a.id_supplier = b.id_supplier AND a.id_beli = '$id'";
        return $this->db->query($sql)->row_array();
    }

    public function Save(){
        $data = array(
            'ID_BELI'      => htmlspecialchars($this->input->post('id_pembelian'), true),
            'TGL_HUTANG'   => htmlspecialchars($this->input->post('tgl_hutang'), true),
            'JML_HUTANG'   => htmlspecialchars($this->input->post('jml_hutang'), true),
            'BAYAR'        => 0,
            'SISA'         => htmlspecialchars($this->input->post('jml_hutang'), true),
            'STATUS'	   => 'Belum Lunas',

            );
       return $this->db->insert($this->table, $data);
    }

    public function getDetail($id){
        $sql = "SELECT b.id_detil_hutang, c.nama_lengkap, b.nominal, b.tgl_bayar FROM hutang a, detil_hutang b, user c WHERE a.id_hutang = b.id_hutang AND c.id_user = b.id_user AND a.id_hutang = '$id'";
        return $this->db->query($sql)->result_array();
    }

    public function Bayar($id){
        $user = infoLogin();
        $nominal = $this->input->post('nominal');
        $data = array(
          'TGL_BAYAR'   => date('Y-m-d H:i:s'),
          'NOMINAL'     => $nominal,
          'ID_USER'     => $user['ID_USER'],
          'ID_HUTANG'   => $id,
        );
        $this->db->insert('detil_hutang', $data);
        $get_bayar = "SELECT SUM(nominal) AS nominal FROM detil_hutang WHERE id_hutang = '$id'";
        $get_jml_hutang = "SELECT jml_hutang FROM hutang WHERE id_hutang = '$id'";
        $bayar = implode($this->db->query($get_bayar)->row_array());
        $jml = implode($this->db->query($get_jml_hutang)->row_array());
        $sisa = $jml - $bayar; 
        $update = array(
          'bayar' => $bayar,
          'sisa'  => $sisa
        );
        $this->db->set($update);
		$this->db->where($this->primary, $id);
        $this->db->update($this->table);
        
        if ($sisa == 0){
            $status = array(
                'status'  => 'Lunas'
              );
              $this->db->set($status);
              $this->db->where($this->primary, $id);
              $this->db->update($this->table);
        }

        $this->db->select("RIGHT (kas.kode_kas, 7) as kode_kas", false);
        $this->db->order_by("kode_kas", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('kas');
        
        if($query->num_rows() <> 0){
          $data = $query->row();
          $kode = intval($data->kode_kas) + 1;
          
        } else {
          $kode = 1;
        }
        $kodeks = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $kodekas = "KS-".$kodeks;
        $kas = array(
          'ID_USER'   => $user['ID_USER'],
          'KODE_KAS'  => $kodekas,
          'TANGGAL'	  => date('Y-m-d H:i:s'),
          'JENIS'	  => 'Pengeluaran',
          'KETERANGAN'=> 'Pembayaran Hutang', 
          'NOMINAL'	  => $nominal,
        );
      
        $this->db->insert('kas', $kas);
    }

    public function delete_payment($id){
        $user = infoLogin();
        $query_detil = "select nominal, id_hutang from detil_hutang where id_detil_hutang = '$id'";
        $detail = $this->db->query($query_detil)->row_array();
        $id_hutang = $detail['id_hutang'];
        $query_hutang = "select bayar, sisa from hutang where id_hutang = '$id_hutang'";
        $hutang = $this->db->query($query_hutang)->row_array();
  
        $bayar = $hutang['bayar'] - $detail['nominal']; 
        $sisa = $hutang['sisa'] + $detail['nominal']; 
  
        $update = array(
          'bayar' => $bayar,
          'sisa'  => $sisa
        );
        $this->db->set($update)->where($this->primary, $id_hutang)->update($this->table);
        $this->db->where('id_detil_hutang', $id)->delete('detil_hutang');

        $this->db->select("RIGHT (kas.kode_kas, 7) as kode_kas", false);
        $this->db->order_by("kode_kas", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('kas');
        
        if($query->num_rows() <> 0){
          $data = $query->row();
          $kode = intval($data->kode_kas) + 1;
          
        } else {
          $kode = 1;
        }
        $kodeks = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $kodekas = "KS-".$kodeks;
        $kas = array(
          'ID_USER'   => $user['ID_USER'],
          'KODE_KAS'  => $kodekas,
          'TANGGAL'	  => date('Y-m-d H:i:s'),
          'JENIS'	  => 'Pemasukan',
          'KETERANGAN'=> 'Pembayaran Hutang Telah Dihapus', 
          'NOMINAL'	  => $detail['nominal'],
        );
      
        $this->db->insert('kas', $kas);
    }

}
  