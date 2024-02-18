<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminkoperasi.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Admin Koperasi</title>
</head>

<body>
    @include('layouts.admin_kabkota_sidebar')
    @include('layouts.admin_kabkota_navbar')
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('js/adminkoperasi_kabkota.js')}}"></script>

  <div class="content">
   <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <h4>
                <strong> Admin Koperasi</strong>
            </h4>
          </div>
          <button class="tambah-admin" id="btnTambah" onclick="togglePopup()">Tambah Data Koperasi</button>
        </div>
    </div>

    <div class="overlay" id="overlay"></div>
        <div class="popup-container" id="popupContainer">
            <span class="close-icon" onclick="togglePopup()">
                <img src="/img/close.png" alt="Close Icon" width="15" height="15">
            </span>
        
    <div class="popup-content" id="formTambahAdminContainer">
        <div class="popup-title">Data Koperasi</div>
        <form>
            <div class="form-group">
                <label for="namaLengkap">Nama Lengkap</label>
                <div class="input-fields">
                    <input type="text" id="namaLengkap" name="namaLengkap">
                </div>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-fields">
                    <input type="text" id="username" name="username">
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-fields">
                    <input type="password" id="password" name="password">
                </div>
            </div>

            <div class="form-group">
                <label for="password">Nama Koperasi</label>
                <div class="input-fields">
                    <input type="text" id="nama_koperasi" name="nama_koperasi">
                </div>
            </div>

            <div class="btn-container">
                <button type="button" class="btn btn-danger btn-batal" onclick="togglePopup()">Batal</button>
                <button type="button" class="btn btn-success" id="btnTambahForm" onclick="showSuccessPopup()">Tambah</button>

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
                    <th scope="col">Nama Koperasi</th>
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
                    <td> Nama Koperasi </td>
                    <td>
                        <a href="#" class="ini-info" id="infoIcon1" data-id="1">
                            <img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30">
                        </a>
                        <a href="#" class="btn-hapus" data-id="1">
                            <img src="/img/Hapus.png" alt="Delete Icon" width="30" height="30">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
                <div id="confirmationPopup" class="confirmation-popup-container">
                    <div class="confirmation-popup-card">
                    <div class="confirmation-popup-title">Konfirmasi Hapus</div>
                    <div class="confirmation-popup-content">
                    <p>Anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="btn-container">
                    <button class="btn-batal-hapus" onclick="closeConfirmationPopup()">Batal</button>
                    <button class="btn-success-hapus" onclick="hapusData()">Hapus</button>
                </div>
                </div>
            </div>

        <div class="success-popup-container" id="successPopup">
            <img src="/img/ceklis.png" alt="Success Image" width="100" height="100">
            <div class="success-popup-title">Sukses!</div>
            <p>Data berhasil ditambahkan.</p>
            <button class="btn btn-success" onclick="closeSuccessPopup()">Tutup</button>
        </div>
    
        <div class="hapus-popup-container" id="hapusPopup">
            <img src="/img/ceklis.png" alt="Success Image" width="100" height="100">
            <div class="success-popup-title">Sukses!</div>
            <p>Data berhasil dihapus.</p>
            <button class="btn btn-success" onclick="closeHapusPopup()">Tutup</button>
        </div>
        
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>