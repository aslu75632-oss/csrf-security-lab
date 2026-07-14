<?php
session_start();
include "db.php";

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE username='$username'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){

        $_SESSION['user']=$username;

        header("Location: dashboard.php");
        exit;

    }else{

        $error="Invalid Username or Password";

    }

}
?>

<!DOCTYPE html>
<html>

<head>

<title>CSRF Lab Login</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="login-box">

<h2>CSRF Security Lab</h2>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button
name="login">
Login
</button>

<p><?php echo $error; ?></p>

</form>

</div>

</body>

</html>
