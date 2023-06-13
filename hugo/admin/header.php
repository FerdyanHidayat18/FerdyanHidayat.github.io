
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

    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- <script>
        let table = new DataTable('#myTable');
    </script> -->
</head>

<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if (!isset($_SESSION['username'])) {
        header("location:../login.php?pesan=logout");
    }
    if ($_SESSION['level'] != "admin") {
        header("location:../login.php?pesan=sesi-end");
    }
    ?>
    <div class="bg-dashboard">
        <div class="sidebar">
            <div class="container">

                <div class="bg-profil d-flex align-items-center">
                    <div class="container-fluid d-flex align-items-center">
                        <div class="photo">
                            <img src="../images/user/1.jpeg" alt="Profil Pengguna">
                        </div><!-- photo -->
                        <div>
                            <h6>Admin</h6>
                        </div>
                        <a href="javascript:void(0)">
                            <i class="ri-more-2-fill"></i>
                        </a>
                    </div><!-- container -->
                </div><!-- bg-profil -->
                <div class="d-flex flex-column justify-content-between" style="height: 82vh;">
                    <div class="bg-menu">
                        <ul>
                            <li><a href="index.php"><i class="ri-user-2-line"></i>Dosen</a></li>
                            <li><a href="mahasiswa.php"><i class="ri-user-line"></i>Mahasiswa</a></li>
                            <li><a href="matkul.php"><i class="ri-book-line"></i>Mata Kuliah</a></li>
                            <li><a href="jadwal.php"><i class="ri-time-line"></i>Jadwal</a></li>
                            <li><a href="logout.php"><i class="ri-logout-box-r-line"></i>Log Out</a></li>
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