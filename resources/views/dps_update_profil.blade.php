<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/navbarsidebar_dps.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lengkapiprofildps.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Sipanka KopSyah - Update Profil</title>
</head>

<body>
    @include('layouts.dps_sidebar')
    @include('layouts.dps_navbar')
    <script src="{{asset('js/script_dps.js')}}"></script>
    <!-- <script src="{{asset('js/dashboard_dps.js')}}"></script> -->

    <div class="content">
        <!-- Dalam main-box -->
        <div class="main-box">
            <!-- Box Profile -->
            <div class="profile-box">
                <h5 class="profile-title">Profil</h5>
                <div class="border-gray"></div> <!-- Border abu-abu di bawah judul -->
                <div class="table-row">
                    <div class="table-col">
                        <label for="adminName">Nama Lengkap</label>
                        <input type="text" id="DpsName" name="DpsName">
                    </div>
                    <div class="table-col">
                        <label for="noHP">No HP</label>
                        <input type="text" id="noHp" name="noHp">
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-col full-width">
                        <label for="address">Alamat</label>
                        <input type="text" id="adress" name="address">
                    </div>
                </div>
                <!-- Baris keempat -->
                <div class="table-row">
                    <div class="table-col full-width">
                        <label for="fileUpload">Upload Sertifikat</label>
                        <div class="file-input-wrapper">
                                <input type="file" id="fileUpload" name="fileUpload" style="display: none;">
                                <button class="upload-button" onclick="document.getElementById('fileUpload').click()">Pilih File</button>
                                <input type="text" id="fileName" name="fileName" readonly>
                        </div>
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-col">
                        <label for="adminName">Password Baru</label>
                        <input type="text" id="NewPassword" name="NewPassword">
                    </div>
                    <div class="table-col">
                        <label for="noHP">Konfirmasi Password</label>
                        <input type="text" id="confirmPassword" name="confirmPassword">
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