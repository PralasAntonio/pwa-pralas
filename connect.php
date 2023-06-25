<?php
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";
$basename = "bazaprojekt";
$port = 3307;


$dbc = mysqli_connect($servername, $username, $password, $basename, $port) or die('Error connecting to MySQL server: ' . mysqli_connect_error());

mysqli_set_charset($dbc, "utf8");

// Provjera uspješnosti konekcije
if ($dbc) {
    echo "Connected successfully";
}
?>