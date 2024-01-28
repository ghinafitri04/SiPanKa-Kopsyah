<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminkoperasi.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <!-- Font Awesome -->

    <title>Sipanka KopSyah - Landing Page</title>

</head>

<body>
    @include('layouts.sidebar')
    @include('layouts.navbar')

    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/adminkoperasi.js')}}"></script>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="dashboard-title">
                <h4>Dashboard / Manajemen Koperasi / Admin Koperasi</h4>
            </div>
            <button class="btn btn-success" id="btnTambah" onclick="togglePopup()">Tambah Data Koperasi</button>
        </div>
    </div>

<!-- POP -->
<div class="overlay" id="overlay"></div>
<div class="popup-container" id="popupContainer">
    <span class="close-icon" onclick="togglePopup()">X</span>
    <div class="popup-content">
        <div class="popup-title">Data Admin Koperasi</div>
        <form action="{{ route('admin.tambahDataAdminKoperasi') }}" method="post">
            @csrf
            <!-- Your form fields go here -->
            <div class="form-group">
                <label for="namaLengkap">Nama Koperasi:</label>
                <input type="text" id="namaLengkap" name="namaLengkap" required>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="region">Region:</label>
                <input type="text" id="region" name="region" required>
            </div>

            <div class="btn-container">
                <button type="button" class="btn btn-danger" onclick="togglePopup()">Batal</button>
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>
</div>


    <div class="mt-3" style="margin-left: 6.5cm; margin-right: 4cm;">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Instansi</th>
                    <th scope="col">Akses Login</th>
                    <th scope="col">Region</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $key => $admin)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $admin->nama_instansi }}</td>
                    <td>
                        <img src="/img/Profile Icon.png" alt="Profile Icon" width="15" height="15"> {{ $admin->username }}
                    </td>
                    <td>{{ $admin->region }}</td>
                    <td>
                        <a href="{{ route('admin.editDataAdminKoperasi', $admin->id) }}"><img src="/img/Edit.png" alt="Edit Icon" width="30" height="30"></a>
                        
                        <a href="#" onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('hapus-form-{{ $admin->id }}').submit(); }">
                            <img src="/img/Hapus.png" alt="Hapus Icon" width="30" height="30">
                        </a>
                        
                        <form id="hapus-form-{{ $admin->id }}" method="POST" action="{{ route('admin.hapusDataAdminKoperasi', ['id' => $admin->id]) }}" style="display: none;">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                        
                        
                        
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
    <script>
        // Menambahkan skrip untuk menangani klik pada gambar
        document.querySelector('a[onclick]').addEventListener('click', function() {
            var formId = this.getAttribute('onclick').match(/\d+/)[0]; // Mendapatkan ID formulir dari atribut onclick
            document.getElementById('hapus-form-' + formId).submit(); // Mengirim formulir dengan ID yang sesuai
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
