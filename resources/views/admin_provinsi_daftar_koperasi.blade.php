<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/navbarsidebar_dps.css') }}">
  <link rel="stylesheet" href="{{ asset('css/riwayatpengawasandps.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Informasi Koperasi</title>
</head>
<body>

  @include('layouts.admin_provinsi_sidebar')
  @include('layouts.admin_provinsi_navbar')
<script src="{{ asset('js/script_dps.js') }}"></script>

<div class="content">
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
      <div class="dashboard-title">
        <strong> Manajemen Koperasi / Informasi Koperasi </strong>
        <div class="dashboard-subtitle">
          <p>Daftar Koperasi</p>
        </div>
      </div>
    </div>

    <!-- Tabel untuk daftar koperasi -->
    <div class="container">
      @if(count($koperasi) > 0)
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nama Koperasi</th>
            <th scope="col">Pengawasan</th>
          </tr>
        </thead>
        <tbody>
          @foreach($koperasi as $k)
          <tr>
            <td>{{ $k->nama_koperasi }}</td>
            <td><a href="{{ route('provinsi_pengawasan_koperasi', $k->id_koperasi) }}" class="detail-button">Pengawasan</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <p>Tidak ada koperasi yang tersedia.</p>
      @endif
    </div>
  </div>
</div>

<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
