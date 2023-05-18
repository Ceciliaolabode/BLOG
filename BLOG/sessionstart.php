<?php
//      session_start();
//      if ($_SESSION['login'] != true && !isset($_SESSION['id'])) {
//              header("Location: indexx.php");
//      }
//      $currentuser_session = $_SESSION['id'];

     session_start();

     //to prevent from going to the adminhomepage without logging in
     if (!isset($_SESSION["username"])) {

          header("Location: login.php"); //if there is no username, direct to login.php

     }

?>
