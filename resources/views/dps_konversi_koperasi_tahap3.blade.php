<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/navbarsidebar_dps.css') }}">
  <link rel="stylesheet" href="{{ asset('css/konversi_tahap3.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Konversi Koperasi</title>
</head>

<body>
    @include('layouts.dps_sidebar')
    @include('layouts.dps_navbar')

    <script src="{{asset('js/script_dps.js')}}"></script>
    <script src="{{asset('js/konversi_tahap3.js')}}"></script>

    <div class="content">
        <div class="container mt-5">
          <div class="d-flex justify-content-between align-items-center">
            <div class="dashboard-title">
              <strong>Manajemen Koperasi / Konversi Koperasi</strong>
              <div class="dashboard-subtitle">
                <p><strong>Nama Koperasi:</strong> <strong> Koperasi Budi Luhur</strong></p>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">Tahap 3: </h5>
            <p class="card-text text-center">Proses PAD pada Notaris </p>
          </div>
        </div>
    

        <div class="container mt-5 custom-large-box">
            <div class="row">
              <div class="col-lg-12">
                <div class="card custom-card">
                  <!-- Grid System: Back Button -->
                  <div class="row">
                    <div class="col-12 text-left ml-0">
                        <a href="/dps-konversi-koperasi" class="kembali" id="btnKembali">
                            <img src="/img/Back.png" alt="back">
                            Kembali
                        </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</body>
</html>