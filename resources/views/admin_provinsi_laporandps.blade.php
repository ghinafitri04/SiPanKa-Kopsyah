<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> 
  <link rel="stylesheet" href="{{ asset('css/laporandps.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

  <title>Sipanka KopSyah - Landing Page</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/img/logo_sumbar.png"> 
            Sipanka KopSyah
            </a>
            <button class="navbar-toggler" 
            type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
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


<div class="dashboard-box"> 
    <h2>Formulir Laporan Hasil Pengawasan DPS</h2>

    <div class="coment-column">
      <div class="box-coment">
        <p>Tanggal Pengawasan:</p>
        <p-child>Data dari Database</p-child>
      </div>
    
    <div class="coment-column2">
        <p>Periode:</p>
        <p-child>Data dari Database</p-child>
      </div>
    </div>

    <div class="coment-column3">
        <p>Hasil:</p>
        <p-child>Data dari Database</p-child>
    </div>

    <div class="coment-column4">
        <p>Permasalahan:</p>
        <p-child >Data dari Database</p-child>
    </div>

    <div class="coment-column5">
        <p>Saran:</p>
        <p-child>Data dari Database</p-child>
    </div>
</div>

<div class="user-comment-column">

  <h2 style="font-size: 18px; color: #07170b; margin-bottom: 10px;">Komentar Pengguna</h2>

  <div class="comment-box">
    <textarea placeholder="Tambahkan komentar/saran"></textarea>
    <img src="/img/Send Icon.png" width="20" height="20" alt="Kirim" >
  </div>
  
  <hr>
  <div class="comment-info">
    <p>Nama: Pengguna Satu | <span>21 Januari 2024</span></p>
    <p>Ini komentar dari pengguna satu</p>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>