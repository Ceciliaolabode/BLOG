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
    <?php
    include "header.php";
    // to fetch all our students, we do
    $students = mysqli_query($db_connect, 'SELECT  * FROM students');
    ?>
    <!-- we are querying the database for the students -->
      <!-- //listing out all the students we have --> 
     <a href="create-student.php"> Add New Student</a>
     <a href="logout.php">Log out</a>
       <h2>All Students</h2>
       <table>
        <thead>
            <td>S/N</td>
            <td>Name</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Action</td>
        </thead>
        <!-- to fetch the students, we can start with tbody -->
        <tbody>
             <!-- Remember whenever you are writing php, it must be wrapped in a php tag. -->
             <?php foreach ($students as $student): ?> 
        <!-- using the index key principle, this is the easy way of listing all the students -->
                 <tr>
                    <td> <?= $student['id'] ?> </td>
                    <td> <?= $student['name'] ?> </td>
                    <td> <?= $student['age'] ?> </td>
                    <td> <?= $student['gender'] ?> </td>
                    <td>
                         <a href="view-student.php?id=<?=$student['id'] ?>"> View </a> 
                         <a href="edit-student.php?id=<?=$student['id'] ?>"> Edit </a> 
                         <a href="delete-student.php?id=<?=$student['id'] ?>"> Delete </a>

                    </td>
                 </tr>
             <?php endforeach; ?>
        </tbody>
       </table>

</body>
</html>
     <!-- // above is a basic crud application that shows how to create, update, read and delete a data from your database using php and mysqli -->