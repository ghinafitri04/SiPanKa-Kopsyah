<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/detailpengawasandps.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Detail Pengawasan DPS</title>
</head>
<body>

  @include('layouts.admin_kabkota_sidebar')
  @include('layouts.admin_kabkota_navbar')
  <script src="{{ asset('js/script.js') }}"></script>

  <div class="content">
    <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center">
        <div class="dashboard-title">
          <strong>Manajemen DPS / Pengawasan DPS</strong>
          <div class="dashboard-subtitle">
            <p><strong>Nama:</strong> Amaliaaaaaaaa</p>
            <p>Daftar Koperasi</p>
          </div>
        </div>
      </div>

      <!-- Kotak-kotak kumpulan -->
      <div class="container">
        <!-- Kotak pertama -->
        <div class="box">
          <img src="/img/gambar_koperasi.png" alt="Koperasi A" class="custom-image">
          <div class="details">
            <h5>Koperasi Budi Luhur</h5>
            <a href="/detail-kabkotapengawasankoperasi" class="detail-button">Detail</a>
          </div>
        </div>

        <!-- Kotak kedua -->
        <div class="box">
          <img src="/img/gambar_koperasi.png" alt="Koperasi B" class="custom-image">
          <div class="details">
            <h5>Koperasi Budi Luhur</h5>
            <a href="/detail-kabkotapengawasankoperasi" class="detail-button">Detail</a>
          </div>
        </div>

        <!-- Kotak ketiga -->
        <div class="box">
          <img src="/img/gambar_koperasi.png" alt="Koperasi C" class="custom-image">
          <div class="details">
            <h5>Koperasi Budi Luhur</h5>
            <a href="/detail-kabkotapengawasankoperasi" class="detail-button">Detail</a>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  <!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
