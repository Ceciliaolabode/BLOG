<?php
      session_start();
?>
<!-- // this file will process all our php requests or all our form requests -->
<?php
     require "header.php";
     // isset is a php inbuilt function that checks if a particular button is being clicked or if a particular action is being taken
     // CREATE STUDENT
     if (isset($_POST["save_student"])) { // checking if the submit button has been clicked
        $name = $_POST["student_name"];
        $age = $_POST["student_age"];
        $gender = $_POST["student_gender"];

        $insert_data = mysqli_query($db_connect, "INSERT INTO students( name, age, gender)VALUES( ' $name', ' $age', ' $gender')");

        if ($insert_data) {
           //Header is a php function that we can call, it redirects a user to a particular location or page.
           header("Location: all-students.php");
        }
     }

     // UPDATE STUDENT - edit-student.php
     // Starts with checking if it's updating a student thats being clicked on 
     if (isset($_POST['edit_student'])) {
          $id = $_POST['student_id'];
          $name = $_POST['student_name'];
          $age = $_POST['student_age'];
          $gender = $_POST['student_gender'];

          $update_student = mysqli_query($db_connect,"UPDATE students SET name = '$name', age = '$age', gender =  '$gender' WHERE id = '$id ' " );

          if ($update_student) {
                header("Location: all-students.php");
          }
     }
     // above is a basic crud application that shows how to create, update, read and delete a data from your database using php and mysqli

     //authentication and authorization - register.php
     if(isset($_POST['save_user'])) {
         $name = $_POST['user_name'];
         $email = $_POST['email'];
         $pass = $_POST['pass'];
         $confirm_pass = $_POST['confirm_pass'];

         // an if statement to confirm if the password and confirm password are the same.
         if ($pass !== $confirm_pass) {
            exit ("<p>Password do not match! </p> <a href= 'register.php'> Go Back </a>"); // using exit so that the code below will not run
         }

         // to also check if it already exists
         $user_exist = mysqli_query($db_connect, "SELECT * FROM users WHERE email = '$email'");

         if (mysqli_num_rows($user_exist) > 0) { // if this row is greater than 0, there's obviously one that has the same email.
            exit ("<p>User already exist</p> <a href = 'indexx.php'> Log in</a>"); // using exit so that the code below will not run
        }
        // to encrypt the password //using a php function md5, used for hashing strings especially passwords
        $cryptic_pass = md5($pass);
        // to insert user
        $insert_user = mysqli_query($db_connect, "INSERT INTO users (name, email, password) VALUES('$name', '$email', '$cryptic_pass')");
        if ( $insert_user) {
             header("Location: all-students.php");
        }
     }

     //LOGIN USER
     if (isset($_POST['login_user'])) {
          $email = $_POST['email'];
          $pass = $_POST['pass'];

          // we need to start doing our queries to start checking
          $user_exist = mysqli_query($db_connect, "SELECT * FROM users WHERE email = '$email'");

          if ( !mysqli_num_rows($user_exist)) {
                exit("<p>User not found</p><p> <a href = 'register.php'>Register</a></p><a href ='indexx.php'>Go Back</a>");
          }
          // Getting the details of the user if he exists
         //  $user_details = mysqli_fetch_assoc()

         $user_details = mysqli_fetch_assoc( $user_exist);

          // to check if the passwords are the same, remember the passwords are encrypted
          $cryptic_pass = md5($pass);

          if ($cryptic_pass !== $user_details['password']) {
                exit("<p>Incorrect Password</p><a href ='indexx.php'>Go Back</a>");
          }
          // to login a user, we use a PHP function, global variable known as session
          $_SESSION["login"] = true;
          $_SESSION["id"] = $user_details['id'];

          header("Location: all-students.php");
    }
?>