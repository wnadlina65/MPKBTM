<?php
session_start();

if(isset($_POST['login']))
{
    include("connection/connection.php");

    $staffNo = $_POST['staffNo'];
    $staffPass = $_POST['staffPass'];

    $sql = "SELECT * FROM staff WHERE staffNo = '".$staffNo."' AND staffPass = '".$staffPass."'";

    $qry  = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($qry);
    
    if($row > 0)
    {
        $data = mysqli_fetch_assoc($qry);
        
		$_SESSION['staffName'] = $data["staffName"];
        $_SESSION['staffNo'] = $data["staffNo"];
        $_SESSION['staffPass'] = $data["staffPass"];
        $_SESSION['stafftype_staffTypeID'] = $data["stafftype_staffTypeID"]; 
        $_SESSION['staffcategory_staffCategoryID']= $data["staffcategory_staffCategoryID"];

        if(($staffNo==$data['staffNo']) AND ($staffPass==$data['staffPass']))
        {
            if($_SESSION['staffcategory_staffCategoryID'] == 1)
            {
                header("Location:admin/dashboard.php");
            }
            else if($_SESSION['staffcategory_staffCategoryID'] == 2)
            {
                header("Location:user/dashboard.php");
            }
        }
        
        if(empty($_SESSION))
	   {  	
	       header('Location:../index.php');
	   }

    }
    else 
    {
        "<script>
        $(document).ready(function(){
          $('#myModal').modal('show');
        });
          </script>";
          header("Location: index.php?op=errkod");
    }
    
}
?>