<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyWeb</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">MyWeb</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mata-kuliah.php">Mata Kuliah</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten Utama Halaman -->
  <main class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <div class="card shadow-sm border-0 p-4">
          <h2 class="fw-bold text-primary">Selamat Datang di MyWeb</h2>
          <p class="text-muted">Sistem Pengelolaan Data Mata Kuliah</p>
          <div class="mt-3">
            <a href="mata-kuliah.php" class="btn btn-primary btn-lg">Kelola Mata Kuliah</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>