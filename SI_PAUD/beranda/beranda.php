<?php 
  include "../include/koneksi_database.php";

  session_start();
  
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  $level = $_SESSION['level_user'];

  if($username =="" || $username ==" "){
        header("location:/SI_PAUD/index.php");
  }
  else{
    include "../include/header.php";
    if ($level == 1) {
      include "../include/sidebar.php";
    }else if($level == 2){
      include "../include/sidebar_guru.php";
    }
    include "../include/topbar.php";
    
    $user_db = mysqli_query($conn, "SELECT id_user, username, password FROM users WHERE username='$username' ");
    $data = mysqli_fetch_row($user_db);
    list($id_user, $user, $pass) = $data;
  }


  if ($level == 1) {
    $sql = "SELECT * from tb_siswa";
  }else {
    $sql = "SELECT * from tb_siswa WHERE id_guru_siswa= $id_user";
  }

    $siswaku = 0;
    $guruku = 0;
    $asetku = 0;
    
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0 ){
      while ($row = mysqli_fetch_array($result)) {
          $siswaku++;
      }
    }

    $sqlguru = "SELECT * FROM tb_guru";
    $resultguru = mysqli_query($conn, $sqlguru);
    if(mysqli_num_rows($resultguru) > 0 ){
      while ($row = mysqli_fetch_array($resultguru)) {
          $guruku++;
      }
    }

    $sqlaset = "SELECT * FROM tb_aset";
    $resultaset = mysqli_query($conn, $sqlaset);
    if(mysqli_num_rows($resultaset) > 0 ){
      while ($row = mysqli_fetch_array($resultaset)) {
          $asetku++;
      }
    }

 ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <hr>

          <!-- Content Row -->

          <div class="row">

          <?php if ($level == 1): ?>
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">DAFTAR GURU</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $guruku; ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">DAFTAR SISWA</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $siswaku; ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">DAFTAR ASET</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $asetku; ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
          <?php else: ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">DAFTAR SISWA</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $siswaku; ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
          <?php endif ?>
            
          
          

             

            <!-- Earnings (Monthly) Card Example -->
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php 
        include "../include/footer.php";
       ?>
