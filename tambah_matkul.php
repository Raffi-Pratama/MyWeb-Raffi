<?php
require_once 'koneksi.php';

$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_mk  = trim($_POST['kode_mk'] ?? '');
    $nama_mk  = trim($_POST['nama_mk'] ?? '');
    $sks      = trim($_POST['sks'] ?? '');
    $semester = trim($_POST['semester'] ?? '');
    $id_dosen = trim($_POST['id_dosen'] ?? '');

    if (!empty($kode_mk) && !empty($nama_mk) && !empty($sks) && !empty($semester)) {
        try {
            $sql  = "INSERT INTO mata_kuliah (kode_mk, nama_mk, id_dosen, sks, semester) 
                     VALUES (:kode_mk, :nama_mk, :id_dosen, :sks, :semester)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'kode_mk'  => $kode_mk,
                'nama_mk'  => $nama_mk,
                'id_dosen' => !empty($id_dosen) ? $id_dosen : NULL,
                'sks'      => $sks,
                'semester' => $semester
            ]);
            
            header("Location: mata-kuliah.php");
            exit;
        } catch (PDOException $e) {
            $pesan = "Gagal menambah data: " . $e->getMessage();
        }
    } else {
        $pesan = "Semua field utama wajib diisi!";
    }
}
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Mata Kuliah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm border-0">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Mata Kuliah</h4>
          </div>
          <div class="card-body">
            <?php if (!empty($pesan)): ?>
              <div class="alert alert-danger"><?= $pesan; ?></div>
            <?php endif; ?>

            <form action="" method="POST">
              <div class="mb-3">
                <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                <input type="text" name="kode_mk" id="kode_mk" class="form-control" required placeholder="Contoh: ICT015">
              </div>
              <div class="mb-3">
                <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                <input type="text" name="nama_mk" id="nama_mk" class="form-control" required placeholder="Contoh: Pemrograman Web Lanjut">
              </div>
              <div class="mb-3">
                <label for="id_dosen" class="form-label">ID Dosen (Opsional)</label>
                <input type="number" name="id_dosen" id="id_dosen" class="form-control" placeholder="Contoh: 1, 2, atau 101">
              </div>
              <div class="mb-3">
                <label for="sks" class="form-label">SKS</label>
                <input type="number" name="sks" id="sks" class="form-control" required min="1" max="6">
              </div>
              <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="number" name="semester" id="semester" class="form-control" required min="1" max="8">
              </div>
              <div class="d-flex justify-content-between">
                <a href="mata-kuliah.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>