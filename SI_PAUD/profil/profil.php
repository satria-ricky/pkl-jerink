<?php 
  include "../include/koneksi_database.php";
  
  session_start();
  $id_user = $_SESSION['id_user'];
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
    
    $user_db = mysqli_query($conn, "SELECT id_user, username, password FROM users WHERE id_user='$id_user' ");
    $data = mysqli_fetch_row($user_db);
    list($id, $user, $pass) = $data;

  }
 ?>
<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profil</h1>
            
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <hr>

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-7">
            
              <form class="user" method="POST" action="proses_edit_profil.php">


            <div id="barang">
                
                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="nama_barang">Username : </label>
                  <div class="col-md-6">
                    <input type="hidden" class="form-control reset" 
                      autocomplete="off" id="id_user"  
                      name="id_user" value="<?php echo $id ?>" >
                    <input type="text" class="form-control reset" 
                      autocomplete="off" id="username"  
                      name="username" value="<?php echo $user ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="harga_barang">Password : </label>
                  <div class="col-md-6">
                   <input type="text" class="form-control reset" 
                      autocomplete="off"  id="password"  
                      name="password" value="<?php echo $pass ?>" required="" >
                  </div>
                </div>
                <hr>
                <button class="btn btn-success btn-icon-split" type="submit">
                  <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                  </span>
                  <span class="text" >Edit profil</span>
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
        include "../include/footer.php";
       ?>

