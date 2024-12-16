<?php
include ("../config.php");
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Pekerjaan Pekerja</title>
    <style>
        table,th,td{
     border: 1px solid;
     border-collapse: collapse;
     padding: 10px;
        }
    </style>     
</head>
<body>
<h2>Data Pekerjaan</h2>
<?php if (isset($_SESSION['notifikasi'])): ?>
    <p><?php echo $_SESSION['notifikasi']; ?></p>
    <?php unset($_SESSION['notifikasi']); ?>
<?php endif; ?>
<table>
    <thead>
        <tr align="center">
            <th>#</th>
            <th>Nama Pekerjaan</th>
            <th>Nama Perusahaan</th>
           <th>Alamat</th>
            <th><a href="tambah_pekerjaan.php">Tambah Data pekerjaan</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; 
        $query = $db->query("SELECT * FROM pekerjaan");
        while ($pekerjaan = $query->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $pekerjaan['nama_pekerjaan']?></td>
            <td><?php echo $pekerjaan['nama_perusahaan']?></td>
            <td><?php echo $pekerjaan['alamat']?></td>
        
        <td align="center">
            <a href="edit_pekerjaan.php?pekerjaan_id=<?php echo $pekerjaan['pekerjaan_id'] ?>">Edit</a>
            <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="hapus.php?pekerjaan_id=<?php echo $pekerjaan['pekerjaan_id'] ?>">Hapus</a>
        </td>
    </tr>
<?php
    } 
?>
</tbody>
</table>
<p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>