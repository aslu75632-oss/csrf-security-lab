<?php

session_start();


if(!isset($_SESSION['user']))
{
    header("Location: ../../login.php");
    exit();
}


$message = "";


// Default security level
if(!isset($_SESSION['level']))
{
    $_SESSION['level'] = "low";
}


// Change security level
if(isset($_POST['level']))
{
    $_SESSION['level'] = $_POST['level'];
}



// Create CSRF token for medium/high

if(!isset($_SESSION['csrf_token']))
{
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}



if(isset($_POST['email']))
{

    // LOW LEVEL
    if($_SESSION['level']=="low")
    {

        $_SESSION['email'] = $_POST['email'];
        $message="Low Level: Email changed successfully!";

    }



    // MEDIUM LEVEL
    elseif($_SESSION['level']=="medium")
    {

        if(
            isset($_POST['csrf_token']) &&
            $_POST['csrf_token']==$_SESSION['csrf_token']
        )
        {

            $_SESSION['email']=$_POST['email'];
            $message="Medium Level: Email changed successfully!";

        }
        else
        {
            $message="Medium Level: CSRF Token Failed!";
        }

    }



    // HIGH LEVEL
    elseif($_SESSION['level']=="high")
    {

        if(
            isset($_POST['csrf_token']) &&
            hash_equals(
                $_SESSION['csrf_token'],
                $_POST['csrf_token']
            )
        )
        {

            $_SESSION['email']=$_POST['email'];
            $message="High Level: Email changed successfully!";

        }
        else
        {
            die("High Level: CSRF Attack Detected!");
        }

    }

}

?>



<!DOCTYPE html>
<html>

<head>

<title>CSRF Security Lab</title>

<link rel="stylesheet" href="../../css/style.css">

</head>


<body>


<div class="container">


<h1>CSRF Security Lab</h1>


<h2>
Current Level:
<?php echo strtoupper($_SESSION['level']); ?>
</h2>



<form method="POST">

<label>Select Security Level:</label>


<select name="level">

<option value="low">
Low
</option>


<option value="medium">
Medium
</option>


<option value="high">
High
</option>


</select>


<button type="submit">
Change Level
</button>


</form>


<br><br>



<?php

echo "<p>".$message."</p>";


if(isset($_SESSION['email']))
{
    echo "<h3>Current Email: ".$_SESSION['email']."</h3>";
}

?>



<form method="POST">


<label>
New Email:
</label>


<input 
type="email"
name="email"
placeholder="new@email.com"
required>



<?php

if($_SESSION['level']=="medium" ||
   $_SESSION['level']=="high")
{

echo '

<input 
type="hidden"
name="csrf_token"
value="'.$_SESSION['csrf_token'].'">

';

}

?>



<br><br>


<button type="submit">
Change Email
</button>


</form>


<br>


<a href="../../dashboard.php">
Back to Dashboard
</a>



</div>


</body>

</html>
