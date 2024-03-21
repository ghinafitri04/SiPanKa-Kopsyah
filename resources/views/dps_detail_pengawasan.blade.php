<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/navbarsidebar_dps.css') }}">
  <link rel="stylesheet" href="{{ asset('css/detailriwayatpengawasandps.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Detail Riwayat Pengawasan DPS</title>
</head>

<body>
    @include('layouts.dps_sidebar')
    @include('layouts.dps_navbar')
  <script src="{{asset('js/script_dps.js')}}"></script>

  <div class="content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <strong>Riwayat Pengawasan DPS</strong>
          </div>
          <a href="{{ route('buat_laporan_baru', ['id_koperasi' => $koperasi->id_koperasi]) }}" class="btn btn-primary">Buat Laporan Baru</a>

        </div>

        <div class="mt-3">
          <table class="table">
              <thead class="table-light">
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal Pengawasan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Tindakan</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($riwayatPengawasanDPS as $key => $pengawasan)
                  <tr>
                      <th scope="row">{{ $key + 1 }}</th>
                      <td>{{ $pengawasan->tanggal_pengawasan }}</td>
                      <td>
                        @if($pengawasan->status)
                          <img src="/img/accepted.png" alt="Accepted Icon">
                        @else
                          <img src="/img/pending.png" alt="Pending Icon">
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('dps.pengawasan_laporan', ['id_pengawasan' => $pengawasan->id]) }}">
                            <img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30">
                        </a>
                    </td>                                        
                  </tr>
                  @endforeach
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
