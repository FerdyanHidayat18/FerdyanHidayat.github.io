<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="hugo/css/bootstrap.css" />
<link rel="stylesheet" href="hugo/css/style.css" />
<title>Universitas Tumpuan Harapan</title>

<!-- Font CSS -->
<link rel="stylesheet" href="css/remix/remixicon.css" />
</head>
</body>
<div class="bg-login d-flex">
    <section class="bg-left" style="flex: 2"></section>
    <!-- bg-left -->
    <section class="bg-right d-flex align-items-center" style="flex: 1">
        <div class="container">
            <form action="login.php" method="post" style="box-shadow: none!important;">
                <div style="text-align: center;"><img src="hugo/images/component/uthlogos.png" style="width: 150px;" /></div>
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "<h6><font color=red><center>username atau password tidak sesuai!</center></font></h6>";
                    } else if ($_GET['pesan'] == "sesi-end") {
                        echo "<h6><font color=red><center>Sesi login telah berakhir, silahkan login kembali!</center></font></h6>";
                    }
                    if ($_GET['pesan'] == "logout") {
                        echo '<script>alert("anda telah logout")</script>';
                    }
                }
                ?>
                <div class="form-group">
                    <label style="font-family: sfsemi">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="NIM" />
                </div>
                <!-- form-row -->
                <div class="form-group">
                    <label style="font-family: sfsemi; ">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>

                <div class="form-group">
                    <button class="btn btn-darkblue form-control">Login</button>
                </div>
                <!-- form-group -->
            </form>
        </div>
    </section>
    <!-- bg-right -->
</div>
</body>

</html>