<?php
include 'header.php';
include "../config.php";
$id = $_GET['id'];
$jadwal = "SELECT * FROM tb_jadwal WHERE id_jadwal=$id";
$result = $koneksi->query($jadwal);
$row = $result->fetch_array();
$id_matkul = $row['id_matkul'];

$matkul = "SELECT * FROM tb_matkul WHERE id_matkul=$id_matkul";
$result_matkul = $koneksi->query($matkul);
$row_matkul = $result_matkul->fetch_array()

?>
<div class="mainside">
    <div class="container">
        <div class="nav">
            <div class="greeting">
                <p><b>Hai,</b> Tutut!</p>
            </div><!-- greeting -->
            <div class="menu d-flex">
                <h3 style="padding-right: 10px;"><?php echo $row_matkul['matkul'] . ' - ' . $row['kelas'] ?></h3>
                <!-- <a href="#"><i class="ri-search-line"></i></a>
                <a href="#"><i class="ri-notification-3-line"></i></a> -->
            </div><!-- menu -->
        </div><!-- nav -->

        <div class="section2">
            <div class="matkul col-12" style="padding: 0">
                <div>
                    <p><b>Tambah</b> Materi</p>
                </div>
                <form action="aksi/aksi-tambah.php?tambah=materi&id_jadwal=<?php echo $id?>" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <label>Nama Materi</label>
                            <input hidden type="text" name="id_matkul" class="form-control" value="<?php echo $id_matkul?>">
                            <input type="text" name="nama_materi" class="form-control" placeholder="Nama Materi...">
                        </div><!-- col -->
                        <div class="col">
                            <label>Kelas</label>
                            <select class="form-control" name="kelas">
                                <option value="<?php echo $row['kelas']?>"><?php echo $row['kelas']?></option>
                            </select>
                        </div><!-- col -->
                    </div><!-- form-row -->
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Materi"></textarea>
                    </div><!-- form-group -->
                    <div class="form-row">
                        <div class="col">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" placeholder="Nama Tugas...">
                        </div><!-- col -->
                        <div class="col">
                            <label>Waktu</label>
                            <input type="time" name="waktu" class="form-control" placeholder="Nama Tugas...">
                            </select>
                        </div><!-- col -->
                    </div><!-- form-row -->
                    <div class="form-group">
                        <button class="btn btn-darkblue form-control">Simpan</button>
                    </div><!-- form-group -->
                </form>
            </div><!-- matkul -->
        </div><!-- bg-section 2-->

    </div><!-- container -->
</div><!-- Mainside -->
</div><!-- Dashboard -->

</body>

</html>