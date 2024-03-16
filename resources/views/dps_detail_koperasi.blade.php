<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/navbarsidebar_dps.css') }}">
  <link rel="stylesheet" href="{{ asset('css/detailadminkoperasi.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Detail Informasi Koperasi</title>
</head>
<body>
    @include('layouts.dps_sidebar')
    @include('layouts.dps_navbar')  
  <script src="{{ asset('js/script_dps.js') }}"></script>

    <div class="content">
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center">
            <div class="dashboard-title">
                <strong>Manajemen Koperasi / Informasi Koperasi</strong>
            </div>
            </div>
        
            <!-- Dalam main-box -->
            <div class="main-box">
                <!-- Konten utama di sini -->
    
                <!-- Box Informasi -->
                <div class="profile-box">
                    <h5 class="profile-title">Informasi Koperasi</h5>
                <div class="border-gray"></div>
            
            <!-- Logo Box -->
                <div class="logo-box">
                    <img src="{{ $koperasi->logo }}" alt="Logo Koperasi">
                </div>

                <div class="table-row">
                    <div class="table-col">
                        <label for="adminName">Nama lengkap admin:</label>
                        <div id="adminName">{{ $koperasi->nama_admin_koperasi }}</div>
                    </div>

                    <div class="table-col">
                        <label for="coopName">Nama koperasi:</label>
                        <div id="coopName">{{ $koperasi->nama_koperasi }}</div>
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-col">
                        <label for="legalNumber">No Badan Hukum:</label>
                        <div id="legalNumber">{{ $koperasi->no_badan_hukum }}</div>
                    </div>

                    <div class="table-col">
                        <label for="legalDate">Tanggal Badan Hukum:</label>
                        <div id="legalDate">{{ $koperasi->tanggal_badan_hukum }}</div>
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-col full-width">
                        <label for="address">Alamat:</label>
                        <div id="address">{{ $koperasi->alamat }}</div>
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-col">
                        <label for="district">Kecamatan:</label>
                        <div id="district">{{ $koperasi->kecamatan }}</div>
                    </div>

                    <div class="table-col">
                        <label for="city">Kabupaten/Kota:</label>
                        <div id="city">{{ $koperasi->adminKabupatenKota->kabupatenKota->nama_kabupatenkota }}</div>
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-col">
                        <label for="subdistrict">Kelurahan:</label>
                        <div id="subdistrict">{{ $koperasi->kelurahan }}</div>
                    </div>
                    <div class="table-col">
                        <label for="phoneNumber">No Telp:</label>
                        <div id="phoneNumber">{{ $koperasi->no_telp }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
