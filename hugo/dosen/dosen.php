<?php
    include 'header.php' 
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    DETAIL DOSEN
                </div>
                <div class="card-body">
                    <form action="../aksi/aksi-tambah.php?tambah=dosen" method="POST">
                        <?php
                        include "../config.php";
                        $id = $_SESSION['username'];
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_dosen WHERE nip=$id");
                        while ($row = mysqli_fetch_array($query)) { ?>
                            <div class="form-group">
                                <input hidden type="text" name="nip" class="form-control" value="<?php echo $row['nip']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" readonly placeholder="Masukkan Nama" class="form-control" value="<?php echo $row['nama_dosen']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" readonly class="form-control" name="alamat" rows="4" value="<?php echo $row['alamat']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" readonly name="email" placeholder="Masukkan Email" class="form-control" value="<?php echo $row['email']; ?>">
                            </div>

                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" readonly name="notelp" placeholder="Masukkan No Telepon" class="form-control" value="<?php echo $row['no_telp']; ?>">
                            </div>

                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>