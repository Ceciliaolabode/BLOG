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
    <a href="/all-blog.php"> All Blog</a>
    <?php
         include "headerblog.php";

         $id = $_GET['id']; //using the PHP Global variable GET
         $blog = mysqli_query($db_connect, "SELECT * FROM userdashboard WHERE id = '$id' ");

         $blog_details = mysqli_fetch_assoc($blog);

         if (!$blog_details) {
           exit('Blog not found');
         }
    ?>
       <h2> View blog</h2>
       <p>Blog Title: <?= $blog_details['title'] ?> </p>
       <p>Blog Content: <?= $blog_details['content'] ?> </p>
       <p>Featured Image: <?= $blog_details['featuredimage'] ?> </p>
     
</body>
</html>