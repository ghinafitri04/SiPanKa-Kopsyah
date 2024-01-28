<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css"> <!-- Hubungkan dengan file CSS eksternal jika diperlukan -->
  <!-- Bootstrap CSS (jika menggunakan Bootstrap) -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->

  <title>Sipanka KopSyah - Landing Page</title>

<style>
  h4 {
    font-size: 20px !important; /* Gunakan !important untuk memastikan prioritas tertinggi */
  }

.dashboard-title {
    font-size: 8px; /* Sesuaikan dengan ukuran yang diinginkan */
    margin-left: 120px; /* Sesuaikan dengan margin kiri yang diinginkan */
  }

    /* Tambahkan gaya CSS di sini */
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
    }

    .navbar {
      border-color: rgb(255, 255, 255); /* Warna border navbar */
      background-color: #28A745; /* Warna latar belakang navbar */
    }

    .navbar-brand, .navbar-nav .nav-link {
      color: white; /* Warna teks putih untuk brand dan link navbar */
    }

      .navbar-brand img {
      margin-right: 10px; /* Jarak antara gambar dan teks brand */
      max-height: 45px; /* Sesuaikan tinggi maksimal gambar sesuai kebutuhan */
    }
    .center-text {
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 75px; 
    }

    .center-text img{
        max-height: 35px;
        margin-right: 10px;
    }

    .center-text h2 {
      font-size: 16px;
      color: black;
      margin-top: 0;
      margin-bottom: 5px;
      text-align: left;
    }
    .dashboard-title {
      font-size: 8px;
      margin-left: 120px;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .dashboard-title h4 {
      font-size: 20px;
      margin: 0 0 10px 0; /* Tambahkan margin bawah */
    }

    .dashboard-subtitle {
      font-size: 16px; /* Sesuaikan dengan ukuran yang diinginkan */
      margin-top: 5px; /* Tambahkan margin atas */
    }

    .dashboard-subtitle strong {
      font-weight: bold; /* Membuat teks dalam tag strong menjadi bold */
    }

    .dashboard-box {
        background-color: #ffffff; /* Warna latar belakang box (putih) */
        padding: 20px; /* Padding di dalam box */
        margin-top: 10px; /* Margin atas dari box */
        margin-left: 255px;
        margin-right: 2cm;
        border: 1px solid rgba(128, 128, 128, 0.3); /* Warna garis tepi (outline) abu-abu samar-samar */
        height: 545px; /* Tinggi box sejauh 200 piksel, sesuaikan sesuai kebutuhan Anda */
    }

    .dashboard-box h2 {
      font-size: 18px;
      color: #07170b; /* Warna teks judul box */
      margin-bottom: 10px;
    }

    .additional-info {
      margin-top: 3cm; /* Margin atas dari box */
    }

    /* .comment-box {
        width: 100%;
        float: left;
        padding: 0px;
    } */

    .comment-info {
        font-size: 14px;
        margin-top: 20px; /* Adjust this value as needed */
        margin-bottom: 3px;
    }

    .comment-name {
        font-weight: bold;
        margin: 5px 0;
    }

    .comment-date {
        margin: 0;
    }

    .comment-content {
        margin: 5px 0;
    }

    .comment-divider {
        border: 1px solid #d3d3d3;
        margin: 10px 0;
    }

    
    .user-comment-column {
        background-color: #ffffff; /* Warna latar belakang box (putih) */
        padding: 20px; /* Padding di dalam box */
        margin-top: 10px; /* Margin atas dari box */
        margin-left: 255px;
        margin-right: 2cm;
        border: 1px solid rgba(128, 128, 128, 0.3); /* Warna garis tepi (outline) abu-abu samar-samar */
        height: 545px; /* Tinggi box sejauh 200 piksel, sesuaikan sesuai kebutuhan Anda */
    }
</style>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/img/logo_sumbar.png"> <!-- Ganti dengan path dan nama gambar Anda -->
            Sipanka KopSyah
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
      
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <h4>Dashboard / Manajemen DPS / Pengawasan DPS</h4>
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
    <img src="/img/send-icon.png" width="20" height="20" alt="Kirim" style="cursor: pointer; margin-top: 5px;">
  </div>
  
  <!-- Sample User Comment (replace with dynamic content from the backend) -->
  <hr style="border: 1px solid #d3d3d3; margin: 10px 0;">
  <div class="comment-info">
    <p style="font-size: 14px; font-weight: bold; margin: 5px 0;">Nama: Pengguna Satu | <span style="font-size: 13px;">21 Januari 2024</span></p>
    <p style="font-size: 14px; margin: 0;">Ini komentar dari pengguna satu</p>
  </div>
</div>


<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
