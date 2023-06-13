<?php
include 'header.php';
?>
<div class="mainside">
    <div class="container">
        <div class="nav">
            <div class="greeting">
                <p><b>Hai,</b> Admin!</p>
            </div><!-- greeting -->
            <div class="menu">
            <a href="form-mahasiswa/tambah-mahasiswa.php"><i class="ri-add-fill"></i></a>
            </div><!-- menu -->
        </div><!-- nav -->

        <div class="section2">
            <div class="dosen col-12" style="padding: 0;">
                <p style="margin-left: 15px;"><b>Daftar</b> Mahasiswa</p>
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Nim</th>
                            <th class="text-left">Nama</th>
                            <th class="text-left">Alamat</th>
                            <th class="text-left">email</th>
                            <th class="text-left">No. Telp</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config.php';
                        $query = "SELECT * FROM tb_mahasiswa";
                        $no = 1;
                        $result = $koneksi->query($query);
                        while ($row = $result->fetch_array()) { ?>
                            <tr>
                                <td class="text-left"><?php echo $no++ ?></td>
                                <td class="text-left"><?php echo $row['nim'] ?></td>
                                <td class="text-left"><?php echo $row['nama_mhs'] ?></td>
                                <td class="text-left"><?php echo $row['alamat'] ?></td>
                                <td class="text-left"><?php echo $row['email'] ?></td>
                                <td class="text-left"><?php echo $row['no_telp'] ?></td>
                                <td>
                                    <div class="menu">
                                        <a href="form-mahasiswa/edit-mahasiswa.php?id=<?php echo $row['nim']; ?>"><button type="button" class="btn btn-warning btn-sm"><i class="ri-edit-box-line"></i></button></a>
                                        <a href="form-mahasiswa/delete-mahasiswa.php?id=<?php echo $row['nim']; ?>"><button type="button" class="btn btn-danger btn-sm"><i class="ri-delete-back-fill"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- matkul -->
        </div><!-- bg-section 2-->
    </div><!-- container -->
</div><!-- Mainside -->
</div><!-- Dashboard -->

<?php
    include 'footer.php';
?>

</body>

</html>