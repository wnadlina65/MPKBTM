<?php
    include('../head.php');
?>
<!DOCTYPE html>
<?php
include("pagesfunction/modalMessage.php");
include('connection/connection.php');
include("secure/encrypt_decrypt.php");
$sql = "SELECT * FROM staff s,stafftype t,staffcategory c WHERE s.stafftype_staffTypeID=t.staffTypeID AND s.staffcategory_staffcategoryID = c.staffCategoryID";
$result = mysqli_query($conn,$sql);
//mysqli_close($conn);
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
  <script src="vendor/jquery/jquery.min.js"></script>
 <script type='text/javascript'>
	<?php if(isset($_GET['op'])) { ?>
			var document;
			$(document).ready(function(){
				$('#myModal').modal('show');
			});
	<?php } ?>
  </script>
  <script type='text/javascript'>
	<?php if(isset($_GET['del'])) { ?>
			var document;
			$(document).ready(function(){
				$('#DelModal').modal('show');
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

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Senarai Staff</h1> -->
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

          <!-- DataTales Example -->
          <div class="shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">SENARAI PEKERJA MPK</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No Pekerja</th>
                      <th>Nama</th>
                      <th>Jawatan</th>
                      <th>Akses</th>
                      <th>Kemaskini</th>
                      </tr>
                  </thead>

                  <tbody>
                  <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                          include('connection/connection.php');

                            echo "<tr>";
                            echo "<td>" . $row['staffNo'] . "</td>";
                            echo "<td>" . $row['staffName'] . "</td>";
                            echo "<td>" . $row['staffTypeName'] . "</td>";
                            echo "<td>" . $row['staffCategoryName'] . "</td>";
                            echo "<td><a href='update_pekerja.php?staffID=".urlencode(secured_encrypt($row['staffID']))."'>Kemaskini</a></td>";
                            echo "</tr>";

                        }

                    ?>

                  </tbody>
                </table>
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

      <!-- Delete Modal-->
<div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">
									<?php if(isset($_GET['del'])) { echo modalDelTitle($_GET['del']); } ?>
								</h4>
							</div>
							<div class="modal-body">
								<p><?php if(isset($_GET['del'])) { echo modalDelMessage($_GET['del']); } ?></p>
							</div>
          </button>
          <div class="modal-footer">
          <button class="btn btn-info" type="button" data-dismiss="modal">OK</button>
        </div>
        </div>

    </div>
  </div>
      <!--End Delete modal -->
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
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
