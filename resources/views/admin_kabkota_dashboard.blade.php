<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/navbarsidebar_kabkota.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard_kabkota.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Sipanka KopSyah - Landing Page</title>
</head>

<body>
    @include('layouts.admin_kabkota_sidebar')
    @include('layouts.admin_kabkota_navbar')

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

        <!-- Bagian baru yang ditambahkan -->
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
                        <td class="text-center center-card centered-content">
                            <div class="card bg-success text-white mb-4">
                                <div class="number">0</div>
                                <div class="text">Koperasi Syariah</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link">Lihat Detail</a>
                                </div>
                            </div>
                        </td>                        
                    </tr>
                </tbody>
            </table>
        </div>
        <button id="toggleSidebar" onclick="toggleSidebar()">Toggle Sidebar</button>
        <script src="{{asset('js/script_kabkota.js')}}"></script>
        <script src="{{asset('js/dashboard_kabkota.js')}}"></script>
    </div>
</div>
</body>

</html>