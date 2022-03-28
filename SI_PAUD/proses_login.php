<?php  
	include "./include/koneksi_database.php";


	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level_user'];

	
	$user_db = mysqli_query($conn, "SELECT id_user, username, password, level_user FROM users WHERE username ='$username' ");
	$data = mysqli_fetch_row($user_db);
	list($id, $user, $pass, $lev) = $data;
	
	if ($username == $user  && $password == $pass) {
		
		session_start();
		$_SESSION['id_user'] = $id;
		$_SESSION['username'] = $user;
		$_SESSION['password'] = $pass;
		$_SESSION['level_user'] = $lev;


		if ($level == 1) {
			header('location:/SI_PAUD/beranda/beranda.php');
		}else if ($level == 2){
			header('location:/SI_PAUD/beranda/beranda.php');
		} 
	}else{
		// echo "salah user dan password";
		echo "<script>
					alert('Username dan password yang Anda salah !');
					window.location.href='login.php';
			</script>";
	}	
?>