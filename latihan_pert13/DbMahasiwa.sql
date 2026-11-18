-- Database tugas Pemrograman Web 2 Pertemuan 13
CREATE DATABASE IF NOT EXISTS db_mahasiswa
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_mahasiswa;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id_mahasiswa VARCHAR(6) NOT NULL,
    nama VARCHAR(30) NOT NULL,
    jurusan VARCHAR(50) NOT NULL,
    alamat VARCHAR(30) NOT NULL,
    telepon VARCHAR(12) NOT NULL,
    PRIMARY KEY (id_mahasiswa)
) ENGINE=InnoDB;
