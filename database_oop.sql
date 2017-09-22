USE projek_siswa

CREATE TABLE murid(foto VARCHAR(50),
id_mahasiswa VARCHAR(30)PRIMARY KEY NOT NULL,
nama VARCHAR(30),
tanggal_lahir DATE,
jenis_kelamin VARCHAR(30),
jurusan VARCHAR(30),
alamat VARCHAR(30));

INSERT INTO murid(foto, id_mahasiswa, nama, tanggal_lahir, jenis_kelamin, jurusan, alamat) VALUES ('123','06.2016.1.0028','tito bagus','1998-08-14','laki-laki','tenik informatika','jl bubutan dka 1 no 14');

INSERT INTO murid(foto, id_mahasiswa, nama, tanggal_lahir, jenis_kelamin, jurusan, alamat) VALUES ('100','06.2016.1.0027','bagus eko ','1998-08-31','laki-laki','tenik informatika','jl mleto no 14');

SELECT * FROM murid