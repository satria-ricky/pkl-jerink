 <?php 
	
	include "../include/koneksi_database.php";
		
  session_start();
  
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

	if($username =="" || $username ==" "){
        header("location:/SI_PAUD/index.php");
  	}
	  	

	$username = $_POST['username'];
	$password = $_POST['password'];
	$id_user = $_POST['id_user'];

	$sql = "UPDATE users SET username='$username', password='$password' WHERE id_user = $id_user";
	$hasil = mysqli_query($conn, $sql);
	echo "<script>alert('Profil Berhasil diperbarui');history.go(-1);</script>";
	
?> 