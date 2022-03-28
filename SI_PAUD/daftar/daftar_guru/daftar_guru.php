<?php 
  include "../../include/koneksi_database.php";

  session_start();
  
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];


  if($username =="" || $username ==" "){
        header("location:/SI_jakem/index.php");
  }
  else{
    include "../../include/header.php";
    include "../../include/sidebar.php";
    include "../../include/topbar.php";
    
    $user_db = mysqli_query($conn, "SELECT id_user, username, password FROM users WHERE username='$username' ");
    $data = mysqli_fetch_row($user_db);
    list($id_user, $user, $pass) = $data;
  }

 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Guru</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> -->
            <div class="card-body">
              <div class="table-responsive">
              <div id="container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
         <tr>
            <th style="text-align: center;">NIP</th>
            <th style="text-align: center;">Nama Guru</th>
            <th style="text-align: center;">Tanggal Lahir</th>
            <th style="text-align: center;">Jenis Kelamin</th>
            <th style="text-align: center;">No. Telpon</th>
            <th style="text-align: center;">Foto</th>
            <th style="text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>  
<?php   
        $output = '';
        $no = 0;    
        $sql = "SELECT * FROM tb_guru ORDER BY id_guru ASC";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0 ){
          while ($row = mysqli_fetch_array($result)) {
?>          
                    <tr>
                      <td><?php echo $row['nip_guru']; ?></td>
                      <td><?php echo $row['nama_guru']; ?></td>
                      <td><?php echo $row['tgl_guru']; ?></td>
                      <td><?php echo $row['jk_guru']; ?></td>
                      <td><?php echo $row['telp_guru']; ?></td>
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
<?php 
          } 
        }
?> 
    
          </tbody>   
  </table>
 </div>

              </div>
            </div>
          </div>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php 
        include "../../include/footer.php";
       ?>

<script src="script_cari_masuk.js"></script>