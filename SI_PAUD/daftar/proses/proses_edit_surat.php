<?php 
	include "../../include/koneksi_database.php";
	
	$id_surat = $_POST['id_surat'];
	$nomor = $_POST["nomor_surat"];
	$judul = $_POST["judul_surat"];
	$tanggal = $_POST["tanggal"];
	$perihal = $_POST["perihal_surat"];
	$asal_tujuan = $_POST["asal_tujuan"];
	$nama_foto_lama = $_POST["nama_foto_surat"];


	$namafile = $_FILES['foto_surat']['name'];
	$ukuranfile = $_FILES['foto_surat']['size'];
	$tmpname = $_FILES['foto_surat']['tmp_name'];

	$ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));

	$user_db = mysqli_query($conn, "SELECT nomor FROM tb_surat WHERE nomor='$nomor' AND id_surat!='$id_surat' ");
    $data = mysqli_fetch_row($user_db);
    list($n_surat) = $data;

	if ($n_surat != null) {
		echo "<script>
				alert('Gagal mengubah surat, Nomor surat yang Anda masukkan sudah tersedia!');
				history.go(-1);
			</script>
			";
	}

	else {

		if ($ukuranfile > 10000000) {
			echo "<script>
					alert('Gagal menambahkan, ukuran file terlalu besar!');
					history.go(-1);
				</script>
				";
		}

		if ($_FILES['foto_surat']['error'] === 4 ) {
			$namafilebaru = $nama_foto_lama;		
		}
		else{
			$namafilebaru = uniqid();
			$namafilebaru .= '.';
			$namafilebaru .= $ekstensigambar;
			move_uploaded_file($tmpname, '../../penyimpanan_foto/'.$namafilebaru);
			unlink('../../penyimpanan_foto/'.$nama_foto_lama); 
		}
			
		$query = "UPDATE tb_surat SET 
					nomor = '$nomor', 
					judul = '$judul', 
					tanggal = '$tanggal', 
					perihal = '$perihal', 
					asal_tujuan = '$asal_tujuan',  
					foto = '$namafilebaru'
					WHERE id_surat = '$id_surat' 
				";
		$data = mysqli_query($conn, $query);
		echo "<script>
				alert('Surat Berhasil diubah');
				history.go(-1);
			</script>";
	}
 ?>