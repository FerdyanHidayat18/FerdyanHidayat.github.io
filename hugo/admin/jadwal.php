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
                <a href="form-jadwal/tambah-jadwal.php"><i class="ri-add-fill"></i></a>
            </div><!-- menu -->
        </div><!-- nav -->

        <div class="section2">
            <div class="dosen col-12" style="padding: 0;">
                <p style="margin-left: 15px;"><b>Daftar</b> Jadwal</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-left">Hari</th>
                            <th class="text-left">Dosen</th>
                            <th class="text-left">Mata Kuliah</th>
                            <th class="text-left">Kelas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config.php';
                        $query = "SELECT * FROM tb_jadwal";
                        $no = 1;
                        $result = $koneksi->query($query);
                        while ($row = $result->fetch_array()) {
                            $nip = $row['nip'];
                            $id_matkul = $row['id_matkul']; ?>
                            <tr>
                                <td class="text-left"><?php echo $no++ ?></td>
                                <td class="text-left"><?php echo $row['hari'] ?></td>
                                <?php
                                $query_dosen = mysqli_query($koneksi, "SELECT * FROM tb_dosen WHERE nip = $nip");
                                while ($datadosen = mysqli_fetch_array($query_dosen)) { ?>
                                    <td class="text-left"><?php echo $datadosen['nama_dosen'] ?></td>
                                <?php
                                }
                                ?>
                                <?php
                                $query_matkul = mysqli_query($koneksi, "SELECT * FROM tb_matkul WHERE id_matkul = $id_matkul");
                                while ($datamatkul = mysqli_fetch_array($query_matkul)) { ?>
                                    <td class="text-left"><?php echo $datamatkul['matkul'] ?></td>
                                <?php
                                }
                                ?>
                                <td class="text-left"><?php echo $row['kelas'] ?></td>
                                <td>
                                    <div class="menu">
                                        <!-- <a href="form-jadwal/edit-jadwal.php?id=<?php echo $row['id_jadwal']; ?>"><button type="button" class="btn btn-warning btn-sm"><i class="ri-edit-box-line"></i></button></a> -->
                                        <a href="form-jadwal/delete-jadwal.php?id=<?php echo $row['id_jadwal']; ?>"><button type="button" class="btn btn-danger btn-sm"><i class="ri-delete-back-fill"></i></button></a>
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

</body>

</html>