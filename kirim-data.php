<?php
include "koneksi.php";

// cek apakah ada data masuk atau tidak
if (isset($_GET["data"]) && isset($_GET["password"])) {
    // mengambil data yang masuk 
    $password = htmlspecialchars($_GET["password"]);
    $password = md5($password);
    $dataMasuk = htmlspecialchars($_GET["data"]);
    // mengambil tanggal sekarang
    $tanggal = date("Y-m-d");
    //  cek apakah username yang dimasukn benar atau tidak
    $cekUser = mysqli_query($koneksi, "SELECT * FROM users WHERE password = '$password'");
    if ($cekUser->num_rows > 0) {
        // cek apakah ada data dengan tanggal sekarang 
        $result = mysqli_query($koneksi, "SELECT * FROM databurung WHERE tanggal = '$tanggal'");
        $dataLama = mysqli_fetch_assoc($result);
        if ($dataLama != null) {
            // jika ada maka data akan diupdate dengan jumalh baru
            $jumlah = $dataMasuk + $dataLama["jumlah_burung"];
            $tambahData = mysqli_query($koneksi, "UPDATE databurung SET jumlah_burung = $jumlah WHERE tanggal = '$tanggal'");
            $updateKondisi = mysqli_query($koneksi, "UPDATE deteksi SET kondisi = $dataMasuk WHERE id = 1");
        } else {
            // jika data tidak ada maka akan menambahkan data baru
            $jumlah = $dataMasuk;
            $tambahData = mysqli_query($koneksi, "INSERT INTO databurung (jumlah_burung, tanggal) VALUES ($jumlah, '$tanggal')");
            $updateKondisi = mysqli_query($koneksi, "UPDATE deteksi SET kondisi = $dataMasuk WHERE id = 1");
        }
        $dataBaru = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM databurung where tanggal = '$tanggal'"));
        echo json_encode($dataBaru);
    } else {
        echo "Gagal mengirim data";
    }
} else {
    echo "Not Found => 404";
}
