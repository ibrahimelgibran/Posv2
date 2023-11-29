<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    protected $table = 'user';
    protected $primary = 'id_user';
	
    public function getAllData(){ 
       return $this->db->get_where($this->table, ['is_active' => 1])->result_array();
    }

    public function Save(){
        $data = array(
            'USERNAME'      => htmlspecialchars($this->input->post('username'), true),
            'NAMA_LENGKAP'  => htmlspecialchars($this->input->post('nama'), true),
            'PASSWORD'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'TIPE'          => htmlspecialchars($this->input->post('tipe'), true),
            'ALAMAT_USER'   => htmlspecialchars($this->input->post('alamat'), true),
            'TELP_USER'     => htmlspecialchars($this->input->post('telp'), true),
            'EMAIL_USER'	 => htmlspecialchars($this->input->post('email'), true),
            'IS_ACTIVE'	    => 1,
 
         );
       return $this->db->insert($this->table, $data);
    }

    public function Edit(){
      $id = $this->input->post('iduser');
	   $data = array(
		   'USERNAME'      => htmlspecialchars($this->input->post('editusername'), true),
		   'NAMA_LENGKAP'  => htmlspecialchars($this->input->post('editnama'), true),
		   'TIPE'          => htmlspecialchars($this->input->post('edittipe'), true),
		   'ALAMAT_USER'   => htmlspecialchars($this->input->post('editalamat'), true),
		   'TELP_USER'     => htmlspecialchars($this->input->post('edittelp'), true),
		   'EMAIL_USER'	 => htmlspecialchars($this->input->post('editemail'), true),

		);
      return $this->db->set($data)
                      ->where($this->primary, $id)
                      ->update($this->table);
    }

    public function Delete($id){
        return $this->db->set(array('is_active' => 0))
                        ->where($this->primary, $id)
                        ->update($this->table);
    }

    public function Detail($id){
       return $this->db->get_where($this->table, [$this->primary => $id])->row_array();
    }
}
  