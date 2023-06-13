<?php
    include '../../config.php';
    $tambah = $_GET['tambah'];
    if ($tambah == "dosen") {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $notelp = $_POST['notelp'];
        $pass = $_POST['pass'];
        $level = "Dosen";

        $query = mysqli_query($koneksi, "INSERT INTO tb_dosen VALUES ('$nip', '$nama', '$alamat', '$email', '$notelp' )");
        if ($query == True) {
            // header('location:../index.php');
        }else{
            echo"gagal";
        }
        $query1 = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('$nip','$level', '$pass' )");

        if ($query1 == True) {
            header('location:../index.php');
        }else{
            echo"gagal";
        }
    }else if ($tambah == "mahasiswa") {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $notelp = $_POST['notelp'];
        $pass = $_POST['pass'];
        $level = "Mahasiswa";

        $query = mysqli_query($koneksi, "INSERT INTO tb_mahasiswa VALUES ('$nim', '$nama', '$email','$alamat', '$notelp' )");
        if ($query == True) {
            // header('location:../index.php');
        }else{
            echo"gagal";
        }
        $query1 = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('$nim','$level', '$pass' )");

        if ($query1 == True) {
            header('location:../mahasiswa.php');
        }else{
            echo"gagal";
        }
    }else if ($tambah == "matkul") {
        $matkul = $_POST['mata-kuliah'];

        $query = mysqli_query($koneksi, "INSERT INTO tb_matkul VALUES (' ','$matkul')");
        if ($query == True) {
            header('location:../matkul.php');
        }else{
            echo"gagal";
        }
    }else if ($tambah == "jadwal") {
        $hari = $_POST['hari'];
        $mulai = $_POST['mulai'];
        $selesai = $_POST['selesai'];
        $matkul = $_POST['matkul'];
        $dosen = $_POST['dosen'];
        $kelas = $_POST['kelas'];
        $mahasiswa = $_POST['mahasiswa'];
        $jumlah = count($mahasiswa);
        for ($i=0; $i < $jumlah ; $i++) { 
            $query = mysqli_query($koneksi, "INSERT INTO tb_jadwal VALUES (' ', '$hari','$matkul','$mulai - $selesai' ,'$kelas', '$dosen', '$mahasiswa[$i]')");
        }
        // die();
        if ($query == True) {
            header('location:../jadwal.php');
        }
        else{
            echo mysqli_error($koneksi);
        }
    }
?>