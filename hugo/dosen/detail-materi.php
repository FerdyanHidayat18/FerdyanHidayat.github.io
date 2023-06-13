<?php
include 'header.php';
?>
<div class="mainside" style="margin-top:-50px">
    <div class="container">
        <div class="nav">
            <div class="greeting">
                <p><b>Hai,</b> <?php echo $row["nama_dosen"] ?>!</p>
            </div><!-- greeting -->
            <?php
            include "../config.php";
            $id = $_GET['id'];
            $id_materi = $_GET['id_materi'];
            $jadwal = "SELECT * FROM tb_jadwal WHERE id_jadwal=$id";
            $result = $koneksi->query($jadwal);
            $row = $result->fetch_array();
            $id_matkul = $row['id_matkul'];

            $matkul = "SELECT * FROM tb_matkul WHERE id_matkul=$id_matkul";
            $result_matkul = $koneksi->query($matkul);
            $row_matkul = $result_matkul->fetch_array()

            ?>
            <div class="menu d-flex">
                <h3 style="padding-right: 10px;"><?php echo $row_matkul['matkul'] . ' - ' . $row['kelas'] ?></h3>
                <a href="#"><i class="ri-search-line"></i></a>
                <a href="#"><i class="ri-notification-3-line"></i></a>
            </div><!-- menu -->
        </div><!-- nav -->

        <div class="section2">
            <div class="matkul col-12" style="padding: 0">
                <div>
                    <p><b>Detail</b> Materi</p>
                </div>
                <?php
                $materi = "SELECT * FROM tb_materi WHERE id_materi=$id_materi";
                $result_materi = $koneksi->query($materi);
                $row_materi = $result_materi->fetch_array() ?>
                <div class="form-row">
                    <div class="col">
                        <label>Nama Materi</label>
                        <input hidden type="text" name="id_matkul" class="form-control" value="<?php echo $id_matkul ?>">
                        <input type="text" readonly name="nama_materi" class="form-control" value="<?php echo $row_materi['nama_materi'] ?>">
                    </div><!-- col -->
                    <div class="col">
                        <label>Kelas</label>
                        <select readonly class="form-control" name="kelas">
                            <option value="<?php echo $row['kelas'] ?>"><?php echo $row['kelas'] ?></option>
                        </select>
                    </div><!-- col -->
                </div><!-- form-row -->
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" readonly name="deskripsi" value="<?php echo $row_materi['deskripsi'] ?>">
                </div><!-- form-group -->

                <!-- <h5 style="padding-left: 10px; padding-top: 20px;">Deadline materi</h5> -->
                <div class="form-row">
                    <div class="col">
                        <label>Tanggal Upload</label>
                        <input type="text" name="tanggal" readonly class="form-control" value="<?php echo $row_materi['tanggal'] . ' / ' . $row_materi['waktu'] ?>">
                    </div><!-- col -->
                </div><!-- form-row -->

            </div><!-- matkul -->
        </div><!-- bg-section 2-->

    </div><!-- container -->
</div><!-- Mainside -->
</div><!-- Dashboard -->

</body>

</html>