<?php
class M_read extends CI_model {


    //GURU

    public function get_total_guru(){
      $sql='SELECT COUNT(id_guru) AS total FROM tb_guru';
      return $query=$this->db->query($sql);
    }
    
    public function get_guru(){
      $sql='SELECT * FROM tb_guru ORDER BY id_guru ASC';
      return $query=$this->db->query($sql);
    }

    public function get_guru_by_id($id){
      $sql='SELECT * FROM users LEFT JOIN tb_guru ON users.id_user = tb_guru.id_guru WHERE id_user=?';
       return $query=$this->db->query($sql,$id);    
     }

    public function cek_nip($v_nip,$id){
      $sql='SELECT * FROM tb_guru WHERE nip_guru=? AND id_guru!=?';
      return $query=$this->db->query($sql,array($v_nip,$id))->row_array();
    }
  
    public function cek_nip_aja($v_nip){
      $sql='SELECT * FROM tb_guru WHERE nip_guru=?';
      return $query=$this->db->query($sql,$v_nip)->row_array();
    }


    //SISWA

    public function get_total_siswa(){
      $sql='SELECT COUNT(id_siswa) AS total FROM tb_siswa';
      return $query=$this->db->query($sql);
    }

    public function get_siswa(){
      $sql='SELECT * FROM tb_siswa LEFT JOIN tb_guru ON tb_siswa.id_guru_siswa = tb_guru.id_guru ORDER BY id_siswa ASC';
      return $query=$this->db->query($sql);
    }


    public function get_siswa_by_id($id){
      $sql='SELECT * FROM tb_siswa LEFT JOIN tb_guru ON tb_siswa.id_guru_siswa = tb_guru.id_guru WHERE id_siswa =?';
       return $query=$this->db->query($sql,$id);    
     }

    //ASET

    public function get_total_aset(){
      $sql='SELECT COUNT(id_aset) AS total FROM tb_aset';
      return $query=$this->db->query($sql);
    }



    //PROFILE
  public function get_akun($id){
    $sql='SELECT * FROM users WHERE id_user = ?';
    return $query=$this->db->query($sql,$id)->row_array();
  }  

  public function cek_username($username,$id){
    $sql='SELECT * FROM users WHERE username=? AND id_user!=?';
    return $query=$this->db->query($sql,array($username,$id))->row_array();
  }

  public function cek_username_aja($username){
    $sql='SELECT * FROM users WHERE username=?';
    return $query=$this->db->query($sql,$username)->row_array();
  }


}