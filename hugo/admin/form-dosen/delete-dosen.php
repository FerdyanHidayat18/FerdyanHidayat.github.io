<?php
    include '../../config.php';
    $id = $_GET['id'];
    mysqli_query($koneksi,"DELETE FROM tb_dosen WHERE nip='$id'");
    mysqli_query($koneksi,"DELETE FROM tb_user WHERE username='$id'");
     
    header("location:../index.php?pesan=hapus");

?>