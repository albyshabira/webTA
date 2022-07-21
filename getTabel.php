<?php
include "koneksi.php";

$reusult = mysqli_query($koneksi, "SELECT * FROM databurung");
$dataHama = mysqli_fetch_all($reusult, 1);

echo json_encode($dataHama);
?>