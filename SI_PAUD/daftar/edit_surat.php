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
  }

  $id_surat = $_GET['id'];
  
  $sql = mysqli_query($conn, "SELECT id_surat, nomor, judul, tanggal, perihal, asal_tujuan, foto, jenis_surat FROM tb_surat WHERE id_surat='$id_surat' ");
    $data = mysqli_fetch_row($sql);

    list($id, $nomor, $judul, $tanggal, $perihal, $asal_tujuan, $foto, $jenis_surat) = $data;
    $j_surat = '';
    $t_surat = '';
    if ($jenis_surat == "masuk") {
      $j_surat = "Asal";
      $t_surat = "Masuk";
    }else if ($jenis_surat == "keluar") {
      $j_surat = "Tujuan";
      $t_surat = "Keluar";
    }
  
 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Surat <?=$t_surat?> -> Edit Surat <?=$t_surat?></h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>                
                <hr>

             <div class="row">

            <div class="col-lg-7">
            
              <form class="user" method="POST" action="proses/proses_edit_surat.php" enctype="multipart/form-data">

                <input type="hidden" name="id_surat" value="<?=$id?>">
                <input type="hidden" name="nama_foto_surat" value="<?=$foto?>">

            <div id="barang">
                
                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="nama_barang">Judul : </label>
                  <div class="col-md-6">
                    <input type="text" class="form-control reset" 
                      autocomplete="off" id="judul_surat"  
                      name="judul_surat" value="<?=$judul?>" placeholder="judul surat ..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="harga_barang">Nomor : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" 
                      autocomplete="off"  id="nomor_surat"  
                      name="nomor_surat" value="<?=$nomor?>" placeholder="nomor surat ..." required="" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6" 
                    for="harga_barang"><?=$j_surat?> Surat : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" 
                      autocomplete="off"  id="asal_tujuan"  
                      name="asal_tujuan" value="<?=$asal_tujuan?>" placeholder="<?=$j_surat;?> surat ..." required="">
                  </div>
                </div>
             
              </div><!-- end id barang -->

                <div class="form-group">
                  <label class="control-label col-md-6" 
                    for="sub_total">Tanggal <?=$t_surat?> :</label>
                  <div class="col-md-5">
                    <input type="date" value="<?=$tanggal?>" class="form-control reset" 
                      name="tanggal" id="tanggal" required="" >
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
                name="perihal_surat" id="perihal_surat">
            </div>
            <!-- <div class="form-group">
              <label for="bayar" class="besar">AKM Susut :</label>
                <input type="number" class="form-control reset" 
                  name="akm_susut"  placeholder="Rp. ..." autocomplete="off"
                  id="akm_susut" >
            </div> -->

            <div class="form-group">
              <label>Foto surat:</label><br>
              <a href="/SI_PAUD/penyimpanan_foto/<?php echo $foto; ?>">
                <img src="/SI_PAUD/penyimpanan_foto/<?php echo $foto; ?>" style="width:100px; heigth:100px;">
              </a>
                <input type="file" class="form-control reset" 
                name="foto_surat" id="foto_surat" accept="image/x-png,image/gif,image/jpeg" >
            </div>

                <hr>
                <button class="btn btn-success btn-icon-split" type="submit">
                  <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                  </span>
                  <span class="text" >Edit surat</span>
                </button>
                
              </form>
              
              <button class="btn btn-info btn-icon-split" onclick="Kembali()">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text" >Kembali </span>
              </button>
            
          </div>
            
            
          </div>
        </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php 
        include "../include/footer.php";
       ?>

<script type="text/javascript">
  function Kembali(){
    history.go(-1);
  }

</script>