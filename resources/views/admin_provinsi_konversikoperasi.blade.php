<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/konversikoperasi.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->

  <title>Sipanka KopSyah - Landing Page</title>




</head>

<body>

  @include('layouts.sidebar')
  @include('layouts.navbar')

  <script src="{{asset('js/script.js')}}"></script>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <h4>Dashboard / Manajemen Koperasi /Konversi Koperasi</h4>
          </div>
          <button class="btn btn-success" id="btnTambah" onclick="togglePopup()">Tambah Data Koperasi</button>
        </div>
      </div>

        <div class="mt-3" style="margin-left: 6.5cm; margin-right: 4cm;">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Koperasi</th>
                        <th scope="col">Proses 1</th>
                        <th scope="col">Proses 2</th>
                        <th scope="col">Proses 3</th>
                        <th scope="col">Proses 4</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Koperasi Aku Nich<br>
                        <td>null</td>
                        <td>null</td>
                        <td>null</td>
                        <td>null</td>
                        <td>
                          <a><img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30">
                          </i></a>
                            <a><img src="/img/Edit.png" alt="Edit Icon" width="30" height="30">
                            </i></a>
                            <a><img src="/img/Hapus.png" alt="Delete Icon" width="30" height="30"></i></a>
                            {{-- <a href="#"><i class="fas fa-eye"></i></a> --}}
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