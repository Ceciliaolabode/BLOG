<?php
     require "sessionstart.php";
?>
<!-- Editing is the updating part of the CRUD -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Firstly, lets add our link to the all student -->
    <a href="allblog.php"> All Blog</a>
    <?php
         include 'headerblog.php';
        //  To get our data, we first query the database
        $id = $_GET['id'];

        $blog = mysqli_query($db_connect, "SELECT * FROM userdashboard WHERE id = '$id' ");

        if (!$blog) {
           exit('Blog not found');
        }

        $blog_details = mysqli_fetch_assoc($blog);
    ?>
    <h2>Edit Student</h2>
    <form action="processblog.php" method="post">
        <input type="hidden" value="<?php echo $id ?>" name="blog_id" required>

        <label for="">Blogtitle:</label>
        <input type="text" name="blogtitle" value="<?php echo $blog_details['title']?>" required> <br> <br>

        <label for="">Blogcontent:</label>
        <input type="text" name="blogcontent"  value="<?php echo $blog_details['content']?>" required > <br> <br>

       <label for="image">Feature Image:</label>
            <input type="file" id="image" name="image" required> <br>

        <input type="submit" value="Update" name="edit_student"> <br> <br>
    </form> 
    </body>
    <!-- </html>

