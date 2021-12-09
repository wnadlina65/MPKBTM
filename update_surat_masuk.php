<?php
    include('../head.php');
?>
<?php

 if(isset($_GET['letterinID']))
{
  include("connection/connection.php");
  include("secure/encrypt_decrypt.php");
  $letterinID = urldecode(secured_decrypt($_GET['letterinID']));
  $sql = "SELECT * FROM letterin WHERE letterinID = $letterinID";
  
  $qry = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($qry);

}


if(isset($_POST['simpan']))
{
  include("connection/connection.php");

    $letterinID = $_POST['letterinID'];
    $letterinFile = $_POST['letterinFile'];
    $letterinNo = $_POST['letterinNo'];
    $staffTypeID = $_POST['stafftype_staffTypeID'];
    $letterinDetails = $_POST['letterinDetails'];
    $sectID = $_POST['section_sectID'];
    $deptID = $_POST['department_deptID'];

    $query = "UPDATE letterin SET letterinFile = '$letterinFile', letterinNo = '$letterinNo', stafftype_staffTypeID = '$staffTypeID', letterinDetails ='$letterinDetails', section_sectID = '$sectID', department_deptID = '$deptID' WHERE letterinID = $letterinID";
    //echo $query;
if (!mysqli_query($conn, $query))
{
  echo "<script>
  $(document).ready(function(){
    $('#update-confirm').modal('show');
  });
    </script>";

header("Location: surat_masuk.php?op=errkod");
}
else
{
  echo "<script>
  $(document).ready(function(){
    $('#update-confirm').modal('show');
  });
    </script>";

header("Location: surat_masuk.php?op=success");

}
}
else if(isset($_POST['padam']))
{
  include("connection/connection.php");

    $letterinID = $_POST['letterinID'];
    $letterinFile = $_POST['letterinFile'];
    $letterinNo = $_POST['letterinNo'];
    $staffTypeID = $_POST['stafftype_staffTypeID'];
    $letterinDetails = $_POST['letterinDetails'];
    $sectID = $_POST['section_sectID'];

  $query = "DELETE FROM letterin WHERE letterinID = $letterinID";
  //echo $query;
  if (!mysqli_query($conn, $query))
  {
    echo "<script>
    $(document).ready(function(){
      $('#update-confirm').modal('show');
    });
      </script>";

  header("Location: surat_masuk.php?del=errkod");
  }
  else
  {
    echo "<script>
    $(document).ready(function(){
      $('#update-confirm').modal('show');
    });
      </script>";

  header("Location: surat_masuk.php?del=success");

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
              <h6 class="m-0 font-weight-bold text-info">KEMASKINI SURAT MASUK</h6>
            </div>
            <div class="card-body">

            <form name="update_surat_masuk" class="user" method="post" action = "update_surat_masuk.php">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="letterinID" placeholder="letterinID" value="<?php echo $row['letterinID']; ?>" required >
                  </div>
                <div class="form-group">
                    <input type="date" style="text-transform:uppercase" class="form-control form-control-user" name="letterinDateIO" placeholder="Tarikh Penerimaan" value="<?php echo $row['letterinDateIO']; ?>" required >
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="letterinFile" placeholder="No Fail Kementerian Ibu Pejabat" value="<?php echo $row['letterinFile']; ?>" required>
                  </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="letterinNo" placeholder="No Yang Lain" value="<?php echo $row['letterinNo']; ?>" >
                  </div>
                <div class="form-group">
                    <input type="date" style="text-transform:uppercase" class="form-control form-control-user" name="letterinDate" placeholder="Tarikh Surat" value="<?php echo $row['letterinDate']; ?>" required >
                  </div>
                <div class="form-group">
                    <select class="select2 form-control custom-select"  name="stafftype_staffTypeID" value="<?php echo $row['stafftype_staffTypeID']; ?>">
                    <option>DARIPADA SIAPA</option>   
                            <?php
                               include("connection/connection.php");
                               $sql ="SELECT * FROM stafftype";
                               $qry = mysqli_query($conn, $sql);
                               $row4 = mysqli_num_rows($qry);
                               if($row4 > 0)
                               {
                                 while($r = mysqli_fetch_assoc($qry))
                                 {
                                  
                                    if($row['stafftype_staffTypeID'] == $r['staffTypeID'])
                                    echo "<option value='".$r['staffTypeID']."' selected>".$r['staffTypeName']." </option>";
                                    else {
                                      echo "<option value='".$r['staffTypeID']."'>".$r['staffTypeName']." </option>";
                                    }
                                  
                                }
                              }
                                ?>
                        </select>
                   </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="letterinDetails" placeholder="Perkara" value="<?php echo $row['letterinDetails']; ?>" required >
                  </div>
                 <div class="form-group">
                    <select class="select2 form-control custom-select"  name="section_sectID" value="<?php echo $row['section_sectID']; ?>">
                    <option>DIRUJUK KEPADA</option>   
                            <?php
                               include("connection/connection.php");
                               $sql ="SELECT * FROM section";
                               $qry = mysqli_query($conn, $sql);
                               $row4 = mysqli_num_rows($qry);
                               if($row4 > 0)
                               {
                                 while($r = mysqli_fetch_assoc($qry))
                                 {
                                  
                                    if($row['section_sectID'] == $r['sectID'])
                                    echo "<option value='".$r['sectID']."' selected>".$r['sectName']." </option>";
                                    else {
                                      echo "<option value='".$r['sectID']."'>".$r['sectName']." </option>";
                                    }
                                  
                                }
                              }
                                ?>
                        </select>
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
