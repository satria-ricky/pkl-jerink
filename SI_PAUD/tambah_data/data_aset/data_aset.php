<?php 
  include "../../include/koneksi_database.php";

  session_start();
  
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];


  if($username =="" || $username ==" "){
        header("location:/SI_PAUD/index.php");
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
            <h1 class="h3 mb-0 text-gray-800">Tambah Aset</h1>
            
          </div>
          <hr>

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-7">
            
              <form class="user" method="POST" action="/SI_PAUD/tambah_surat/proses/proses_tambah_surat_keluar.php" enctype="multipart/form-data">


            <div id="barang">
                
                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="nama_barang">Nama Aset</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control reset" 
                      autocomplete="off" id="nip_siswa"  
                      name="nama_aset" placeholder="Nama Aset ..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">Kondisi Aset : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" 
                      autocomplete="off"  id="nama_siswa"  
                      name="kondisi_aset" placeholder="Kondisi Aset ..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="total" class="besar">Banyak Aset :</label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" 
                name="banyak_aset" id="perihal_surat" placeholder="Banyak Aset..." required>
                  </div>
                </div>

                
              
                
 

              </div><!-- end id barang -->
             

            <!-- </div>
              </div> --><!-- end panel-->

          </div><!-- end col-md-8 -->


         <div class="col-md-4 mb">
        <div class="col-md-12">
            
            <!-- <div class="form-group">
              <label for="bayar" class="besar">AKM Susut :</label>
                <input type="number" class="form-control reset" 
                  name="akm_susut"  placeholder="Rp. ..." autocomplete="off"
                  id="akm_susut" >
            </div> -->

            <div class="form-group">
              <label>Foto Aset :</label>
                <input type="file" class="form-control reset" 
                name="foto_aset" id="foto_surat" accept="image/x-png,image/gif,image/jpeg" required>
            </div>

                <hr>
                <button class="btn btn-primary btn-icon-split" type="submit">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text" >Tambah Data</span>
                </button>
              </form>
            
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
