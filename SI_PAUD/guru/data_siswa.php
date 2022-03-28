<?php 
  include "../include/koneksi_database.php";

  session_start();
  
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];


  if($username =="" || $username ==" "){
        header("location:/SI_PAUD/index.php");
  }
  else{
    include "../include/header.php";
    include "../include/sidebar.php";
    include "../include/topbar.php";
    
    $user_db = mysqli_query($conn, "SELECT id_user, username, password FROM users WHERE username='$username' ");
    $data = mysqli_fetch_row($user_db);
    list($id_user, $user, $pass) = $data;
  }
 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data siswa</h1>
            
          </div>
          <hr>

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-7">
            
              <form class="user" method="POST" action="/SI_PAUD/tambah_surat/proses/proses_tambah_surat_keluar.php" enctype="multipart/form-data">


            <div id="barang">
                
                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="nama_barang">Absen siswa : </label>
                  <div class="col-md-8">
                    <input type="text" class="form-control reset" 
                      autocomplete="off" id="nip_siswa"  
                      name="nip_siswa" placeholder="Absen siswa ..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">Nama siswa : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" 
                      autocomplete="off"  id="nama_siswa"  
                      name="nama_siswa" placeholder="Nama siswa ..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">Jenis Kelamin : </label>
                  <div class="col-md-8">
                   <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="jenis_kelamin" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Laki - laki</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="jenis_kelamin" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio2">Perempuan</label>
                    </div>
                  </div>
                </div>
             
              </div><!-- end id barang -->

                <div class="form-group">
                  <label class="control-label col-md-4" for="tgl_surat">Tanggal Lahir :</label>
                  <div class="col-md-8">
                    <input type="date" class="form-control reset" 
                      name="tgl_surat" id="tgl_surat" required>
                  </div>
                </div>

             

            <!-- </div>
              </div> --><!-- end panel-->

          </div><!-- end col-md-8 -->


         <div class="col-md-4 mb">
        <div class="col-md-12">
            <div class="form-group">
              <label for="total" class="besar">Nomor Telpon :</label>
                <input type="text" class="form-control reset" 
                name="perihal_surat" id="perihal_surat" placeholder="No telpon ..." required>
            </div>
            <!-- <div class="form-group">
              <label for="bayar" class="besar">AKM Susut :</label>
                <input type="number" class="form-control reset" 
                  name="akm_susut"  placeholder="Rp. ..." autocomplete="off"
                  id="akm_susut" >
            </div> -->

            <div class="form-group">
              <label>Foto siswa :</label>
                <input type="file" class="form-control reset" 
                name="foto_surat" id="foto_surat" accept="image/x-png,image/gif,image/jpeg" required>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Pendamping</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01">
                <option selected>Pilih...</option>
                <option value="1">Guru1</option>
                <option value="2">Guru2</option>
                <option value="3">Guru3</option>
              </select>
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
            <br>
            <b><p>Note* : format tanggal "bulan-hari-tahun"</p></b>
            
          </div>
        </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php 
        include "../include/footer.php";
       ?>
