<?php
$server       = "localhost";
$user         = "root";
$password     = "";
$database     = "db_burung";

$koneksi = mysqli_connect($server, $user, $password, $database);

if(!$koneksi){
    die('Koneksi ke database gagal');
}
