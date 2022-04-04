<?php
class M_delete extends CI_model {

  //GURU
	public function delete_informasi_guru($v_id) {
      $this->db->where('id_guru', $v_id);
      $this->db->delete('tb_guru');
    }
  
    public function delete_akun_guru($v_id) {
      $this->db->where('id_user', $v_id);
      $this->db->delete('users');
    }

    //SISWA
    public function delete_siswa($v_id) {
      $this->db->where('id_siswa', $v_id);
      $this->db->delete('tb_siswa');
    }

}