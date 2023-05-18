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
    include "headerblog.php";
    // to fetch all our students, we do
    $blogs = mysqli_query($db_connect, 'SELECT  * FROM userdashboard');
    ?>
      <!-- //listing out all the students we have --> 
     <a href="createblog.php"> Add New Blog</a>
     <a href="logout.php">Log out</a>
       <h2>All Blog</h2>
       <table>
        <thead>
            <td>S/N</td>
            <td>Blog Title</td>
            <td>Blog Content</td>
            <td>Featured Image</td>
            <td>Action</td>
        </thead>
        <!-- to fetch the students, we can start with tbody -->
        <tbody>
             <!-- Remember whenever you are writing php, it must be wrapped in a php tag. -->
             <?php foreach ($blogs as $blog): ?> 
        <!-- using the index key principle, this is the easy way of listing all the students -->
                 <tr>
                    <td> <?= $blog['id'] ?> </td>
                    <td> <?= $blog['title'] ?> </td>
                    <td> <?= $blog['content'] ?> </td>
                    <td> <?= $blog['featuredimage'] ?> </td>
                    <td>
                         <a href="viewblog.php?id=<?=$blog['id'] ?>"> View </a> <br>
                         <a href="editblog.php?id=<?=$blog['id'] ?>"> Edit </a> <br>
                         <a href="deleteblog.php?id=<?=$blog['id'] ?>"> Delete </a>

                    </td>
                 </tr>
             <?php endforeach; ?>
        </tbody>
       </table>

</body>
</html>