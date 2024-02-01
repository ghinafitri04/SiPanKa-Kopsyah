<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/konversi_tahap1.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <title>Sipanka KopSyah - Konversi Koperasi</title>
</head>

<body>
    @include('layouts.sidebar')
    @include('layouts.navbar')

    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/konversi_tahap1.js')}}"></script>

    <div class="content">
        <div class="container mt-5">
          <div class="d-flex justify-content-between align-items-center">
            <div class="dashboard-title">
              <h4>Dashboard/Manajemen Koperasi/Konversi Koperasi</h4>
              <div class="dashboard-subtitle">
                <p><strong>Nama Koperasi:</strong> <strong> Budi Luhur</strong></p>
              </div>
            </div>
            <div class="text-right">
              <p><strong>Nama DPS:</strong> <strong>Ghina Fitri</strong></p>
            </div>
          </div>
        </div>
    

        <div class="container mt-5 custom-large-box">
            <div class="row">
              <div class="col-lg-12">
                <div class="card custom-card">
                  <!-- Grid System: Back Button -->
                  <div class="row">
                    <div class="col-12 text-left ml-0">
                        <a href="/konversi-koperasi" id="btnKembali" class="btn btn-primary">Kembali</a>
                      </div>
                  </div>
    
                  <div class="card-body">
                    <h5 class="card-title">Tahap 1: </h5>
                    <p class="card-text text-center">Rapat Anggota Perubahan </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</body>
</html>