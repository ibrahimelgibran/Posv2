<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stokopname_m extends CI_Model {

    protected $table = 'stok_opname';
    protected $primary = 'id_stok_opname';
	
    public function getAllData(){ 
       $sql = "SELECT a.id_stok_opname, b.kode_barang, b.nama_barang, a.stok, a.stok_nyata, a.selisih, a.keterangan, a.tanggal, a.nilai FROM stok_opname a, barang b WHERE a.id_barang = b.id_barang";
       return $this->db->query($sql)->result_array();
    }

    public function Save(){
      $stok = $this->input->post('stok');
      $stokNyata = $this->input->post('nyata');
      $harga = $this->input->post('harga');
      $selisih = $stokNyata - $stok;
      $data = array(
        'ID_BARANG'    => htmlspecialchars($this->input->post('iditem'), true),
        'STOK'         => $stok,
        'STOK_NYATA'   => $stokNyata,
        'SELISIH'      => $selisih,
        'NILAI' 		   => $selisih * $harga,
        'KETERANGAN'	 => htmlspecialchars($this->input->post('keterangan'), true),
        'TANGGAL' 	   => date('Y-m-d H:i:s'),
      );
        return $this->db->insert($this->table, $data);
    }

    public function Edit(){
        $stok = $this->input->post('stok');
        $stokNyata = $this->input->post('nyata');
        $harga = $this->input->post('harga');
        $selisih = $stokNyata - $stok;
        $id = $this->input->post('idopname');
        $data = array(
            'ID_BARANG'    => htmlspecialchars($this->input->post('iditem'), true),
            'STOK'         => $stok,
            'STOK_NYATA'   => $stokNyata,
            'SELISIH'      => $selisih,
            'NILAI' 	     => $selisih * $harga,
            'KETERANGAN'   => htmlspecialchars($this->input->post('keterangan'), true),
            'TANGGAL' 	   => date('Y-m-d H:i:s'),
        );
      return $this->db->set($data)
                      ->where($this->primary, $id)
                      ->update($this->table);
    }

    public function Delete($id){
        return $this->db->where($this->primary, $id)->delete($this->table);
    }

    public function Detail($id){
      $sql = "SELECT a.id_stok_opname, b.kode_barang, b.barcode, b.nama_barang, a.stok, a.stok_nyata, a.selisih,  
	    a.keterangan, b.id_barang, b.harga_beli, a.tanggal, a.nilai FROM stok_opname a, barang b WHERE a.id_barang = b.id_barang AND a.id_stok_opname = '$id'";	
      return $this->db->query($sql)->row_array();
    }
}
  