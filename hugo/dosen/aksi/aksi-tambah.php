<?php
    include '../../config.php';
    $tambah = $_GET['tambah'];
    if ($tambah == "tugas") {
        $id = $_POST['id_matkul'];
        $kelas =$_POST['kelas'];
        $nama = $_POST['nama_tugas'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = $_POST['tanggal'];
        $waktu = $_POST['waktu'];
        $id_jadwal = $_GET['id_jadwal'];

        $query = mysqli_query($koneksi, "INSERT INTO tb_tugas VALUES ('','$id', '$kelas','$nama', '$deskripsi', '$tanggal', '$waktu' )");
        if ($query == True) {
            header("location:../tugas.php?id=$id_jadwal");
        }else{
            echo"gagal";
        }
    }else if ($tambah == "materi") {
        $id = $_POST['id_matkul'];
        $kelas =$_POST['kelas'];
        $nama = $_POST['nama_materi'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = $_POST['tanggal'];
        $waktu = $_POST['waktu'];
        $id_jadwal = $_GET['id_jadwal'];

        $query = mysqli_query($koneksi, "INSERT INTO tb_materi VALUES ('','$id', '$kelas','$nama', '$deskripsi', '$tanggal', '$waktu' )");
        if ($query == True) {
            header("location:../materi.php?id=$id_jadwal");
        }else{
            echo"gagal";
        }
    }
?>