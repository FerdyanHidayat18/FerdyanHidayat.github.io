<?php
    include '../../config.php';
    $id = $_GET['id'];
    mysqli_query($koneksi,"DELETE FROM tb_mahasiswa WHERE nim='$id'");
    mysqli_query($koneksi,"DELETE FROM tb_user WHERE username='$id'");
     
    header("location:../mahasiswa.php?pesan=hapus");

?>