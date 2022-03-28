<?php 
  include "../../include/koneksi_database.php";

  session_start();
  
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];


  if($username =="" || $username ==" "){
        header("location:/PAUD/index.php");
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
            <h1 class="h3 mb-0 text-gray-800">Daftar Surat Keluar</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <hr>

          <!-- Content Row -->
           <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> -->
            <div class="card-body">
                    
                <div class="row">
                  <div class="col-md-5 d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <input type="text" id="" class="form-control bg-light border-0 small" placeholder="Cari surat ..."  aria-label="Search" aria-describedby="basic-addon2">
                    
                      <i class="fas fa-search fa-sm"></i>
                      <!-- <button class="btn btn-info" >
                        
                      </button> -->
                      
                  </div>
                  <div>
                    Filter Berdasarkan :
                  </div>
                  <div class="col col-md-3">
                    <select class="form-control" id="keyword" aria-describedby="basic-addon1" >
                        <option>Silahkan Pilih Nomor Surat</option>
                        <option>(01) Surat Keputusan</option>
                        <option>(02) Surat Undangan</option>
                        <option>(03) Surat Pemahaman</option>
                        <option>(04) Surat Pemberitahuan</option>
                        <option>(05) Surat Peminjaman</option>
                        <option>(06) Surat Pernyataan</option>
                        <option>(07) Surat Mandat</option>
                        <option>(08) Surat Tugas</option>
                        <option>(09) Surat Keterangan</option>
                        <option>(10) Surat Rekomendasi</option>
                        <option>(11) Surat Balasan</option>
                        <option>(12) Surat Perintah Perjalanan Dinas</option>
                        <option>(13) Surat Sertifikat</option>
                        <option>(14) Surat Perjanjian Kerja</option>
                        <option>(15) Surat Pengantar</option>
                    </select>
                  </div>
                  
                  
                  
                </div>

                
                <hr>

              <div class="table-responsive">
                <div id="container">
                <table class="table-responsive table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th style="text-align: center;">Nomor Surat</th>
                      <th style="text-align: center;">Judul Surat </th>
                      <th style="text-align: center;">Tanggal Surat</th>
                      <th style="text-align: center;">Perihal</th>
                      <th style="text-align: center;">Tujuan Surat</th>
                      <th style="text-align: center;">Terlampir</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>



<?php   
        $output = '';
        $no = 0;    
        $sql = "SELECT * FROM tb_surat WHERE jenis_surat = 'keluar' ORDER BY id_surat DESC";          
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

<script src="script_cari_keluar.js"></script>
