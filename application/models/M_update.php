<?php
class M_update extends CI_model {

    //PFORILE
    public function edit_profile($data,$id){     
      $this->db->update('users', $data, array('id_user' => $id));
    }

  //GURU
  public function edit_informasi_guru($data,$id){     
    $this->db->update('tb_guru', $data, array('id_guru' => $id));
  }   

  public function edit_akun_guru($data,$id){     
    $this->db->update('users', $data, array('id_user' => $id));
  }   

    
}