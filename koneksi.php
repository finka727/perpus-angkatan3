<?php
    $host_koneksi = "localhost";
    $username_koneksi = "root";
    $password_koneksi = "";
    $database_koneksi = "angkatan3_belajar";

    $koneksi = mysqli_connect($host_koneksi, $username_koneksi, $password_koneksi, $database_koneksi);

    if (!$koneksi) {
        echo "Koneksi Gagal";    
    }

?>