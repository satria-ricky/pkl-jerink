<?php
class M_delete extends CI_model {

	public function delete_informasi_guru($v_id) {
      $this->db->where('id_guru', $v_id);
      $this->db->delete('tb_guru');
    }
  
    public function delete_akun_guru($v_id) {
      $this->db->where('id_user', $v_id);
      $this->db->delete('users');
    }

}