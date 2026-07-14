<?php

$host = "localhost";
$user = "csrfuser";
$pass = "csrf123";
$db   = "csrf_lab";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

?>
