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
            $jadwal = "SELECT * FROM tb_jadwal WHERE id_jadwal=$id";
            $result = $koneksi->query($jadwal);
            $row = $result->fetch_array();
            $id_jadwal = $row['id_jadwal'];
            $id_matkul = $row['id_matkul'];
            $kelas = $row['kelas'];

            $matkul = "SELECT * FROM tb_matkul WHERE id_matkul=$id_matkul";
            $result_matkul = $koneksi->query($matkul);
            $row_matkul = $result_matkul->fetch_array()

            ?>
            <div class="menu d-flex">
                <h3 style="padding-right: 10px;"><?php echo $row_matkul['matkul'] . " - " . $row['kelas'] ?></h3>
                <a href="kelas.php">Kembali</a>
            </div><!-- menu -->
        </div><!-- nav -->

        <div class="back">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../kelas.html">Kelas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tugas</li>
            </ol>
        </div><!-- back -->

        <div class="section2">
            <div class="matkul col-12" style="padding: 0">
                <div class="d-flex justify-content-between">
                    <p><b>Daftar</b> Tugas</p>
                    <a href="form-tugas.php?id=<?php echo $id_jadwal ?>" style="font-size: 15px;" class="n-underline text-darkblue d-flex align-items-center">
                        <i class="ri-add-line"></i> Tambah Tugas Baru
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">Mata Kuliah</th>
                            <th class="text-left">Kelas</th>
                            <th class="text-left">Tugas</th>
                            <th class="text-left">Tenggat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config.php';
                        $query = "SELECT * FROM tb_tugas WHERE id_matkul=$id_matkul AND kelas='$kelas'";
                        $no = 1;
                        $result = $koneksi->query($query);
                        while ($row = $result->fetch_array()) { ?>
                            <tr>
                                <td class="text-left"><?php echo $no++ ?></td>
                                <?php
                                $matkul = mysqli_query($koneksi, "SELECT * FROM tb_matkul WHERE id_matkul = $id_matkul");
                                while ($datamatkul = mysqli_fetch_array($matkul)) { ?>
                                    <td class="text-left"><?php echo $datamatkul['matkul'] ?></td>
                                <?php
                                }
                                ?>
                                <td class="text-left"><?php echo $row['kelas'] ?></td>
                                <td class="text-left"><?php echo $row['nama_tugas'] ?></td>
                                <td class="text-left"><?php echo $row['tanggal']  . ' | ' . $row['waktu'] ?></td>
                                <td>
                                    <a href="detail-tugas.php?id=<?php echo $id_jadwal ?>&id_tugas=<?php echo $row['id_tugas'] ?>" class="text-blue">Detail</a> | <a href="aksi/aksi-delete.php?hapus=tugas&id=<?php echo $row['id_tugas']; ?>&id_jadwal=<?php echo $id_jadwal ?>" class="text-red">Hapus</a>
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