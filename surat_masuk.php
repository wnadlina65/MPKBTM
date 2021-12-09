<?php
    include('../head.php');
?>
<!DOCTYPE html>
<?php
include("pagesfunction/modalMessage.php");
include('connection/connection.php');
include("secure/encrypt_decrypt.php");
$sql = "SELECT * FROM letterin l, stafftype t, section d WHERE l.stafftype_staffTypeID=t.staffTypeID AND l.section_sectID=d.sectID";
$result = mysqli_query($conn, $sql);


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
<style>
blink {
        animation: blinker 1.5s linear infinite;
        color: #fff;
       }
      @keyframes blinker {
        50% { opacity: 0; }
       }
       .blink-one {
         animation: blinker-one 1.0s linear infinite;
       }
       @keyframes blinker-one {
         0% { opacity: 0; }
       }
       .blink-two {
         animation: blinker-two 1.5s linear infinite;
       }
       @keyframes blinker-two {
         100% { opacity: 0; }
       }

       .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
      }


</style>

  <!-- Page Wrapper -->
  <div id="wrapper">
<!-- Sidebar -->
<?php
include('pagesfunction/sidebarmenu.php');
?>


        <!-- Begin Page Content -->
        <div class="container-fluid">
            
          <div class="shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">SENARAI SURAT MASUK</h6><br>
            </div>

            <div class="card-body">
              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>
                      <th>Tarikh Penerimaan</th>
                      <th>No Fail Kementerian Ibu Pejabat</th>
                      <th>Nombor-nombor yang Lain</th>
                      <th>Tarikh Surat</th>
                      <th>Daripada Siapa</th>
                      <th>Perkara</th>
                      <th>Dirujuk kepada</th>
                      <th>Kemaskini</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                          include('connection/connection.php');
                            echo "<tr>";
                            echo "<td>" . $row['letterinDateIO'] . "</td>";
                            echo "<td>" . $row['letterinFile'] . "</td>";
                            echo "<td>" . $row['letterinNo'] . "</td>";
                            echo "<td>" . $row['letterinDate'] . "</td>";
                            echo "<td>" . $row['staffTypeName'] . "</td>";
                            echo "<td>" . $row['letterinDetails'] . "</td>";
                            echo "<td>" . $row['sectName'] . "</td>";
                            echo "<td><a href='update_surat_masuk.php?letterinID=".urlencode(secured_encrypt($row['letterinID']))."'>Kemaskini</a></td>";

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
