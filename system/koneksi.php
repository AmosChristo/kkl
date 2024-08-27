<?php
$host = "localhost";
$username = "root";
$password = "";
$databasename = "mpti";
$koneksi = new mysqli($host, $username, $password, $databasename);

if (!$koneksi) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
