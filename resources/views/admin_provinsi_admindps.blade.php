<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admindps.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <!-- Font Awesome -->

  <title>Sipanka KopSyah - Landing Page</title>




</head>

<body>

    @include('layouts.sidebar')
    @include('layouts.navbar')

 

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <h4>Dashboard / Manajemen DPS / Admin DPS</h4>
          </div>
          <button class="btn btn-success" id="btnTambah" onclick="togglePopup()">Tambah Data DPS</button>
        </div>
      </div>

   
    <div class="overlay" id="overlay"></div>
<div class="popup-container" id="popupContainer">
    <span class="close-icon" onclick="togglePopup()">X</span>
    <div class="popup-content">
        <div class="popup-title">Data DPS</div>
        <form>
            
            <div class="form-group">
                <label for="namaLengkap">Nama Lengkap:</label>
                <input type="text" id="namaLengkap" name="namaLengkap">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="btn-container">
                <button type="button" class="btn btn-danger" onclick="togglePopup()">Batal</button>
                <button type="button" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>
</div>

        <div class="mt-3" style="margin-left: 6.5cm; margin-right: 4cm;">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Akses Login</th>
                        <th scope="col">Sertifikat</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>
                        <img src="/img/Profile Icon.png" alt="Profile Icon" width="15" height="15"> Mark<br>
                        <img src="/img/Lock Icon.png" alt="Lock Icon" width="15" height="15"> p1234567   </td>
                        <td>null</td>
                        <td>
                            <a><img src="/img/Edit.png" alt="Edit Icon" width="30" height="30">
                            </i></a>
                            <a><img src="/img/Hapus.png" alt="Edit Icon" width="30" height="30"></i></a>
                           
                        </td>
                        
                    </tr>
                    <!-- Tambahkan baris lain sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
        <button id="toggleSidebar" onclick="toggleSidebar()">Toggle Sidebar</button>
        <script src="{{asset('js/script.js')}}"></script>
        <script src="{{asset('js/admindps.js')}}"></script>
</div>

<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </body>
</html>