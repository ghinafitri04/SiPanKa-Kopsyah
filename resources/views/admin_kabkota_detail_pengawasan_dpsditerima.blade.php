<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dpspengawasanditerima.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Pengawasan Diterima</title>
</head>

<body>
  @include('layouts.admin_kabkota_sidebar')
  @include('layouts.admin_kabkota_navbar')
  <script src="{{asset('js/script.js')}}"></script>
  
  <div class="content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <strong>Manajemen DPS / Pengawasan DPS</strong>
            <div class="dashboard-subtitle">
              <p><strong>Nama:</strong> Ghina</p>
            </div>
          </div>
        </div>
      </div>

<!-- Box untuk Laporan Hasil Pengawasan DPS -->
<div class="dashboard-box" style="padding: 20px; border: 1px solid #d3d3d3; border-radius: 10px; max-height: 460px; overflow: auto;"> <!-- Tambahkan max-height untuk mengatur tinggi maksimal dan overflow: auto; untuk membuat scroll jika kontennya panjang -->
    <h2 style="text-align: center; font-weight: bold; margin-top: 0; margin-bottom: 20px;">Formulir Laporan Hasil Pengawasan DPS</h2>
    
    <!-- Tanggal Pengawasan dan Kolomnya -->
    <div style="display: flex; justify-content: space-between;">
      <div style="width: 48%; float: left; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; background-color: #f8f9fa;"> <!-- Ganti background color sesuai kebutuhan -->
        <p style="font-weight: bold; margin-bottom: 5px;">Tanggal Pengawasan:</p>
        <p style="margin: 0;">Data dari Database</p>
      </div>
      
      <!-- Periode dan Kolomnya (untuk menampilkan data) -->
      <div style="width: 48%; float: right; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; background-color: #f8f9fa; "> <!-- Ganti background color sesuai kebutuhan -->
        <p style="font-weight: bold; margin-bottom: 5px;">Periode:</p>
        <p style="margin: 0;">Data dari Database</p>
      </div>
    </div>

    <div style="width: 100%; float: left; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; background-color: #f8f9fa; margin-top: 20px"> <!-- Ganti background color sesuai kebutuhan -->
        <p style="font-weight: bold; margin-bottom: 5px;">Hasil:</p>
        <p style="margin: 0;">Data dari Database</p>
    </div>

    <div style="width: 100%; float: left; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; background-color: #f8f9fa; margin-top: 20px"> <!-- Ganti background color sesuai kebutuhan -->
        <p style="font-weight: bold; margin-bottom: 5px;">Permasalahan:</p>
        <p style="margin: 0;">Data dari Database</p>
    </div>

    <div style="width: 100%; float: left; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; background-color: #f8f9fa; margin-top: 20px"> <!-- Ganti background color sesuai kebutuhan -->
        <p style="font-weight: bold; margin-bottom: 5px;">Saran:</p>
        <p style="margin: 0;">Data dari Database</p>
    </div>
</div>


<!-- Kolom untuk Komentar Pengguna -->
<div class="user-comment-column" style="padding: 20px; border: 1px solid #d3d3d3; border-radius: 10px; max-height: 200px; overflow: auto;">
  <h2 style="font-size: 18px; color: #07170b; margin-bottom: 10px;">Komentar Pengguna</h2>

  <!-- Textarea for Adding New Comment -->
  <div class="comment-box" style="width: 100%; display: flex; align-items: center; float: left; padding: 0px; margin-bottom: 20px;">
    <textarea placeholder="Tambahkan komentar/saran" style="width: 100%; height: 50px; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; margin-right: 10px; resize: none;"></textarea>
    <img src="/img/Send Icon.png" width="20" height="20" alt="Kirim" style="cursor: pointer; margin-top: 5px;">
  </div>
  
  <!-- Sample User Comment (replace with dynamic content from the backend) -->
  <hr style="border: 1px solid #d3d3d3; margin: 10px 0;">
  <div class="comment-info">
    <p style="font-size: 14px; font-weight: bold; margin: 5px 0;">Nama: Pengguna Satu | <span style="font-size: 13px;">21 Januari 2024</span></p>
    <p style="font-size: 14px; margin: 0;">Ini komentar dari pengguna satu</p>
  </div>
</div>
</div>

<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
