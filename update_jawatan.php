<?php
    include('../head.php');
?>
<?php

 if(isset($_GET['staffTypeID']))
{
  include("connection/connection.php");
  include("secure/encrypt_decrypt.php");
  $staffTypeID = urldecode(secured_decrypt($_GET['staffTypeID']));
  $sql = "SELECT * FROM stafftype WHERE staffTypeID = $staffTypeID";
  //echo $sql;
  $qry = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($qry);

}


if(isset($_POST['simpan']))
{
  include("connection/connection.php");

$staffTypeID = $_POST['staffTypeID'];
$staffTypeName = strtoupper($_POST['staffTypeName']);

$query = "UPDATE stafftype SET staffTypeName = '$staffTypeName' WHERE staffTypeID = '$staffTypeID'";
//echo $query;
if (!mysqli_query($conn, $query))
{
  echo "<script>
  $(document).ready(function(){
    $('#update-confirm').modal('show');
  });
    </script>";

header("Location: jawatan.php?op=errkod");
}
else
{
  echo "<script>
  $(document).ready(function(){
    $('#update-confirm').modal('show');
  });
    </script>";

header("Location: jawatan.php?op=success");

}
}
else if(isset($_POST['padam']))
{
  include("connection/connection.php");

  $staffTypeID = $_POST['staffTypeID'];
  $staffTypeName = strtoupper($_POST['staffTypeName']);

  $query = "DELETE FROM stafftype WHERE staffTypeID = $staffTypeID";
  //echo $query;
  if (!mysqli_query($conn, $query))
  {
    echo "<script>
    $(document).ready(function(){
      $('#update-confirm').modal('show');
    });
      </script>";

  header("Location: jawatan.php?del=errkod");
  }
  else
  {
    echo "<script>
    $(document).ready(function(){
      $('#update-confirm').modal('show');
    });
      </script>";

  header("Location: jawatan.php?del=success");

  }
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



<script type='text/javascript'>
function Confirm() {
  return confirm('Adakah anda pasti?');
}
</script>
</head>

<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
<?php
include("pagesfunction/sidebarmenu.php");
?>
      <!-- Begin Page Content -->

        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">KEMASKINI JAWATAN</h6>
            </div>
            <div class="card-body">
            <form name="update_jawatan" class="user" method="post" action = "update_jawatan.php">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="staffTypeID" placeholder="ID Jawatan" value="<?php echo $row['staffTypeID']; ?>" required >
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="staffTypeName" placeholder="Nama Jawatan" value="<?php echo $row['staffTypeName']; ?>" required >
            </div>
          </div>
              <div style="width: 100%" class="btn-lg justify-content-center">
                <input type="submit" name="simpan" value="Kemaskini" class="btn btn-info text-white" onclick="return Confirm()"/>
                <input type="submit"  name="padam" value="Padam" class="btn btn-danger text-white" onclick="return Confirm()"/>
              </div>
            </form>
              </div>
            </div>

              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>

      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MAJLIS PERBANDARAN KUANTAN </span>
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
