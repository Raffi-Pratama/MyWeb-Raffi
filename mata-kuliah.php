<?php
require_once 'koneksi.php';

// --- LOGIKA HAPUS DATA (DELETE) ---
if (isset($_GET['aksi']) && $_GET['aksi'] === 'hapus' && !empty($_GET['id'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM mata_kuliah WHERE id = :id");
        $stmt->execute(['id' => $_GET['id']]);
        header("Location: mata-kuliah.php");
        exit;
    } catch (PDOException $e) {
        die("Gagal menghapus data: " . $e->getMessage());
    }
}

// --- LOGIKA BACA DATA (READ) ---
try {
    $stmt = $pdo->query("SELECT * FROM mata_kuliah");
    $daftar_matkul = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Gagal mengambil data mata kuliah: " . $e->getMessage());
}
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Mata Kuliah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="row align-items-center mb-3">
<div class="col-6">
    <h1>Daftar Mata Kuliah</h1>
</div>
<div class="col-6 text-end">
    <!-- Tombol Kembali ke Beranda -->
    <a href="index.php" class="btn btn-outline-secondary me-2">Kembali ke Beranda</a>
    <!-- Tombol Tambah Data -->
    <a href="tambah_matkul.php" class="btn btn-primary">Tambah Mata Kuliah</a>
</div>
</div>
  <div class="container mt-4">
    <div class="row align-items-center mb-3">
      <div class="col-6">
        <h1>Daftar Mata Kuliah</h1>
      </div>
      <div class="col-6 text-end">
        <a href="tambah_matkul.php" class="btn btn-primary">Tambah Mata Kuliah</a>
      </div>
    </div>

    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode Matkul</th>
          <th scope="col">Nama Mata Kuliah</th>
          <th scope="col">ID Dosen</th>
          <th scope="col">SKS</th>
          <th scope="col">Semester</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($daftar_matkul)): ?>
          <?php $no = 1; ?>
          <?php foreach ($daftar_matkul as $row): ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= htmlspecialchars($row['kode_mk']); ?></td>
              <td><?= htmlspecialchars($row['nama_mk']); ?></td>
              <td><?= htmlspecialchars($row['id_dosen'] ?? '-'); ?></td>
              <td><?= htmlspecialchars($row['sks']); ?></td>
              <td><?= htmlspecialchars($row['semester']); ?></td>
              <td class="text-center">
                <a href="edit_matkul.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="mata-kuliah.php?aksi=hapus&id=<?= $row['id']; ?>" 
                   class="btn btn-danger btn-sm" 
                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="text-center">Belum ada data mata kuliah.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>