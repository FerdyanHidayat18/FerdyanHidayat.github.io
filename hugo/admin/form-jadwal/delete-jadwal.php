<?php
    include '../../config.php';
    $id = $_GET['id'];
    mysqli_query($koneksi,"DELETE FROM tb_jadwal WHERE id_jadwal='$id'");
     
    header("location:../jadwal.php?pesan=hapus");

?>