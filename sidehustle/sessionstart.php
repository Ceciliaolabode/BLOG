<?php
     session_start();
     if ($_SESSION['login'] != true && !isset($_SESSION['id'])) {
             header("Location: indexx.php");
     }
     $currentuser_session = $_SESSION['id'];
?>
<!-- // we then add to our php file, you set to be the first to run, this is the data being checked before anybody can login-->