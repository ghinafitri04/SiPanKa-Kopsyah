<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Sipanka KopSyah - Landing Page</title>

    <style>
        /* Tambahkan gaya CSS di sini */
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Gaya untuk Dashboard Admin */
        .dashboard-title {
            font-weight: bold;
            font-size: 20px;
            color: black;
            margin-top: 0.5cm;
            margin-left: -25cm; /* Ubah margin kiri */
        }

        .tulisantengah {
            font-weight: bold;
            text-align: center;
            font-size: 36px;
            color: black;
            margin-top: 6vh; /* Ubah margin top */
        }

        .tulisantengah:hover {
            color: #0e690e; /* Ganti warna teks saat dihover */
        }

        .center-textt {
            text-align: center;
            margin-left: -15cm;
        }

        .center-textt p {
            font-size: 22px;
            color: black;
        }

        /* Gaya untuk Selamat Datang dan Admin */
        .center-textt p {
            font-size: 22px;
            color: black;
            margin-left: 578px;
        }

        .center-textt .admin-text {
            font-size: 22px;
            color: #28A745;
            font-weight: normal;
        }

        /* Gaya untuk tabel kolom Admin Kab Kota, DPS, dan Koperasi Syariah */
        .table-container {
    margin: 10px 2cm; /* Tambahkan margin ke kiri dan kanan */
    margin-top: 1.5cm;
    position: relative; /* Tambahkan posisi relatif */
}

/* Box biru */
.custom-box {
    position: absolute;
    top: -5px; /* Atur margin top agar tidak overlap dengan box merah */
    left: -5px; /* Atur margin left agar tidak overlap dengan box merah */
    width: calc(100% + 10px); /* Tambahkan margin left dan right ke width */
    /* height: calc(100% + 10px); Tambahkan margin top dan bottom ke height */
    height: 180px;
    border: 3px solid #d3d3d3; 
    box-sizing: border-box;
    border-radius: 10px; /* Border radius untuk ujung yang tumpul */
}

/* Box merah */
.custom-table td:nth-child(1) .card:hover {
    background: linear-gradient(to right, #ff7675, #e74c3c);
    border: none; /* Hapus border pada box merah */
}

/* Box kuning */
.custom-table td:nth-child(2) .card:hover {
    background: linear-gradient(to right, #f9ca24, #f39c12);
    border: none; /* Hapus border pada box kuning */
}

/* Box hijau */
.custom-table td:nth-child(3) .card:hover {
    background: linear-gradient(to right, #55efc4, #00b894);
    border: none; /* Hapus border pada box hijau */
}

        .custom-table {
            /* border-collapse: collapse; */
            width: 100%;
        }

        .custom-table th,
        .custom-table td {
            /* border: 1px solid #007bff; */
            padding: 8px;
            text-align: center;
            width: 33.33%; /* Atur lebar kolom agar sama */
        }

        .custom-table th {
            background-color: #007bff;
            color: white;
        }

        .custom-table td {
            /* border: 1px solid #007bff; */
            padding: 8px;
            text-align: center;
            width: 33.33%; /* Atur lebar kolom agar sama */
        }

        .custom-table td .card {
            font-size: 18px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .custom-table td .number {
            font-size: 30px; /* Ukuran font angka */
            font-weight: bold; /* Bold untuk angka jika diinginkan */
            /* margin-bottom: 0.1px; Mengurangi jarak antara angka dan teks */
        }

        .custom-table td .text {
            font-size: 18px; /* Ukuran font teks */
            /* margin-bottom: 2px; Mengurangi jarak antara teks dan link */
        }

        .custom-table td .card-footer {
            margin-top: 5px; /* Memberikan jarak antara teks dan "Lihat Detail" */
        }
    </style>

</head>

<body>

    @include('layouts.sidebar')
    @include('layouts.navbar')

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
                        <td>
                            <div class="card bg-danger text-white mb-4">
                                <div class="number">0</div>
                                <div class="text">Admin Kab Kota</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link">Lihat Detail</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card bg-warning text-white mb-4">
                                <div class="number">0</div>
                                <div class="text">DPS</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link">Lihat Detail</a>
                                </div>
                            </div>
                        </td>
                        <td>
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
        <script src="{{asset('js/script.js')}}"></script>
    </div>
</body>

</html>