<?php
    include '../../config.php';
    $id = $_GET['id'];
    mysqli_query($koneksi,"DELETE FROM tb_matkul WHERE id_matkul='$id'");
     
    header("location:../matkul.php?pesan=hapus");

?>