<?php
    include('../head.php');
?>
<!DOCTYPE html>
<?php

function modalTitle($op)
{
	if($op == 'success')
		$title = 'Berjaya!';
	else
		$title = 'Amaran!';

	return $title;
}
function modalMessage($op)
{
	if($op == 'success')
		$msg = 'Data telah berjaya disimpan.';
	else if($op == 'errkod')
		$msg = 'Data ini telah ada. Sila masukkan data yang lain.';

	return $msg;
}

if(isset($_POST['simpan']))
{
  include("connection/connection.php");

  $sectName = strtoupper($_POST['sectName']);

  $duplicate = "SELECT sectName FROM section WHERE sectName = '$sectName'";
  $check = mysqli_query($conn,$duplicate);
  $checkrows = mysqli_num_rows($check);

  if ($checkrows > 0)
  {
    header("Location: Tambah_bahagian.php?op=errkod");
    return false;
  }
  else
  {
    $query = "INSERT INTO section(sectName)VALUES('$sectName')";
  }

  if (!mysqli_query($conn, $query))
  {
    echo "<script>
  $(document).ready(function(){
    $('#myModal').modal('show');
  });
    </script>";

header("Location: Tambah_bahagian.php?op=errkod");
  }
  else
  {
    echo "<script>
    $(document).ready(function(){
      $('#myModal').modal('show');
    });
      </script>";

  header("Location: Tambah_bahagian.php?op=success");
  }

  //echo $query;
}

?>
<html lang="en">
    
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.min.js" type="text/css" rel="stylesheet">-->

  <script src="vendor/jquery/jquery.min.js"></script>
  <script type='text/javascript'>
	<?php if(isset($_GET['op'])) { ?>
			var document;
			$(document).ready(function(){
				$('#myModal').modal('show');
			});
	<?php } ?>
	</script>
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
<?php
include('pagesfunction/sidebarmenu.php');
?>

        <!-- Begin Page Content -->

        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">TAMBAH BAHAGIAN</h6>
            </div>
            <div class="card-body">
            <form name="login" class="user" method="post" action = "Tambah_bahagian.php">
                    <div class="form-group">
                     <select class="select2 form-control custom-select"  placeholder="Jabatan" name="deptID">
                         <option>JABATAN</option>
                           <?php
                               include("connection/connection.php");
                               $sql ="SELECT * FROM department";
                               $qry = mysqli_query($conn, $sql);
                               $row = mysqli_num_rows($qry);
                               if($row > 0)
                               {
                                 while($r = mysqli_fetch_assoc($qry))
                                 {
                                    echo "<option value='".$r['deptID']."'>".$r['deptName']." </option>";
                                }
                              }
                                ?>
                      </select>
                      </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="sectName" placeholder="Nama Bahagian" required>
                  </div>
                      </div>
                    </div>
                  <div class="form-group">
                  <input type="submit" id="btnsimpan" name="simpan" value="Simpan" class="btn bg-info text-white btn-block" />
                  </div>

                </form>
             </div>
            </div>

              </div>
            </div>
          </div>


<!-- Logout Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">
									<?php if(isset($_GET['op'])) { echo modalTitle($_GET['op']); } ?>
								</h4>
							</div>
							<div class="modal-body">
								<p><?php if(isset($_GET['op'])) { echo modalMessage($_GET['op']); } ?></p>
							</div>
          </button>
          <div class="modal-footer">
          <button class="btn btn-info" type="button" data-dismiss="modal">OK</button>
        </div>
        </div>

    </div>
  </div>
      <!--End modal -->
        </div>
        <!-- /.container-fluid -->

      </div>


      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MAJLIS PERBANDARAN KUANTAN</span>
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
<!-- Logout -->
<?php
include('pagesfunction/logout.html');
?>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <!--<script src="js/demo/datatables-demo.js"></script>-->

</body>

</html>
