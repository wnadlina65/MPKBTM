<?php
	include('connection.php');
	session_start();
	if(isset($_SESSION['staffNo'])) {
		session_destroy();
		unset($_SESSION);
		header('location: index.php'); 
	}
?>

<!-- Small modal -->
<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Logout modal</button>

<div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header"><h4>Logout <i class="fa fa-lock"></i></h4></div>
      <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
      <div class="modal-footer"><a href="javascript:;" class="btn btn-primary btn-block">Logout</a></div>
    </div>
  </div>
</div>
