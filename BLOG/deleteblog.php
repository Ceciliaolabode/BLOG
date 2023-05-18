<?php
     require "sessionstart.php";
?>
<?php
     require 'header.php';

     $id = $_GET['id']; //getting the id
     $delete = mysqli_query($db_connect, "DELETE FROM userdashboard WHERE id = '$id' ");  // using the id, we query the database

     if ($delete) {
       header("Location: allblog.php");
     }
          //above is a basic crud application that shows how to create, update, read and delete a data from your database using php and mysqli
?>