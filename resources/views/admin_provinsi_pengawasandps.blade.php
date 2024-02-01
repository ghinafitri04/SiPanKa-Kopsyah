<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/pengawasandps.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <title>Sipanka KopSyah - Pengawasan DPS</title>
</head>

<body>

  @include('layouts.sidebar')
  @include('layouts.navbar')
  <script src="{{asset('js/script.js')}}"></script>

  <div class="content">
    <div class="containermt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <h4>Pengawasan DPS</h4>
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
            <tr>
                <th scope="row">1</th>
                <td>Ghina Fitri</td>
                <td>100</td>
                <td>
                    <a href="{{ route('detail_pengawasan_dps', ['id' => 1]) }}">
                        <img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30">
                    </a>
                </td>
            </tr>
            <!-- Tambahkan baris lain sesuai kebutuhan -->
        </tbody>
    </table>
</div>
</div>

<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </body>
</html>