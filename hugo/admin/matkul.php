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
                <a href="form-matkul/tambah-matkul.php"><i class="ri-add-fill"></i></a>
            </div><!-- menu -->
        </div><!-- nav -->

        <div class="section2">
            <div class="dosen col-12" style="padding: 0;">
                <p style="margin-left: 15px;"><b>Daftar</b> Mata Kuliah</p>
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Mata Kuliah</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config.php';
                        $query = "SELECT * FROM tb_matkul";
                        $no = 1;
                        $result = $koneksi->query($query);
                        while ($row = $result->fetch_array()) { ?>
                            <tr>
                                <td class="text-left"><?php echo $no++ ?></td>
                                <td class="text-left"><?php echo $row['matkul'] ?></td>
                                <td>
                                    <div class="menu">
                                        <a href="form-matkul/edit-matkul.php?id=<?php echo $row['id_matkul']; ?>"><button type="button" class="btn btn-warning btn-sm"><i class="ri-edit-box-line"></i></button></a>
                                        <a href="form-matkul/delete-matkul.php?id=<?php echo $row['id_matkul']; ?>"><button type="button" class="btn btn-danger btn-sm"><i class="ri-delete-back-fill"></i></button></a>
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