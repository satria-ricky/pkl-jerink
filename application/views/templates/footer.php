
 <!-- Footer -->
      <footer class="sticky-footer bg-white" style="">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <b>Izki Ardivilaska</b></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!-- <div class="modal-body">Yakin ingin keluar ? </div> -->
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>


<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>
<?php if($this->session->flashdata('error')){ ?>
  <script>
    swal("<?php echo $this->session->flashdata('error'); ?>", {
        icon : "error",
        buttons: {                  
            confirm: {
                className : 'btn btn-danger'
            }
        },
    });
  </script>
<?php } ?>

<?php if($this->session->flashdata('pesan')){ ?>
  <script>
    swal("<?php echo $this->session->flashdata('pesan'); ?>", {
        icon : "success",
        buttons: {                  
            confirm: {
                className : 'btn btn-success'
            }
        },
    });
  </script>
<?php } ?>

<script >
  $(document).ready(function() {
    $('#example').DataTable();
  });


//PROFILE
$('#button_edit_profile').click(function(e) {
        if ($('#form1').val() == '' || $('#form2').val() == '') 
        {
           swal({
              title: 'Opppss!',
              text: 'Harap isi semua form!',
              icon: 'warning',
              buttons: {                  
                  confirm: {
                      className : 'btn btn-focus'
                  }
              },
            });
        }
        else {
          swal({
            title: 'Simpan Perubahan?',
            icon: 'warning',
            buttons:{
              confirm: {
                text : 'Simpan',
                className : 'btn btn-success'
              },
              cancel: {
                text : 'Tidak',
                visible: true,
                className: 'btn btn-focus'
              }
            }
          }).then((Edit) => {
            if (Edit) {
              document.getElementById("form_edit_profile").submit();
            } else {
              swal.close();
            }
          });
        }
    });


//EDIT
function button_edit(jenis,id) {
  // console.log(jenis,id);
  if (jenis == 'guru') {
    $('#modal_edit_guru').modal('show');
    $.ajax({
      url: "<?php echo base_url(); ?>auth/get_guru",
      data: {
        id : id
      },
      type: "POST",
      dataType: "json",
      success: function(data) {
          // console.log(data);
          set_jabatan_edit(data.user_id_level);
          document.getElementById("modal_edit_id_user").value = data.user_id;
          document.getElementById("modal_edit_nama").value =  data.user_nama;
          document.getElementById("modal_edit_username").value =  data.user_username;
          document.getElementById("modal_edit_password").value =  data.user_password;
          document.getElementById("modal_edit_data_ttd").src="<?= base_url('assets/foto/ttd/'); ?>"+data.user_ttd;
          
      }
    });

  }
}



$('#button_tambah_guru').click(function(e) {

  var radios = document.getElementsByName('jenis_kelamin');
  var jk ='';
  for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
      // do whatever you want with the checked radio
      // alert(radios[i].value);
      // console.log(radios[i].value);
      jk = radios[i].value;
      // only one radio can be logically checked, don't check the rest
      break;
    }
  }

  // console.log(jk);

        if ($('#username').val() == '' || $('#password').val() == '' || $('#nip_guru').val() == '' || $('#nama_guru').val() == '' || $('#tgl_lahir').val() == '' || $('#nomer_telp').val() == '' || $('#foto_guru').val() == '' || jk == '')
        {
           swal({
              title: 'Opppss!',
              text: 'Harap isi semua form!',
              icon: 'warning',
              buttons: {                  
                  confirm: {
                      className : 'btn btn-focus'
                  }
              },
          });
        }
        else {
          swal({
            title: 'Yakin ditambah?',
            icon: 'warning',
            buttons:{
              confirm: {
                text : 'Tambah',
                className : 'btn btn-success'
              },
              cancel: {
                text : 'Tidak',
                visible: true,
                className: 'btn btn-focus'
              }
            }
          }).then((Tambah) => {
            if (Tambah) {
              document.getElementById("form_tambah_guru").submit();
            } else {
              swal.close();
            }
          });
        }
    });


    $('#button_edit_guru').click(function(e) {

      if ($('#username').val() == '' || $('#password').val() == '' || $('#nip_guru').val() == '' || $('#nama_guru').val() == '' || $('#tgl_lahir').val() == '' || $('#nomer_telp').val() == '')
      {
         swal({
            title: 'Opppss!',
            text: 'Harap isi semua form!',
            icon: 'warning',
            buttons: {                  
                confirm: {
                    className : 'btn btn-focus'
                }
            },
        });
      }
      else {
        swal({
          title: 'Yakin diubah?',
          icon: 'warning',
          buttons:{
            confirm: {
              text : 'Ubah',
              className : 'btn btn-success'
            },
            cancel: {
              text : 'Tidak',
              visible: true,
              className: 'btn btn-focus'
            }
          }
        }).then((edit) => {
          if (edit) {
            document.getElementById("form_edit_guru").submit();
          } else {
            swal.close();
          }
        });
      }
  });


</script>