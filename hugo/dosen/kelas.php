<?php
include 'header.php'
?>
<div class="mainside" style="margin-top:-50px">
    <div class="container">
        <div class="nav">
            <div class="greeting">
                <p style="margin-right: 10px;"><b>Hai,</b> <?php echo $row["nama_dosen"] ?>!</p>
            </div><!-- greeting -->
            <div class="menu d-flex">
                <a href="index.php">Kembali</a>
            </div><!-- menu -->
        </div><!-- nav -->


        <div class="section2">
            <div class="daftar-kelas col-12">
                <div class="d-flex justify-content-between" style="padding: 0 10px;">
                    <p><b>Daftar</b> Kelas</p>
                    <!-- <a class="underline" href="page/semuaKelas.html" style="font-size: 15px;">Lihat Semua</a> -->
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Mata Kuliah</th>
                            <th class="text-left">Kelas</th>
                            <th class="text-left">Mahasiswa</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config.php';
                        $id = $_SESSION['username'];
                        $query = "SELECT * FROM tb_jadwal WHERE nip='$id' GROUP BY id_matkul, kelas";
                        $no = 1;
                        $result = $koneksi->query($query);
                        while ($row = $result->fetch_array()) {
                            $id_matkul = $row['id_matkul'];
                            $kelas = $row['kelas'];
                            $matkul = "SELECT * FROM tb_matkul WHERE id_matkul=$id_matkul";
                            $result_matkul = $koneksi->query($matkul);
                            $row_matkul = $result_matkul->fetch_array()
                        ?>
                            <tr>
                                <td class="text-left"><?php echo $no++ ?></td>
                                <td class="text-left"><?php echo $row_matkul['matkul'] ?></td>
                                <td class="text-left"><?php echo $row['kelas'] ?></td>
                                <td class="d-flex justify-content-start text-muted">
                                    <?php
                                    $qu = "SELECT COUNT(*) as total FROM tb_jadwal WHERE kelas='$kelas' AND id_matkul=$id_matkul";
                                    $r = $koneksi->query($qu);
                                    $re = $r->fetch_assoc();
                                    $jumlah = $re['total'];
                                    ?>
                                    <div class="userm user1"><i class="ri-user-3-line bg-green"></i></div><!-- user-->
                                    <div class="userm user2"><i class="ri-user-3-line bg-blue"></i></div><!-- user-->
                                    <div class="userm user3"><i class="ri-user-3-line bg-orange"></i></div><!-- user-->
                                    <div class="userm user4"><i class="ri-user-3-line bg-pink"></i></div><!-- user-->
                                    <a href="#" class="n-underline text-blue"> +<?php echo $jumlah?></a>
                                </td>
                                <td><u><a href="tugas.php?id=<?php echo $row['id_jadwal'] ?>">Tugas</a></u> | <u><a href="materi.php?id=<?php echo $row['id_jadwal'] ?>" class="text-darkblue">Materi</a></u></td>
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