<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/detailpengawasankoperasi.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Detail Pengawasan Koperasi</title>
</head>

<body>
  @include('layouts.admin_kabkota_sidebar')
  @include('layouts.admin_kabkota_navbar')
  <script src="{{asset('js/script.js')}}"></script>

  <div class="content">
    <div class="containermt-5">
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
                      <th scope="col">Nama Koperasi</th>
                      <th scope="col">Kabupaten/Kota</th>
                      <th scope="col">Tanggal Pengawasan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Tindakan</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <th scope="row">1</th>
                      <td>Koperasi A Loh Ini </td>
                      <td>Kota Padang</td>
                      <td>20 Januari 2024</td>
                      <td>   
                        <a><img src="/img/accepted.png" alt="Accepted Icon" >
                      </i></a>
                    </td>
                    <td class="text-center">
                      <a href="/detail-kabkota-dpsditerima"><img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30"></a>
                      </i></a>
                  </tr>

                  <tr>
                    <th scope="row">2</th>
                    <td>Koperasi B Loh Ini </td>
                    <td>Kota Banda Aceh</td>
                    <td>80 Januari 2084</td>
                    <td>   
                      <a><img src="/img/pending.png" alt="Accepted Icon" >
                    </i></a>
                  </td>
                </td>
                <td class="text-center">
                  <a href="/detail-kabkota-dpsmenunggu"><img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30"></a>
                </i></a>
            </tr>
                
                <tr>
                  <th scope="row">3</th>
                  <td>Koperasi C Loh Ini </td>
                  <td>Kota Padang</td>
                  <td>20 Januari 2024</td>
                  <td>   
                    <a><img src="/img/rejected.png" alt="Accepted Icon" >
                  </i></a>
                </td>
            </td>
            <td class="text-center">
              <a href="/detail-kabkota-dpsditolak"><img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30"></a>
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