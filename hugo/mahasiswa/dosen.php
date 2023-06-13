<?php
    include 'header.php';
?>
        <div class="mainside">
            <div class="container">
                <div class="nav">
                    <div class="greeting">
                        <p><b>Hai,</b> <?php echo $row["nama_mhs"]?>!</p>
                    </div><!-- greeting -->
                    <div class="menu">
                        <a href="#"><i class="ri-search-line"></i></a>
                        <a href="#"><i class="ri-notification-3-line"></i></a>
                    </div><!-- menu -->
                </div><!-- nav -->

                <div class="section2">
                    <div class="dosen col-12" style="padding: 0;">
                        <p style="margin-left: 15px;"><b>Daftar</b> Dosen</p>
                        <table class="table">
                        <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Nip</th>
                            <th class="text-left">Nama</th>
                            <th class="text-left">Alamat</th>
                            <th class="text-left">email</th>
                            <th class="text-left">No. Telp</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM tb_dosen";
                        $no=1;
                        $result = $koneksi->query($query);
                        while ($row = $result->fetch_array()) {?>
                        <tr>
                            <td class="text-left"><?php echo $no++?></td>
                            <td class="text-left"><?php echo $row['nip']?></td>
                            <td class="text-left"><?php echo $row['nama_dosen']?></td>
                            <td class="text-left"><?php echo $row['alamat']?></td>
                            <td class="text-left"><?php echo $row['email']?></td>
                            <td class="text-left"><?php echo $row['no_telp']?></td>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                        </table>
                    </div><!-- matkul -->
                </div><!-- bg-section 2-->
            </div><!-- container -->
        </div><!-- Mainside -->
    </div><!-- Dashboard -->

</body>
</html>