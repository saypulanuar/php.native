<?php
session_start(); 
include("../config.php");
if (isset($_POST['simpan'])) {
    $nama_pekerjaan = $_POST['nama_pekerjaan'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat = $_POST['alamat'];
    $sql = "INSERT INTO pekerjaan 
            (nama_pekerjaan, nama_perusahaan, alamat)
            VALUES ('$nama_pekerjaan', '$nama_perusahaan', '$alamat')";
    $query = mysqli_query($db, $sql);
    if ($query) {
        $_SESSION['notifikasi'] = "Data pekerja berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data pekerja gagal ditambahkan!";
    }
    header('Location: index.php');
} else {
    die("Akses ditolak...");
}
?>