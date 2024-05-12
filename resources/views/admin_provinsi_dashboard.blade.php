<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Sipanka KopSyah - Landing Page</title>
</head>

<body>
    @include('layouts.admin_provinsi_sidebar')
    @include('layouts.admin_provinsi_navbar')
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/dashboard_provinsi.js')}}"></script>

    <!-- Bagian baru yang ditambahkan -->
    <div class="content">
        <div class="center-text">
            <h4 class="dashboard-title">Dashboard Admin</h4>
        </div>

        <div>
            <h2 class="tulisantengah">SIPANKA KOPSYAH</h2>
        </div>

        <div class="center-textt">
            <p>Selamat datang, <span class="admin-text">Admin</span></p>
        </div>

        <!-- Ini Untuk Tabel di Dashboard -->
        <div class="table-container">
            <div class="custom-box"></div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
           
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="{{ route('admin_provinsi.manajemen_kab_kota.index') }}" class="card bg-danger text-white mb-4">
                                <div class="number" id="jumlahAdminKabupatenKota">{{ session('jumlahAdminKabupatenKota') }}</div>
                                <div class="text">Admin Kab Kota</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <span class="small text-white stretched-link">Lihat Detail</span>
                                </div>
                            </a>    
                        </td>

                        <td>
                            <a href="{{ route('admin_provinsi.manajemen_dps.index') }}" class="card bg-primary text-white mb-4">
                                <div class="number" id="jumlahAdminDps">{{ session('jumlahAdminDps') }}</div>
                                <div class="text">DPS</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <span class="small text-white stretched-link">Lihat Detail</span>
                                </div>
                            </a>   
                        </td>

                        <td>
                            <div class="card bg-success text-white mb-4" data-route-name="{{ route('admin_provinsi.manajemen_koperasi.index') }}">
                                <div class="number"id="jumlahAdminKoperasi">{{ session('jumlahAdminKoperasi') }}</div>
                                <div class="text">Koperasi Syariah</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a href="#" class="small text-white stretched-link">Lihat Detail</a>
                                </div>
                            </div>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</html>