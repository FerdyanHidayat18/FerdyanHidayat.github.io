CREATE DATABASE baruku;

USE baruku;

CREATE TABLE tb_dosen (
  nip INT PRIMARY KEY,
  nama_dosen VARCHAR(50) NOT NULL,
  alamat VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  no_telp VARCHAR(50) NOT NULL
);

CREATE TABLE tb_mahasiswa (
  nim INT PRIMARY KEY,
  nama_mhs VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  alamat VARCHAR(50) NOT NULL,
  no_telp VARCHAR(50) NOT NULL
);

CREATE TABLE  tb_matkul (
  id_matkul INT PRIMARY KEY,
  matkul VARCHAR(50) NOT NULL
);

CREATE TABLE tb_jadwal (
  id_jadwal INT PRIMARY KEY,
  hari VARCHAR(50) NOT NULL,
  jam VARCHAR(50) NOT NULL,
  kelas VARCHAR(50) NOT NULL,
  nip INT,
  nim INT,
  id_matkul INT,
  CONSTRAINT FK_tb_jadwal_tb_dosen FOREIGN KEY (nip) REFERENCES tb_dosen(nip) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_tb_jadwal_tb_mahasiswa FOREIGN KEY (nim) REFERENCES tb_mahasiswa(nim) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_tb_jadwal_tb_matkul FOREIGN KEY (id_matkul) REFERENCES tb_matkul(id_matkul) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE tb_materi (
  id_materi INT PRIMARY KEY,
  kelas VARCHAR(50) NOT NULL,
  nama_materi VARCHAR(50) NOT NULL,
  deskripsi VARCHAR(50) NOT NULL,
  tanggal VARCHAR(50) NOT NULL,
  waktu VARCHAR(50) NOT NULL,
  id_matkul INT,
  CONSTRAINT FK_tb_materi_tb_matkul FOREIGN KEY (id_matkul) REFERENCES tb_matkul(id_matkul) ON DELETE NO ACTION ON UPDATE NO ACTION
);


CREATE TABLE tb_tugas (
  id_tugas INT PRIMARY KEY,
  kelas VARCHAR(50) NOT NULL,
  nama_tugas VARCHAR(50) NOT NULL,
  deskripsi VARCHAR(50) NOT NULL,
  tanggal VARCHAR(50) NOT NULL,
  waktu VARCHAR(50) NOT NULL,
  id_matkul INT,
  CONSTRAINT FK_tb_tugas_tb_matkul FOREIGN KEY (id_matkul) REFERENCES tb_matkul(id_matkul) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE tb_user (
  username VARCHAR(50) PRIMARY KEY,
  level VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL
);


-- Insert data into tb_dosen
INSERT INTO tb_dosen (nip, nama_dosen, alamat, email, no_telp) VALUES
(789013, 'Jansen Wiratama, S.Kom., M.Kom. ', 'Tangerang', 'jansen@gmail.com', '082222222222'),
(789012, 'Haditya Setiawan, S.Kom.,M.M.S.I', 'Tangerang', 'haditya@gmail.com', '085555555555');

-- Insert data into tb_mahasiswa
INSERT INTO tb_mahasiswa (nim, nama_mhs, email, alamat, no_telp) VALUES
(72575, 'Ferdyan Hidayat', 'ferdyan@gmail.com', 'Tangerang', '082218579945'),
(71997, 'Rivaldo Yosia', 'rivaldo@gmail.com', 'Tangerang', '081380734442');

-- Insert data into tb_matkul
INSERT INTO tb_matkul (id_matkul, matkul) VALUES
(1, 'Database System'),
(2, 'Web Design and Development');

-- Insert data into tb_jadwal
INSERT INTO tb_jadwal (id_jadwal, hari, jam, kelas, nip, nim, id_matkul) VALUES
(1, 'Monday', '08:00 AM', 'A101', 789013, 72575, 1),
(2, 'Tuesday', '10:00 AM', 'B202', 789012, 71997, 2);

-- Insert data into tb_materi
INSERT INTO tb_materi (id_materi, kelas, nama_materi, deskripsi, tanggal, waktu, id_matkul) VALUES
(1, 'A101', 'Architectures & The Relational', 'Basic Architectures & The Relational', '2023-06-01', '08:00 AM', 1),
(2, 'B202', 'Framework', 'Framework Laravel ', '2023-06-02', '10:00 AM', 2);

-- Insert data into tb_tugas
INSERT INTO tb_tugas (id_tugas, kelas, nama_tugas, deskripsi, tanggal, waktu, id_matkul) VALUES
(1, 'A101', 'Homework 1', 'Complete exercises 1-5', '2023-06-03', '09:00 AM', 1),
(2, 'B202', 'Website', 'create a website using laravel framework', '2023-06-04', '10:30 AM', 2);

-- Insert data into tb_user
INSERT INTO tb_user (username, level, password) VALUES
('SIA', 'admin', 'admin123'),
('Ferdyan Hidayat', 'mahasiswa', 'pass123'),
('Jansen Wiratama' , 'dosen','password')




CREATE VIEW view_jadwal_materi_tugas AS
SELECT j.id_jadwal, j.hari, j.jam, j.kelas, d.nama_dosen, m.matkul, COUNT(materi.id_materi) AS jumlah_materi, COUNT(tugas.id_tugas) AS jumlah_tugas
FROM tb_jadwal j
JOIN tb_dosen d ON j.nip = d.nip
JOIN tb_matkul m ON j.id_matkul = m.id_matkul
LEFT JOIN tb_materi materi ON j.id_matkul = materi.id_matkul AND j.kelas = materi.kelas
LEFT JOIN tb_tugas tugas ON j.id_matkul = tugas.id_matkul AND j.kelas = tugas.kelas
GROUP BY j.id_jadwal, j.hari, j.jam, j.kelas, d.nama_dosen, m.matkul;
SELECT * FROM view_jadwal_materi_tugas;



CREATE VIEW view_jadwalmateritugas AS
SELECT j.id_jadwal, j.hari, j.jam, j.kelas, d.nama_dosen, m.matkul, 
  (SELECT COUNT(*) FROM tb_materi mt WHERE mt.id_matkul = j.id_matkul AND mt.kelas = j.kelas) AS jumlah_materi,
  (SELECT COUNT(*) FROM tb_tugas t WHERE t.id_matkul = j.id_matkul AND t.kelas = j.kelas) AS jumlah_tugas
FROM tb_jadwal j
JOIN tb_dosen d ON j.nip = d.nip
JOIN tb_matkul m ON j.id_matkul = m.id_matkul;
SELECT * FROM view_jadwalmateritugas;


CREATE VIEW view_dosen_mahasiswa_matkul_tugas AS
SELECT d.nip, d.nama_dosen, m.nim, m.nama_mhs, k.id_matkul, k.matkul, COUNT(t.id_tugas) AS jumlah_tugas
FROM tb_dosen d
JOIN tb_jadwal j ON d.nip = j.nip
JOIN tb_mahasiswa m ON j.nim = m.nim
JOIN tb_matkul k ON j.id_matkul = k.id_matkul
LEFT JOIN tb_tugas t ON j.id_matkul = t.id_matkul AND j.kelas = t.kelas
GROUP BY d.nip, d.nama_dosen, m.nim, m.nama_mhs, k.id_matkul, k.matkul;
SELECT * FROM view_dosen_mahasiswa_matkul_tugas;
