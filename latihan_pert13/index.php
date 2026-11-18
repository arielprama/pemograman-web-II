<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Input Data Mahasiswa</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 35px 15px; background: #f3f5f8; font-family: Arial, sans-serif; color: #263238; }
        .container { max-width: 760px; margin: auto; background: white; padding: 28px; border-radius: 10px; box-shadow: 0 4px 18px #00000012; }
        h2 { margin: 0 0 8px; color: #e58b20; font-size: 22px; }
        .desc { margin: 0 0 24px; color: #667085; font-size: 14px; }
        .field { display: grid; grid-template-columns: 190px 1fr; gap: 14px; align-items: center; margin: 15px 0; }
        label { font-size: 14px; font-weight: 600; }
        input, select { width: 100%; padding: 11px; border: 1px solid #ccd2da; border-radius: 6px; font-size: 14px; }
        input:focus, select:focus { outline: 2px solid #f5c987; border-color: #e58b20; }
        .actions { margin: 24px 0 0 204px; display: flex; gap: 10px; }
        button { border: 0; border-radius: 6px; padding: 11px 20px; cursor: pointer; font-weight: 600; }
        .submit { background: #e58b20; color: white; }
        .reset { background: #e9edf2; color: #344054; }
        .message { padding: 12px; border-radius: 6px; margin: 15px 0; font-size: 14px; }
        .success { background: #e8f7ed; color: #176b35; }
        .error { background: #fff0ed; color: #a33120; }
        @media(max-width: 560px) { .field { grid-template-columns: 1fr; gap: 7px; } .actions { margin-left: 0; } }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Input Data Mahasiswa</h2>
    <p class="desc">Masukkan data mahasiswa. Seluruh kolom wajib diisi.</p>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'berhasil'): ?>
        <div class="message success">Input data mahasiswa berhasil disimpan.</div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="message error">
            <?php
            $pesan = [
                'kosong' => 'Data harap dilengkapi!',
                'nim' => 'NIM sudah dipakai. Silakan gunakan NIM lain.',
                'gagal' => 'Input data gagal. Silakan periksa kembali.'
            ];
            echo htmlspecialchars($pesan[$_GET['error']] ?? 'Terjadi kesalahan.');
            ?>
        </div>
    <?php endif; ?>

    <form action="action-input-data.php" method="POST">
        <div class="field">
            <label for="id_mahasiswa">ID Mahasiswa / NIM</label>
            <input type="text" id="id_mahasiswa" name="id_mahasiswa" maxlength="6" required>
        </div>
        <div class="field">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" maxlength="30" required>
        </div>
        <div class="field">
            <label for="jurusan">Jurusan</label>
            <select id="jurusan" name="jurusan" required>
                <option value="">- Pilih Jurusan -</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                <option value="Komputer Akuntansi">Komputer Akuntansi</option>
            </select>
        </div>
        <div class="field">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" maxlength="30" required>
        </div>
        <div class="field">
            <label for="telepon">No. Telp</label>
            <input type="text" id="telepon" name="telepon" maxlength="12" required>
        </div>
        <div class="actions">
            <button class="submit" type="submit" name="Submit" value="Submit">Submit</button>
            <button class="reset" type="reset">Cancel</button>
        </div>
    </form>
</div>
</body>
</html>
