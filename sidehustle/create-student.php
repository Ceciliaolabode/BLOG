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
         include 'header.php';
    ?>
    <h2>Students</h2>
    <form action="process.php" method="post">

        <label for="">Name:</label>
        <input type="text" name="student_name"> <br> <br>

        <label for="">Age:</label>
        <input type="text" name="student_age"> <br> <br>

        <label for="">Gender</label>
        <select name="student_gender">
            <option value="">Select Gender</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select><br><br>
        <input type="submit" value="Save" name="save_student"> <br> <br>
    </form> 
    </body>
    </html>

         <!-- //above is a basic crud application that shows how to create, update, read and delete a data from your database using php and mysqli -->
