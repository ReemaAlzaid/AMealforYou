
<?php

$host = "localhost";
$user = "root";
$password = "";
$name = "amealforyoudb";

$connection = mysqli_connect($host, $user, $password, $name);
if (!$connection) {
    die("connection failed: " . mysqli_connect_error());
}
?>
