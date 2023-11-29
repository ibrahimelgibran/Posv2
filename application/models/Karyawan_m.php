<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_m extends CI_Model {

    protected $table = 'karyawan';
    protected $primary = 'id_karyawan';
	
    public function getAllData(){ 
       return $this->db->get($this->table)->result_array();
    }

    public function Save(){
        $this->db->select("RIGHT (karyawan.kode_karyawan, 5) as kode_karyawan", false);
        $this->db->order_by("kode_karyawan", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('karyawan');
        
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode_karyawan) + 1;
            
        } else {
            $kode = 1;
        }
        $kodekry = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodekaryawan = "K-".$kodekry;
        $data = array(
            'KODE_KARYAWAN'   => $kodekaryawan,
            'NAMA_KARYAWAN'   => htmlspecialchars($this->input->post('namakaryawan'), true),
            'JENIS_KELAMIN'   => htmlspecialchars($this->input->post('kelamin'), true),
            'TELP_KARYAWAN'	  => htmlspecialchars($this->input->post('telp'), true),
            'EMAIL_KARYAWAN'  => htmlspecialchars($this->input->post('email'), true),
            'STATUS_KARYAWAN' => htmlspecialchars($this->input->post('status'), true),
            'TMPT_LAHIR'	  => htmlspecialchars($this->input->post('tmptlahir'), true),
            'TGL_LAHIR'		  => htmlspecialchars($this->input->post('tgllahir'), true),
            'TGL_MASUK'		  => htmlspecialchars($this->input->post('tglmasuk'), true),
            'ALAMAT'		  => htmlspecialchars($this->input->post('alamat'), true),

            );
       return $this->db->insert($this->table, $data);
    }

    public function Edit(){
        $id = $this->input->post('idkaryawan');
	    $data = array(
           'NAMA_KARYAWAN'   => htmlspecialchars($this->input->post('editnama'), true),
           'JENIS_KELAMIN'   => htmlspecialchars($this->input->post('editkelamin'), true),
		   'TELP_KARYAWAN'	 => htmlspecialchars($this->input->post('edittelp'), true),
		   'EMAIL_KARYAWAN'	 => htmlspecialchars($this->input->post('editemail'), true),
		   'STATUS_KARYAWAN' => htmlspecialchars($this->input->post('editstatus'), true),
		   'TMPT_LAHIR'		 => htmlspecialchars($this->input->post('edittmptlahir'), true),
		   'TGL_LAHIR'		 => htmlspecialchars($this->input->post('edittgllahir'), true),
		   'TGL_MASUK'		 => htmlspecialchars($this->input->post('edittglmasuk'), true),
		   'ALAMAT'		     => htmlspecialchars($this->input->post('editalamat'), true),

		);
      return $this->db->set($data)
                      ->where($this->primary, $id)
                      ->update($this->table);
    }

    public function Delete($id){
        return $this->db->where($this->primary, $id)
                        ->delete($this->table);
    }

    public function Detail($id){
       return $this->db->get_where($this->table, [$this->primary => $id])->row_array();
    }
}
  