<?php
    include('head.php');
?>
<!DOCTYPE html>
<?php
function loginTitle($op)
{
  if($op == 'errkod')
    $title = 'Amaran!';

  return $title;
}
function loginMessage($op)
{

  if($op == 'errkod')
    $msg = 'Salah No Pekerja/Kata Laluan';

  return $msg;
}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>e-MPK</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
 <script language="javascript">
  <?php if(isset($_GET['op'])) { ?>
			var document;
			$(document).ready(function(){
				$('#myModal').modal('show');
			});
	<?php } ?>
	</script>
</head>

<body class="bg-info">

<style>
blink {
        animation: blinker 0.6s linear infinite;
        color: #fff;
       }
      @keyframes blinker {
        50% { opacity: 0; }
       }
       .blink-one {
         animation: blinker-one 1s linear infinite;
       }
       @keyframes blinker-one {
         0% { opacity: 0; }
       }
       .blink-two {
         animation: blinker-two 1.4s linear infinite;
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
  <div class="container align-content-center">


    <!-- Outer Row -->
    <div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">
  <!-- Header -->
<blink>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</blink>
<img class="center" src="img/MPKBTM.png">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div  class="col-lg-6 d-none d-lg-block" height="100px" width="100px">
                <img src="img/majlis-perbandaran-kuantan-300x262_esW.png" width="250%" height="90%" class="center">
                </div>
              <div class="col-lg-6">
            <div class="p-5">

                      <div class="login-form">
                        <form name="loginform" method="post" action="login.php">
                        <marquee class="font-italic">SELAMAT DATANG</marquee>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="No Pekerja" name="staffNo" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Kata Laluan" name="staffPass" required="required">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn bg-info text-white btn-block" name="login">LOG MASUK</button>
                            </div>

                        </form>

                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-10 col-lg-12 col-md-9">

            <blink>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</blink>
</div>
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
									<?php if(isset($_GET['op'])) { echo loginTitle($_GET['op']); } ?>
								</h4>
							</div>
							<div class="modal-body">
								<p><?php if(isset($_GET['op'])) { echo loginMessage($_GET['op']); } ?></p>
							</div>
          </button>
          <div class="modal-footer">
          <button class="btn btn-info" type="button" data-dismiss="modal">OK</button>
        </div>
        </div>

    </div>
  </div>
      <!--End modal -->
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
