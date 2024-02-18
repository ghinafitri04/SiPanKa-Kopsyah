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
    <div class="containermt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <strong>Riwayat Pengawasan</strong>
          </div>
          <button class="tambah-laporan">
              <img src="/img/plus.png" alt="plus">
              Buat Laporan Baru
          </button>
        </div>

        <div class="mt-3" style="margin-left: 0cm; margin-right: 0cm;">
          <table class="table">
              <thead class="table-light">
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal Pengawasan</th>
                      <th scope="col">Nama Koperasi</th>
                      <th scope="col">Kabupaten/Kota</th>
                      <th scope="col">Status</th>
                      <th scope="col">Tindakan</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <th scope="row">1</th>
                      <td>20 Januari 2024</td>
                      <td>Koperasi A Loh Ini </td>
                      <td>Kota Padang</td>
                      <td>   
                        <a><img src="/img/accepted.png" alt="Accepted Icon" >
                      </i></a>
                    </td>
                    <td class="text-center">
                      <a href="/detail-pengawasan-dpsditerima"><img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30"></a>
                      </i></a>
                  </tr>

                  <tr>
                    <th scope="row">2</th>
                    <td>80 Januari 2084</td>
                    <td>Koperasi B Loh Ini </td>
                    <td>Kota Banda Aceh</td>
                    <td>   
                      <a><img src="/img/pending.png" alt="Accepted Icon" >
                    </i></a>
                  </td>
                </td>
                <td class="text-center">
                  <a href="/detail-pengawasan-dpsmenunggu"><img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30"></a>
                </i></a>
            </tr>
                
                <tr>
                  <th scope="row">3</th>
                  <td>20 Januari 2024</td>
                  <td>Koperasi C Loh Ini </td>
                  <td>Kota Padang</td>
                  <td>   
                    <a><img src="/img/rejected.png" alt="Accepted Icon" >
                  </i></a>
                </td>
            </td>
            <td class="text-center">
              <a href="/detail-pengawasan-dpsditolak"><img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30"></a>
            </i></a>
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