<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>

<title>CSRF Security Lab</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

<h1>CSRF Security Lab</h1>

<h2>Welcome, <?php echo $username; ?></h2>

<hr>

<h3>Choose Security Level</h3>

<div class="levels">

<a href="levels/low/change_email.php">
<button class="low">
Low Security
</button>
</a>


<a href="levels/medium/change_email.php">
<button class="medium">
Medium Security
</button>
</a>


<a href="levels/high/change_email.php">
<button class="high">
High Security
</button>
</a>


<a href="levels/impossible/change_email.php">
<button class="impossible">
Impossible Security
</button>
</a>

</div>


<hr>

<h3>Modules</h3>

<a href="logout.php">
<button>
Logout
</button>
</a>


</div>

</body>
</html>
