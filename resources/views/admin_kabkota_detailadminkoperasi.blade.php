<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/detailadminkoperasi.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Detail Admin Koperasi</title>
</head>
<body>
  @include('layouts.admin_kabkota_sidebar')
  @include('layouts.admin_kabkota_navbar')
  <script src="{{ asset('js/script.js') }}"></script>

  <div class="content">
    <!-- Dalam main-box -->
    <div class="main-box">
      <!-- Konten utama di sini -->
  
      <!-- Box Informasi -->
      <div class="profile-box">
        <h5 class="profile-title">Informasi Koperasi</h5>
        <div class="border-gray"></div>
        
        <!-- Logo Box -->
        <div class="logo-box">
          <img src="/img/gambar_koperasi.png" alt="Profile Image">
        </div>

        <!-- Nama Admin Koperasi -->
        <div class="table-row">
            <div class="table-col">
                <label for="adminName">Nama lengkap admin:</label>
                <div id="adminName">{{ $koperasi->nama_admin_koperasi }}</div>
            </div>
        </div>
    
        <!-- Nama Koperasi -->
        <div class="table-row">
            <div class="table-col">
                <label for="coopName">Nama koperasi:</label>
                <div id="coopName">{{ $koperasi->nama_koperasi }}</div>
            </div>
        </div>
    
        <!-- Nomor Badan Hukum -->
        <div class="table-row">
            <div class="table-col">
                <label for="legalNumber">No Badan Hukum:</label>
                <div id="legalNumber">{{ $koperasi->no_badan_hukum }}</div>
            </div>
        </div>
    
        <!-- Tanggal Badan Hukum -->
        <div class="table-row">
            <div class="table-col">
                <label for="legalDate">Tanggal Badan Hukum:</label>
                <div id="legalDate">{{ $koperasi->tanggal_badan_hukum }}</div>
            </div>
        </div>
    
        <!-- Alamat -->
        <div class="table-row">
            <div class="table-col full-width">
                <label for="address">Alamat:</label>
                <div id="address">{{ $koperasi->alamat }}</div>
            </div>
        </div>
    
        <!-- Kelurahan -->
        <div class="table-row">
            <div class="table-col">
                <label for="subdistrict">Kelurahan:</label>
                <div id="subdistrict">{{ $koperasi->kelurahan }}</div>
            </div>
        </div>
        <div class="table-row">
          <div class="table-col">
              <label for="subdistrict">Kecamatan:</label>
              <div id="subdistrict">{{ $koperasi->kecamatan }}</div>
          </div>
      </div>
    
        <!-- Nomor Telepon -->
        <div class="table-row">
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
