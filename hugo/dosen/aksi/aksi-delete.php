<?php
include '../../config.php';
$hapus = $_GET['hapus'];
if ($hapus == "tugas") {
    $id = $_GET['id'];
    $id_jadwal = $_GET['id_jadwal'];
    mysqli_query($koneksi, "DELETE FROM tb_tugas WHERE id_tugas='$id'");

    header("location:../tugas.php?id=$id_jadwal");
}
else if ($hapus == "materi") {
    $id = $_GET['id'];
    $id_jadwal = $_GET['id_jadwal'];
    mysqli_query($koneksi, "DELETE FROM tb_materi WHERE id_materi='$id'");

    header("location:../materi.php?id=$id_jadwal");
}
