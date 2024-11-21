<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/manajemenkabkota.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - ManajemenKabKota</title>
</head>
<body>
    @include('layouts.admin_provinsi_sidebar') 
    @include('layouts.admin_provinsi_navbar') 
    <script src="{{asset('js/script.js')}}"></script>
   

    <div class="content">
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h4><strong>Manajemen Kabupaten/Kota</strong></h4>
                <button class="tambah-admin" id="btnTambah" onclick="togglePopup()">Tambah Data Admin</button>
            </div>
        </div>

        <!-- Popup Tambah Data Admin -->
        <div class="overlay" id="overlay"></div>
        <div class="popup-container" id="popupContainer">
            <span class="close-icon" onclick="togglePopup()">X</span>
            <div class="popup-content">
                <h5 class="popup-title">Tambah Data Admin Kab/Kota</h5>
                <form action="{{ route('admin_provinsi.manajemen_kab_kota.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_instansi">Nama Instansi:</label>
                        <input type="text" id="nama_instansi" name="nama_instansi" class="form-control" placeholder="Masukkan nama instansi" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <div class="form-group">
                        <label for="kabupatenKota">Kabupaten/Kota:</label>
                        <select id="kabupatenKota" name="kabupatenKota" class="form-control" required>
                            <option value="">Pilih Kabupaten/Kota</option>
                            @foreach($kabupatenKotaList as $kabupaten)
                                <option value="{{ $kabupaten->id_kabupatenkota }}">{{ $kabupaten->nama_kabupatenkota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" onclick="togglePopup()">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Data Admin -->
        <div class="mt-3" style="margin-left: 6.5cm; margin-right: 4cm;">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Instansi</th>
                        <th>Akses Login</th>
                        <th>Kabupaten/Kota</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adminKabupatenKota as $admin)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $admin->nama_instansi }}</td>
                        <td>
                            <strong>Username:</strong> {{ $admin->username }}<br>
                            <strong>Password:</strong> {{ $admin->password_text }}
                        </td>
                        <td>{{ $admin->kabupatenKota->nama_kabupatenkota ?? 'Tidak Diketahui' }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="#" data-toggle="modal" data-target="#editModal{{ $admin->id_admin_kabupatenkota }}">
                                <img src="/img/Edit.png" alt="Edit Icon" width="30">
                            </a>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $admin->id_admin_kabupatenkota }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Admin</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form action="{{ route('admin_provinsi.manajemen_kab_kota.update', $admin->id_admin_kabupatenkota) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="editUsername">Username:</label>
                                                    <input type="text" id="editUsername" name="username" class="form-control" value="{{ $admin->username }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editPassword">Password (opsional):</label>
                                                    <input type="password" id="editPassword" name="password" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="editKabKota">Kabupaten/Kota:</label>
                                                    <select id="editKabKota" name="id_kabupatenkota" class="form-control" required>
                                                        <option value="">Pilih Kabupaten/Kota</option>
                                                        @foreach($kabupatenKotaList as $kabupaten)
                                                            <option value="{{ $kabupaten->id_kabupatenkota }}" {{ $admin->id_kabupatenkota == $kabupaten->id_kabupatenkota ? 'selected' : '' }}>
                                                                {{ $kabupaten->nama_kabupatenkota }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Hapus -->
                            <a href="#" onclick="event.preventDefault(); if (confirm('Yakin ingin menghapus?')) document.getElementById('deleteForm{{ $admin->id_admin_kabupatenkota }}').submit();">
                                <img src="/img/Hapus.png" alt="Delete Icon" width="30">
                            </a>
                            <form id="deleteForm{{ $admin->id_admin_kabupatenkota }}" action="{{ route('admin_provinsi.manajemen_kab_kota.destroy', $admin->id_admin_kabupatenkota) }}" method="POST" style="display:none;">
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function togglePopup() {
            $('#popupContainer').toggle();
            $('#overlay').toggle();
        }
    </script>
</body>
</html>
