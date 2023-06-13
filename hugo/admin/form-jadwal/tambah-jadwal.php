<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Tambah Jadwal</title>
</head>

<body>

  <div class="container" style="margin-top: 80px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            TAMBAH JADWAL
          </div>
          <div class="card-body">
            <form action="../aksi/aksi-tambah.php?tambah=jadwal" method="POST">

              <div class="form-group">
                <label>Hari</label>
                <input type="text" name="hari" placeholder="Masukkan Hari" class="form-control">
              </div>
              <div class="form-group">
                <label>Mulai</label>
                <input type="time" name="mulai" class="form-control" placeholder="Nama Tugas...">
              </div>
              <div class="form-group">
                <label>Selesai</label>
                <input type="time" name="selesai" class="form-control" placeholder="Nama Tugas...">
              </div>
              <!-- <option value=""></option> -->
              <div class="form-group">
                <label>Mata Kuliah</label>
                <select name="matkul" class="form-control">
                  <?php
                  include '../../config.php';
                  $matkul = mysqli_query($koneksi, "SELECT * FROM tb_matkul");
                  while ($datamatkul = mysqli_fetch_array($matkul)) {
                    echo "<option value='$datamatkul[id_matkul]'>$datamatkul[matkul]</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label>Kelas</label>
                <select name="kelas" class="form-control">
                  <option value="A">Kelas A</option>
                  <option value="B">Kelas B</option>
                  <option value="C">Kelas C</option>
                </select>
              </div>

              <div class="form-group">
                <label>Dosen</label>
                <select name="dosen" class="form-control">
                  <?php
                  include '../../config.php';
                  $dosen = mysqli_query($koneksi, "SELECT * FROM tb_dosen");
                  while ($datadosen = mysqli_fetch_array($dosen)) {
                    echo "<option value='$datadosen[nip]'>$datadosen[nama_dosen]</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label>Mahasiswa</label>
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nim</th>
                      <th>Nama</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include '../../config.php';
                    $mahasiswa = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa");
                    while ($datamhs = mysqli_fetch_array($mahasiswa)) { ?>
                      <tr>
                        <td><input type="checkbox" name="mahasiswa[]" value="<?php echo $datamhs['nim'] ?>"></td>
                        <td><?php echo $datamhs['nim']; ?></td>
                        <td><?php echo $datamhs['nama_mhs']; ?></td>
                      </tr>

                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <button type="submit" class="btn btn-success">SIMPAN</button>
              <button type="reset" class="btn btn-warning">RESET</button>

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