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
            <h1 class="h3 mb-0 text-gray-800">Tambah Surat Keluar</h1>
            
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <hr>

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-7">
            
              <form class="user" method="POST" action="/SI_PAUD/tambah_surat/proses/proses_tambah_surat_keluar.php" enctype="multipart/form-data">


            <div id="barang">
                
                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="nama_barang">Judul : </label>
                  <div class="col-md-8">
                    <input type="text" class="form-control reset" 
                      autocomplete="off" id="judul_surat"  
                      name="judul_surat" placeholder="judul surat ..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="harga_barang">Nomor : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" 
                      autocomplete="off"  id="nomor_surat"  
                      name="nomor_surat" placeholder="nomor surat ..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="harga_barang">Tujuan : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" 
                      autocomplete="off"  id="tujuan_surat"  
                      name="tujuan_surat" placeholder="tujuan surat ..." required>
                  </div>
                </div>
             
              </div><!-- end id barang -->

   <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="sub_total">Kategori :</label>
                  <div class="col-md-8">
                    <select class="form-control" name="Kategori">
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

                <div class="form-group">
                  <label class="control-label col-md-3" for="tgl_surat">Tanggal keluar :</label>
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
              <label for="total" class="besar">Perihal :</label>
                <input type="text" class="form-control reset" 
                name="perihal_surat" id="perihal_surat" placeholder="perihal surat ..." required>
            </div>
            <!-- <div class="form-group">
              <label for="bayar" class="besar">AKM Susut :</label>
                <input type="number" class="form-control reset" 
                  name="akm_susut"  placeholder="Rp. ..." autocomplete="off"
                  id="akm_susut" >
            </div> -->

            <div class="form-group">
              <label>Foto surat:</label>
                <input type="file" class="form-control reset" 
                name="foto_surat" id="foto_surat" accept="image/x-png,image/gif,image/jpeg" required>
            </div>

                <hr>
                <button class="btn btn-primary btn-icon-split" type="submit">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text" >Tambah surat</span>
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
        include "../../include/footer.php";
       ?>
