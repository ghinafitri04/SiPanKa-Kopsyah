<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/pengawasandps.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Pengawasan DPS</title>
</head>

<body>
    @include('layouts.admin_provinsi_sidebar')
    @include('layouts.admin_provinsi_navbar')

  <div class="content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <strong>Manajemen DPS / Pengawasan DPS</strong>
          </div>
        </div>
      
       <div class="mt-3" style="margin-left: 0cm; margin-right: 0cm;">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama DPS</th>
                    <th scope="col">Jumlah Koperasi</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dps as $index => $dpsData)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dpsData->nama_lengkap }}</td>
                        <td>{{ isset($jumlahKoperasi[$dpsData->id_dps]) ? $jumlahKoperasi[$dpsData->id_dps] : 0 }}</td>
                        <td>
                          <a href="{{ route('provinsi_pengawasan_koperasi', ['id' => $dpsData->id_dps]) }}">
                                <img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
  </div>

<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
