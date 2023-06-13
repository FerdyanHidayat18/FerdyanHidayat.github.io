<?php
    include '../../config.php';
    $edit = $_GET['edit'];
    if ($edit == "dosen") {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $notelp = $_POST['notelp'];
        $pass = $_POST['pass'];
        $level = "Dosen";

        $query = mysqli_query($koneksi, "UPDATE tb_dosen SET nama_dosen='$nama', alamat='$alamat', email='$email', no_telp='$notelp' WHERE nip=$nip");
        if ($query == True) {
            header('location:../index.php');
        }else{
            echo"gagal";
        }
    }else  if ($edit == "mahasiswa") {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $notelp = $_POST['notelp'];
        $pass = $_POST['pass'];
        $level = "Mahasiswa";

        $query = mysqli_query($koneksi, "UPDATE tb_mahasiswa SET nama_mhs='$nama', alamat='$alamat', email='$email', no_telp='$notelp' WHERE nim=$nim");
        if ($query == True) {
            header('location:../mahasiswa.php');
        }else{
            echo"gagal";
        }
    }else  if ($edit == "matkul") {
        $id_matkul = $_POST['id_matkul'];
        $matkul = $_POST['matkul'];

        $query = mysqli_query($koneksi, "UPDATE tb_matkul SET matkul='$matkul' WHERE id_matkul=$id_matkul");
        if ($query == True) {
            header('location:../matkul.php');
        }else{
            echo"gagal";
        }
    }
?>