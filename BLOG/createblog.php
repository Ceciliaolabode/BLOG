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
         include 'headerblog.php';
    ?>
    <h2>Create a Blog Post</h2>
    <form action="processblog.php" method="POST" enctype="multipart/form-data">

        <p>
            <label for="title">Blog Title:</label>
            <input type="text" id="title" name="blogtitle" required> <br>
        </p>
        <p>
            <label for="content">Blog Content:</label><br>
            <textarea id="content" name="blogcontent" required> </textarea><br>
        </p>
        <p>
            <label for="image">Feature Image:</label>
            <input type="file" id="image" name="image" required> <br>
        </p>
        <p>
            <input type="submit" value="SUBMIT" />
        </p>

        <a href="logout.php"> Logout</a>

    </form>
    </body>
    </html>