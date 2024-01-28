<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/manajemenkabkota.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <!-- Font Awesome -->

  <title> Sipanka KopSyah - Manajemen Kabupaten/Kota </title>
</head>

<body>
    @include('layouts.sidebar')
    @include('layouts.navbar')

    <!-- Bagian baru yang ditambahkan -->
    <div class="content">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <h4>Dashboard / Manajemen Kabupaten Kota </h4>
          </div>
          <button class="btn btn-success" id="btnTambah" onclick="togglePopup()">Tambah Data Admin</button>
        </div>
      </div>

    <div class="overlay" id="overlay"></div>
<div class="popup-container" id="popupContainer">
    <span class="close-icon" onclick="togglePopup()">X</span>
    <div class="popup-content">
        <div class="popup-title">Data Admin Kab/Kota</div>
        <form action="{{ route('admin.tambahDataAdmin') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="namaLengkap">Nama Lengkap:</label>
                <input type="text" id="namaLengkap" name="namaLengkap">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="kabupatenKota">Kabupaten/Kota:</label>
                <input type="text" id="kabupatenKota" name="kabupatenKota">
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
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Akses Login</th>
                        <th scope="col">Kabupaten/Kota</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $admin->nama_instansi }}</td>
                        <td>
                            <img src="/img/Profile Icon.png" alt="Profile Icon" width="15" height="15"> {{ $admin->username }}<br>
                            <img src="/img/Lock Icon.png" alt="Lock Icon" width="15" height="15"> {{ $admin->password }}
                        </td>
                        <td>{{ $admin->region }}</td>
                        <td>
                            <!-- Icon Edit dengan Modal -->
                            <a data-toggle="modal" data-target="#editModal{{ $admin->id }}">
                                <img src="/img/Edit.png" alt="Edit Icon" width="30" height="30">
                            </a>
            
                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Data Admin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Tempatkan formulir edit di sini -->
                                            <form action="{{ route('admin.updateDataAdmin', ['id' => $admin->id]) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                            
                                                <div class="form-group">
                                                    <label for="editNamaLengkap">Nama Lengkap:</label>
                                                    <input type="text" id="editNamaLengkap" name="editNamaLengkap" value="{{ $admin->nama_instansi }}">
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="editUsername">Username:</label>
                                                    <input type="text" id="editUsername" name="editUsername" value="{{ $admin->username }}">
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="editKabKota">Kabupaten/Kota:</label>
                                                    <input type="text" id="editKabKota" name="editKabKota" value="{{ $admin->region }}">
                                                </div>
                                            
                                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <a href="{{ route('admin.hapusDataAdmin', ['id' => $admin->id]) }}"
                                onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('hapus-form-{{ $admin->id }}').submit(); }">
                                <img src="/img/Hapus.png" alt="Hapus Icon" width="30" height="30">
                             </a>
                             
                             <form id="hapus-form-{{ $admin->id }}" action="{{ route('admin.hapusDataAdmin', ['id' => $admin->id]) }}" method="POST" style="display: none;">
                                 @csrf
                                 @method('DELETE')
                             </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/manajemen_kab.js')}}"></script>
<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </body>
</html>