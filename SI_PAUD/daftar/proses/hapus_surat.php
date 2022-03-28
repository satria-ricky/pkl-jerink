<?php 
		include "../../include/koneksi_database.php";
		
  session_start();
  
 $username = $_SESSION['username'];
 $password = $_SESSION['password'];

 
  if($username =="" || $username ==" "){
        header("location:/SI_PAUD/index.php");
  }


$id_surat = $_GET['id_surat'];




	$user_db = mysqli_query($conn, "SELECT foto FROM tb_surat WHERE id_surat='$id_surat' ");
    $data = mysqli_fetch_row($user_db);
    list($nama_foto) = $data;
    
    	unlink("../../penyimpanan_foto/".$nama_foto);
	    $query = "DELETE FROM tb_surat where id_surat = '$id_surat'";
		$hasil = mysqli_query($conn, $query);
		if ($hasil) {
			echo "<script>
				alert('Surat Berhasil dihapus');
				history.go(-1);
			</script>";
		}
   	
	
 ?>