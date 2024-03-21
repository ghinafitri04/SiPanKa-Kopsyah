<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/navbarsidebar_dps.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dpspengawasanditerima.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Riwayat Pengawasan Diterima</title>
</head>

<body>
    @include('layouts.dps_sidebar')
    @include('layouts.dps_navbar')
  <script src="{{asset('js/script_dps.js')}}"></script>
  
  <div class="content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <strong>Riwayat Pengawasan</strong>
            <div class="dashboard-subtitle">
              <p><strong>Nama Koperasi :</strong> Koperasi Budi Luhur</p>
            </div>
          </div>
        </div>
    </div>

<!-- Form untuk Laporan Hasil Pengawasan DPS -->
<div class="dashboard-box" style="padding: 20px; border: 1px solid #d3d3d3; border-radius: 10px;">
    <h2 style="text-align: center; font-weight: bold; margin-top: 0; margin-bottom: 20px;">Formulir Laporan Hasil Pengawasan DPS</h2>
    
    <form action="{{ route('dps.menambahkan-laporan', ['id_koperasi' => $koperasi->id_koperasi]) }}" method="post">
        @csrf <!-- Laravel CSRF Protection -->
        <!-- Hasil -->
        <div class="form-group">
            <label for="hasil">Hasil:</label>
            <textarea class="form-control" id="hasil" name="hasil" rows="3"></textarea>
        </div>

        <!-- Permasalahan -->
        <div class="form-group">
            <label for="permasalahan">Permasalahan:</label>
            <textarea class="form-control" id="permasalahan" name="permasalahan" rows="3"></textarea>
        </div>

        <!-- Saran -->
        <div class="form-group">
            <label for="saran">Saran:</label>
            <textarea class="form-control" id="saran" name="saran" rows="3"></textarea>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
