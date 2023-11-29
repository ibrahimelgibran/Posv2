<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppn_m extends CI_Model {

    protected $table = "pajak_ppn";
    protected $primary = "id_pajak";
	
    public function getAllData(){ 
        $sql = "SELECT a.id_pajak, a.kode_pajak, a.jenis, a.nominal, a.tanggal, a.keterangan, b.nama_lengkap
        FROM pajak_ppn a, user b WHERE a.id_user = b.id_user";
        return $this->db->query($sql)->result_array();
    }

    public function getNominal(){
         $sql_keluar = "SELECT SUM(nominal) AS nominal FROM pajak_ppn WHERE jenis = 'PPN Keluaran'";
		 $sql_setor = "SELECT SUM(nominal) AS nominal FROM pajak_ppn WHERE jenis = 'PPN Disetorkan'";
		 $keluar = implode($this->model->General($sql_keluar)->row_array());
		 $setor = implode($this->model->General($sql_setor)->row_array());
		 if($keluar == ""){
			 $keluar = 0;
		 }
		 if($setor == ""){
			$setor = 0;
		 }
         $total = $keluar - $setor;
         return $total;
    }

    public function Save(){
        $user = $this->db->get_where('user', ['USERNAME' => $this->session->userdata('username')])->row_array();
        $this->db->select("RIGHT (pajak_ppn.kode_pajak, 7) as kode_pajak", false);
        $this->db->order_by("kode_pajak", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('pajak_ppn');
        
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode_pajak) + 1;
            
        } else {
            $kode = 1;
        }
        $kode_pajak = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $kode_ppn = "PPN-".$kode_pajak;
        $data = array(
            'KODE_PAJAK'=> $kode_ppn,
            'JENIS'	    => 'PPN Disetorkan',
            'NOMINAL'	=> htmlspecialchars($this->input->post('nominal_ppn'), true),
            'TANGGAL'	=> date('Y-m-d H:i:s'),
            'KETERANGAN'=> htmlspecialchars($this->input->post('keterangan_ppn'), true), 
            'ID_USER' 	=> $user['ID_USER'],
        );
       return $this->db->insert($this->table, $data);
    }

    public function Detail($id){
        return $this->db->get_where($this->table, [$this->primary => $id])->row_array();
    }

    public function Edit(){
        $id = $this->input->post('id_ppn');
		$data = array(
            'JENIS'	    => htmlspecialchars($this->input->post('jenis_ppn'), true),
            'NOMINAL'	=> htmlspecialchars($this->input->post('nominal_ppn'), true),
            'TANGGAL'	=> date('Y-m-d H:i:s'),
            'KETERANGAN'=> htmlspecialchars($this->input->post('keterangan_ppn'), true), 
		);
      return $this->db->set($data)
                      ->where($this->primary, $id)
                      ->update($this->table);
    }

    public function Delete($id){
        return $this->db->where($this->primary, $id)->delete($this->table);
    }
}
  