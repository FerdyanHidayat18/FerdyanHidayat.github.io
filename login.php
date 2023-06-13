<?php 
session_start();
 
include 'hugo/config.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
 
$login = mysqli_query($koneksi,"select * from tb_user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
 
if($cek > 0){
 
	$data = mysqli_fetch_array($login);
 
	if($data['level']=="admin"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		
		echo '<script>alert("Login Sukses");window.location="hugo/admin/index.php"</script>';
	}
    else if($data['level']=="Dosen"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Dosen";
		header("location:hugo/dosen/index.php?id=$username");
		// echo '<script>alert("Login Sukses");window.location="hugo/dosen/index.php"</script>';
    }
    else if($data['level']=="Mahasiswa"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Mahasiswa";
		header("location:hugo/mahasiswa/index.php");;
 
    }else{
 
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
