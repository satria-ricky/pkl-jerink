<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th style="text-align: center;">Nomor Surat</th>                
                      <th style="text-align: center;">Judul Surat </th>
                      <th style="text-align: center;">Tanggal Surat</th>
                      <th style="text-align: center;">Perihal Surat</th>
                      <th style="text-align: center;">Tujuan Surat</th>
                      <th style="text-align: center;">Terlampir</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>

<?php

  include "../../include/koneksi_database.php";

  session_start();
  
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  
  if($username =="" || $username ==" "){
        header("location:/SI_PAUD/index.php");
  }

        $output = '';
        $no = 0;    

        $sql = "SELECT * FROM tb_surat WHERE jenis_surat = 'keluar' AND ( nomor LIKE '%".$_GET["keyword"]."%' or judul LIKE '%".$_GET["keyword"]."%' or tanggal LIKE '%".$_GET["keyword"]."%' or perihal LIKE '%".$_GET["keyword"]."%' or asal_tujuan LIKE '%".$_GET["keyword"]."%' or Tipe LIKE '%".$_GET["keyword"]."%' ) ORDER BY id_surat DESC";           
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0 ){
          while ($row = mysqli_fetch_array($result)) {
            $no++;
?>
            <tbody>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nomor']; ?></td>                  
                      <td><?php echo $row['judul']; ?></td>
                      <td><?php echo $row['tanggal']; ?></td>
                      <td><?php echo $row['perihal']; ?></td>
                      <td><?php echo $row['asal_tujuan']; ?></td>
                      <td>  
                        <a href="/SI_PAUD/penyimpanan_foto/<?php echo $row['foto']; ?>">
                          <img src="/SI_PAUD/penyimpanan_foto/<?php echo $row['foto']; ?>" style="width:70px; heigth:70px;">
                        </a>
                      </td>
                      <td>
                        <a href="/SI_PAUD/daftar_surat/edit_surat.php?id=<?php echo $row['id_surat']; ?>" class="btn btn-success btn-sm" style="padding-bottom:1px; padding-top: 1px; padding-left: 1px; padding-right: 1px;">
                          <span class="text">Edit</span>
                        </a>
                        <a onclick="return confirm('Anda yakin ingin menghapus surat ini ?')" class="btn btn-danger btn-sm" style="padding-bottom:1px; padding-top: 1px; padding-left: 1px; padding-right: 1px;" href="/SI_PAUD/daftar_surat/proses/hapus_surat.php?id_surat=<?php echo $row['id_surat']; ?>">
                          <span class="text">Hapus</span>
                        </a>
                      </td>
                    </tr>
                  </tbody>      

<?php 
      } 
      echo $output,"</table>";
?>
          
<?php
        }
        else{
?> 
          <tbody>
          <tr>
            <td style="text-align: center;" colspan="8"> Tidak ada surat </td>
          </tr>
          </tbody>   
          </table>
<?php
        }
 ?>