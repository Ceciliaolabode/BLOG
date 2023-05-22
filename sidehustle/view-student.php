<?php
     require "sessionstart.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="all-students.php"> All Students</a>
    <?php
         include "header.php";

         $id = $_GET['id']; // try firstly to get the id, using the PHP Global variable GET
         $student = mysqli_query($db_connect, "SELECT * FROM students WHERE id = '$id' ");

         $student_details = mysqli_fetch_assoc($student);

         if (!$student_details) {
           exit('Student not found');
         }
    ?>
       <h2> View Student</h2>
       <p>Name: <?= $student_details['name'] ?> </p>
       <p>Age: <?= $student_details['age'] ?> </p>
       <p>Gender: <?= $student_details['gender'] ?> </p>
     
</body>
</html>

<!-- Above is how you can view a particular student. -->
     <!-- // above is a basic crud application that shows how to create, update, read and delete a data from your database using php and mysqli -->