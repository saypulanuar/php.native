<?php
session_start();
include("../config.php");
if (isset($_POST['simpan'])) {
    $pekerjaan_id = $_POST['pekerjaan_id'];
    $nama_pekerjaan = $_POST['nama_pekerjaan'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
   $alamat = $_POST['alamat'];
    $sql = "UPDATE pekerjaan SET
            nama_pekerjaan='$nama_pekerjaan',
            nama_perusahaan='$nama_perusahaan',
            alamat='$alamat'
            WHERE pekerjaan_id=$pekerjaan_id";
    $query = mysqli_query($db, $sql);
    if ($query) {
        $_SESSION['notifikasi'] = "Data pekerja berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data pekerja gagal diperbarui!";
    }
    header('Location: index.php');
} else {
    die("Akses ditolak...");
}
?>