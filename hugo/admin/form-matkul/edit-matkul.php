<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Mata Kuliah</title>
</head>

<body>

  <div class="container" style="margin-top: 80px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT MATA KULIAH
          </div>
          <div class="card-body">
            <form action="../aksi/aksi-edit.php?edit=matkul" method="POST">
              <?php

              include "../../config.php";
              $id = $_GET['id'];
              $query = mysqli_query($koneksi, "SELECT * FROM tb_matkul WHERE id_matkul=$id");
              while ($row = mysqli_fetch_array($query)) { ?>
              
                <div class="form-group">
                  <input hidden type="text" name="id_matkul" class="form-control" value="<?php echo $row['id_matkul']; ?>">
                  <label>Nama Lengkap</label>
                  <input type="text" name="matkul" placeholder="Masukkan Nama" class="form-control" value="<?php echo $row['matkul']; ?>">
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>
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