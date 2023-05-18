<?php //user and admin login system
$host="localhost";
$user="root";
$password="";
$db="meekfi_user";

session_start();

$data=mysqli_connect($host,$user,$password,$db); //our database is connected
if ($data===false) { //if our data is not connected
   die("connection error");
}

// condition for login
if ($_SERVER["REQUEST_METHOD"]=="POST") { //lowercase might throw an error.
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql="select * from login where username='".$username."' AND password= '".$password."' "; 
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);

    if($row["usertype"]=="user") {

        $_SESSION["username"]=$username;

         header("location:admin/userdashboard.html");
    }
    elseif($row["usertype"]=="admin") {

        $_SESSION["username"]=$username;

        header("location:admin/dashboard.html");
    }
    else {
        echo "username or password incorrect";
    }
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="login.css">

</head>
<body>
    <section>
        <form class="form-div" action="#" method="POST">

            <h1>Login Form</h1>

            <input type="text" name="username" placeholder="Username" class="input-box" required>
            
            <input type="password" name="password" placeholder="Password" class="input-box" required>
        
            <input type="submit" value="Log In"  class="login"  >
        
        </form>
    </section>
</body>
</html>