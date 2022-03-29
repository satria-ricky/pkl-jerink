
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul_daftar ?></h1>
            
          </div>

          <!-- Content Row -->
          <div class="card shadow mb-4">
           
          <div class="row">

            <div class="col-lg-7">
            
              <form class="user" method="POST" action="/SI_PAUD/tambah_surat/proses/proses_tambah_surat_keluar.php" enctype="multipart/form-data">


            <div id="barang">
                
                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="nama_barang">NIP Guru : </label>
                  <div class="col-md-8">
                    <input type="text" class="form-control reset" 
                      autocomplete="off" id="nip_guru"  
                      name="nip_guru" placeholder="NIP Guru ..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">Nama Guru : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" 
                      autocomplete="off"  id="nama_guru"  
                      name="nama_guru" placeholder="Nama Guru ..." required>
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

            <div class="form-group">
              <label>Foto Guru :</label>
                <input type="file" class="form-control reset" 
                name="foto_surat" id="foto_surat" accept="image/x-png,image/gif,image/jpeg" required>
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
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->