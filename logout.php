<html>

<?php
    session_start();
    session_destroy();

    unset($_SESSION['staffNo']);

    header("Location: ../index.php");
?>
    
</html>

