!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('css/navbarsidebar_koperasi.css') }}">
  <link rel="stylesheet" href="{{ asset('css/updateprofil.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <title>Sipanka KopSyah - Lengkapi Profil</title>
</head>

<body>
  @include('layouts.koperasi_sidebar')
  @include('layouts.koperasi_navbar')
  <script src="{{asset('js/script_koperasi.js')}}"></script>
    <!-- <script src="{{asset('js/dashboard_dps.js')}}"></script> -->

    <div class="content">
        <!-- Logo Box -->
        <div class="logo-box">
            <h5>Logo Koperasi</h5>
            <div class="border-gray">
                <img src="/img/img5.png" alt="Profile Image">
            </div>
            <div class="edit-icon">
                <button class="edit-button">
                <img src="/img/edit-logo.png" alt="Edit Icon">
                </button>
            </div>
        </div>
    
        <!-- Dalam main-box -->
        <div class="main-box">
            <!-- Box Profile -->
            <div class="profile-box">
                <h5 class="profile-title">Lengkapi Profil</h5>
                <div class="border-gray"></div> <!-- Border abu-abu di bawah judul -->
                <div class="table-row">
                    <div class="table-col">
                        <label for="adminName">Nama Lengkap Admin </label>
                        <input type="text" id="adminName" name="adminName">
                    </div>
                    <div class="table-col">
                        <label for="coopName">Nama koperasi:</label>
                        <input type="text" id="coopName" name="coopName">
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-col">
                        <label for="legalNumber">No Badan Hukum:</label>
                        <input type="text" id="legalNumber" name="legalNumber">
                    </div>
                    <div class="table-col">
                        <label for="legalDate">Tanggal Badan Hukum:</label>
                        <input type="date" id="legalDate" name="legalDate">
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-col full-width">
                        <label for="address">Alamat</label>
                        <input type="text" id="adress" name="address">
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-col">
                        <label for="district">Kecamatan:</label>
                        <select id="district" name="district">
                            <!-- Isi dropdown sesuai kebutuhan -->
                            <option value="kecamatan1">Kecamatan 1</option>
                            <option value="kecamatan2">Kecamatan 2</option>
                            <!-- ... -->
                        </select>
                    </div>
                    <div class="table-col">
                        <label for="city">Kabupaten/Kota:</label>
                        <select id="city" name="city">
                            <!-- Isi dropdown sesuai kebutuhan -->
                            <option value="kabupaten1">Kabupaten/Kota 1</option>
                            <option value="kabupaten2">Kabupaten/Kota 2</option>
                            <!-- ... -->
                        </select>
                    </div>
                </div>
                
                <div class="table-row">
                    <div class="table-col">
                        <label for="kelurahan">Kelurahan:</label>
                        <input type="text" id="kelurahan" name="kelurahan">
                    </div>
                    <div class="table-col">
                        <label for="notelp">No Telp:</label>
                        <input type="text" id="notelp" name="notelp">
                    </div>
                </div>

                <!-- Baris keenam (tambahan) -->
                <div class="table-row">
                    <div class="table-col full-width text-right"> <!-- Tambahkan kelas "text-right" di sini -->
                        <button class="save-button">Simpan</button>
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