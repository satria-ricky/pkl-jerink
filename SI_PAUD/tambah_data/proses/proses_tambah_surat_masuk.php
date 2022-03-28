<?php 
	include "../../include/koneksi_database.php";
	
	$nomor = $_POST["nomor_surat"];
	$judul = $_POST["judul_surat"];
	$tanggal = $_POST["tgl_surat"];
	$perihal = $_POST["perihal_surat"];
	$asal = $_POST["asal_surat"];
	$Tipe = "null";


	
	$namafile = $_FILES['foto_surat']['name'];
	$ukuranfile = $_FILES['foto_surat']['size'];
	$tmpname = $_FILES['foto_surat']['tmp_name'];

	$ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));


	$user_db = mysqli_query($conn, "SELECT nomor FROM tb_surat WHERE nomor='$nomor' ");
    $data = mysqli_fetch_row($user_db);
    list($n_surat) = $data;


	if ($n_surat != null) {
		echo "<script>
				alert('Gagal menambahkan, Nomor surat yang Anda masukkan sudah tersedia!');
				history.go(-1);
			</script>
			";
	}
	else{
		if ($ukuranfile > 10000000) {
		echo "<script>
				alert('Gagal menambahkan, ukuran file terlalu besar!');
				history.go(-1);
			</script>
			";
		}

		$namafilebaru = uniqid();
		$namafilebaru .= '.';
		$namafilebaru .= $ekstensigambar;
		move_uploaded_file($tmpname, '../../penyimpanan_foto/'.$namafilebaru);

		$query = "INSERT INTO tb_surat VALUES (null,'$Tipe','$nomor', '$judul', '$tanggal', '$perihal', '$asal','$namafilebaru', 'masuk')";
		$data = mysqli_query($conn, $query);
		echo "<script>
				alert('Surat Berhasil ditambah');
				history.go(-1);
			</script>";
	} 

	
 ?>