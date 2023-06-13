<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../images/component/uthlogos.png">
    <title>E-Learning</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- Font CSS -->
    <link rel="stylesheet" href="../css/remix/remixicon.css">

</head>

<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if (!isset($_SESSION['username'])) {
        header("location:../../login.php?pesan=logout");
    }
    if ($_SESSION['level'] != "Dosen") {
        header("location:../../login.php?pesan=sesi-end");
    }
    ?>
    <div class="bg-dashboard">
        <div class="sidebar">
            <div class="container">
            </div>
            <div class="bg-profil d-flex align-items-center">
                <div class="container-fluid d-flex align-items-center">
                    <div class="photo">
                        <img src="../images/user/profil.png" alt="Profil Pengguna">
                    </div><!-- photo -->
                    <div>
                        <?php
                        include "../config.php";
                        $id = $_SESSION['username'];
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_dosen WHERE nip=$id");
                        $row = mysqli_fetch_array($query) ?>

                        <h6><?php echo $row["nama_dosen"] ?></h6>
                        <p><?php echo $row["nip"] ?></p>
                    </div>
                </div><!-- container -->
            </div><!-- bg-profil -->
            <div class="d-flex flex-column justify-content-between" style="height: 82vh;">
                <div class="bg-menu">
                    <ul>
                        <li><a href="index.php"><i class="ri-home-5-line"></i>Beranda</a></li>
                        <li><a href="kelas.php"><i class="ri-book-2-line"></i>Kelas</a></li>
                        <li><a href="dosen.php"><i class="ri-user-2-line"></i>Dosen</a></li>
                        <li><a href="logout.php"><i class="ri-logout-box-r-line"></i>Log Out</a></li>
                        <li><img class="mx-auto d-block img-fluid" src="../images/component/uthlogos.png" width="100"></li>
                    </ul>
                </div><!-- bg-menu -->
                <div class="copyright">
                    <div class="container d-flex align-items-center">
                        <i class="ri-copyright-line"></i>
                        <p>UTH</p>
                    </div>
                </div><!-- copyright -->
            </div>

        </div><!-- Container -->
    </div><!-- Sidebar -->