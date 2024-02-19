<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/navbarsidebar_koperasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pemilihan_dps.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Sipanka KopSyah - Pemilihan DPS</title>

</head>

<body>
        @include('layouts.koperasi_sidebar')
        @include('layouts.koperasi_navbar')
        <script src="{{asset('js/script_koperasi.js')}}"></script>

        <div class="content">
        <div class="containermt-5">
            <div class="d-flex justify-content-between align-items-center">
            <div >
                <h4 class="dashboard-title">Pemilihan DPS </h4>
            </div>
            </div>

            <div class="mt-3" style="margin-left: 0cm; margin-right: 0cm;">
                <div class="table-row">
                    <div class="table-col">
                        <label for="dps1">Pilih DPS 1:</label>
                        <select id="dps1" name="dps1">
                            <!-- Isi dropdown sesuai kebutuhan -->
                            <option value="dps1">DPS 1</option>
                            <option value="dps2">DPS 2</option>
                            <!-- ... -->
                        </select>   
                    </div>
            
                    <div class="table-col">
                        <label for="dps2">Masukkan DPS 2:</label>
                        <input type="text" id="dps2" name="dps2">
                    </div>
                    
                    <div class="table-col">
                        <button class="btn btn-success" onclick="simpanData()">Simpan</button>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div >
                <h4 class="dashboard-subtitle" style="margin-top: 1cm;">Riwayat Pemilihan DPS </h4>
                </div>
            </div>
            <div class="mt-3" style="margin-left: 0cm; margin-right: 0cm;">
                <table class="table" style="margin-top: 0.5cm; ">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama DPS</th>   
                            <th scope="col">Tanggal Pemilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                            <img src="/img/profile-icon.png" alt="Profile Icon" width="15" height="15"> Amallliaaa Sandi Alzhrh<br>
                            <img src="/img/profile-icon.png" alt="Lock Icon" width="15" height="15">  Ini Amalia yang kedua loh</td>
                            <td>20 Januari 2027 - 90 Maret 2080</td>    
                        </tr>
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
        </div>

    <!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        </body>
    </html>