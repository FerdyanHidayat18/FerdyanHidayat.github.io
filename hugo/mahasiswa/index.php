<?php
include 'header.php';
?>
<div class="mainside">
    <div class="container">
        <div class="nav">
            <div class="greeting">
                <p><b>Hai,</b> <?php echo $row["nama_mhs"] ?>!!</p>
            </div><!-- greeting -->
            <div class="menu d-flex">
                <a href="#"><i class="ri-search-line"></i></a>
                <a href="#"><i class="ri-notification-3-line"></i></a>
            </div><!-- menu -->
        </div><!-- nav -->
        <div class="bg-listClass">
            <p><b>Mata</b> Kuliah</p>
            <div class="cardMatkul">
                <?php
                include '../config.php';
                $nim = $_SESSION['username'];
                $query = "SELECT * FROM tb_jadwal WHERE nim='$nim' LIMIT 3";
                $no = 1;
                $result = $koneksi->query($query);
                $counter = 0;
                while ($row = $result->fetch_array()) {
                    $counter++;
                    $class = '';
                    if ($counter == 1) {
                        $class = 'card ptRed';
                    } elseif ($counter == 2) {
                        $class = 'card ptGreen';
                    } elseif ($counter == 3) {
                        $class = 'card ptBlue';
                    }
                    $nip = $row['nip'];
                    $id_matkul = $row['id_matkul']; ?>
                    <div class="<?php echo $class ?>" >
                        <?php
                        $query_matkul = mysqli_query($koneksi, "SELECT * FROM tb_matkul WHERE id_matkul = $id_matkul");
                        while ($datamatkul = mysqli_fetch_array($query_matkul)) { ?>
                            <h6><?php echo $datamatkul['matkul'] ?></h6>
                        <?php } ?>
                        <hr>
                        <?php
                                $query_dosen = mysqli_query($koneksi, "SELECT * FROM tb_dosen WHERE nip = $nip");
                                while ($datadosen = mysqli_fetch_array($query_dosen)) { ?>
                        <h5><?php echo $datadosen['nama_dosen'] ?></h5>
                        <?php } ?>
                        <p><i class="ri-calendar-todo-fill"></i><?php echo $row['hari']?></p>
                        <p><i class="ri-time-line"></i><?php echo $row['jam']?></p>
                        <div class="play">
                            <a href="#"><i class="ri-play-fill"></i></a>
                        </div>
                    </div><!-- card -->
                <?php } ?>
            </div><!-- cardMatkul -->
        </div><!-- listclass -->

        <div class="section2">
            <div class="matkul col-12" style="padding: 0">
                <div class="d-flex justify-content-between">
                    <p><b>Daftar</b> Mata Kuliah</p>
                    <a href="matkul.php" style="font-size: 15px;">Lihat Semua</a>
                    
                </div>
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
                        $nim = $_SESSION['username'];
                        $query = "SELECT * FROM tb_jadwal WHERE nim='$nim' LIMIT 3" ;
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
                                    <a href="tugas.php?id=<?php echo $row['id_jadwal'] ?>" class="text-blue">Tugas</a>|
                                    <a href="materi.php?id=<?php echo $row['id_jadwal'] ?>"class="text-darkblue">Materi</a>
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