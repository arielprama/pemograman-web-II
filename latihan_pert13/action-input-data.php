<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST" || ($_POST["Submit"] ?? "") !== "Submit") {
    header("Location: index.php");
    exit;
}

$id_mahasiswa = trim($_POST["id_mahasiswa"] ?? "");
$nama         = trim($_POST["nama"] ?? "");
$jurusan      = trim($_POST["jurusan"] ?? "");
$alamat       = trim($_POST["alamat"] ?? "");
$telepon      = trim($_POST["telepon"] ?? "");

// Validasi data kosong seperti instruksi modul.
if ($id_mahasiswa === "" || $nama === "" || $jurusan === "" || $alamat === "" || $telepon === "") {
    header("Location: index.php?error=kosong");
    exit;
}

require_once "koneksi.php";

// Cek NIM agar tidak ada ID mahasiswa yang digunakan dua kali.
$cek = $Open->prepare("SELECT id_mahasiswa FROM mahasiswa WHERE id_mahasiswa = ?");
$cek->bind_param("s", $id_mahasiswa);
$cek->execute();
$hasil = $cek->get_result();

if ($hasil->num_rows > 0) {
    $cek->close();
    $Open->close();
    header("Location: index.php?error=nim");
    exit;
}
$cek->close();

// Simpan data ke tabel mahasiswa.
$input = $Open->prepare(
    "INSERT INTO mahasiswa (id_mahasiswa, nama, jurusan, alamat, telepon) VALUES (?, ?, ?, ?, ?)"
);
$input->bind_param("sssss", $id_mahasiswa, $nama, $jurusan, $alamat, $telepon);

if ($input->execute()) {
    $input->close();
    $Open->close();
    header("Location: index.php?status=berhasil");
    exit;
}

$input->close();
$Open->close();
header("Location: index.php?error=gagal");
exit;
?>
