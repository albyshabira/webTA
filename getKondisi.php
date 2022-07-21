<?php
include "koneksi.php";

$reusult = mysqli_query($koneksi, "SELECT kondisi FROM deteksi WHERE id = 1 ");
$dataHama = mysqli_fetch_assoc($reusult);

echo json_encode($dataHama);
?>