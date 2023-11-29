<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {

    protected $table = 'supplier';
    protected $primary = 'id_supplier';
	
    public function getAllData(){ 
       return $this->db->get($this->table)->result_array();
    }

    public function Save(){
        $this->db->select("RIGHT (supplier.kode_supplier, 5) as kode_supplier", false);
        $this->db->order_by("kode_supplier", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('supplier');
	
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode_supplier) + 1;
            
        } else {
            $kode = 1;
        }
        $kodesup = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodesupplier = "SP-".$kodesup;
	    $data = array(
		   'KODE_SUPPLIER'   => $kodesupplier,
		   'NAMA_SUPPLIER'   => htmlspecialchars($this->input->post('namasup'), true),
		   'ALAMAT_SUPPLIER' => htmlspecialchars($this->input->post('alamatsup'), true),
		   'TELP_SUPPLIER'	=> htmlspecialchars($this->input->post('telpsup'), true),
		   'FAX_SUPPLIER'    => htmlspecialchars($this->input->post('faxsup'), true),
		   'EMAIL_SUPPLIER'	=> htmlspecialchars($this->input->post('emailsup'), true),
		   'BANK'		      => htmlspecialchars($this->input->post('banksup'), true),
		   'REKENING'		   => htmlspecialchars($this->input->post('reksup'), true),
		   'ATAS_NAMA'		   => htmlspecialchars($this->input->post('atasnamasup'), true),
		);
       return $this->db->insert($this->table, $data);
    }

    public function Edit(){
        $id = $this->input->post('idsupplier');
        $data = array(
             'NAMA_SUPPLIER'   => htmlspecialchars($this->input->post('editnamasup'), true),
             'ALAMAT_SUPPLIER' => htmlspecialchars($this->input->post('editalamatsup'), true),
             'TELP_SUPPLIER'	 => htmlspecialchars($this->input->post('edittelpsup'), true),
             'FAX_SUPPLIER'    => htmlspecialchars($this->input->post('editfaxsup'), true),
             'EMAIL_SUPPLIER'	 => htmlspecialchars($this->input->post('editemailsup'), true),
             'BANK'		       => htmlspecialchars($this->input->post('editbanksup'), true),
             'REKENING'		    => htmlspecialchars($this->input->post('editreksup'), true),
             'ATAS_NAMA'		 => htmlspecialchars($this->input->post('editatasnamasup'), true), 
          );
      return $this->db->set($data)
                      ->where($this->primary, $id)
                      ->update($this->table);
    }

    public function Delete($id){
        return $this->db->where($this->primary, $id)->delete($this->table);
    }

    public function Detail($id){
       return $this->db->get_where($this->table, [$this->primary => $id])->row_array();
    }
    public function cekDelete($id){
        $sql = "SELECT a.id_supplier, b.id_beli FROM supplier a, pembelian b WHERE a.id_supplier = b.id_supplier AND a.id_supplier = '$id' GROUP BY a.id_supplier";
        $result = $this->db->query($sql)->row_array();
        if($result['id_supplier'] == NULL AND $result['id_beli'] == NULL){
           return array('num' => 0);
        }else {
           return array('num' => 1);
        }
     }
}
  