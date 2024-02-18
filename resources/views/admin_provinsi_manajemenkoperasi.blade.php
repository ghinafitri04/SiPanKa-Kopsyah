<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminkoperasi.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Admin Koperasi</title>
</head>

<body>
    @include('layouts.admin_provinsi_sidebar')
    @include('layouts.admin_provinsi_navbar')
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('js/adminkoperasi.js')}}"></script>

  <div class="content">
   <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <h4>
                <strong> Admin Koperasi</strong>
            </h4>
          </div>
          <button class="tambah-admin" id="btnTambah" onclick="togglePopup()">Tambah Data Koperasi</button>
        </div>
    </div>

    
            


    <div class="mt-3" style="margin-left: 4.5cm; margin-right: 4cm;">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Admin</th>
                    <th scope="col">Nama Koperasi</th>
                    <th scope="col">Akses Login</th>
                    <th scope="col">Kabupaten/kota</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach($koperasiList as $koperasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $koperasi->nama_admin_koperasi }}</td>
                    <td>{{ $koperasi->nama_koperasi }}</td>
                    <td>
                        <img src="/img/Profile Icon.png" alt="Profile Icon" width="15" height="15"> {{ $koperasi->username }}<br>
                        <img src="/img/Lock Icon.png" alt="Lock Icon" width="15" height="15"> {{ $koperasi->password_text }}
                    </td>
                    <td>{{ $koperasi->adminKabupatenKota->kabupatenKota->nama_kabupatenkota }}</td>
                    <td>
                        <a href="{{ route('admin_provinsi.detail_manajemen_koperasi.detail_index', ['id' => $koperasi->id_koperasi]) }}" class="ini-info">
                            <img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30">
                        </a>                        
                        <a href="#" class="btn-hapus" data-id="{{ $koperasi->id }}">
                            <img src="/img/Hapus.png" alt="Delete Icon" width="30" height="30">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>      
    </div>
    <div class="overlay" id="overlay"></div>
        <div class="popup-container" id="popupContainer">
            <span class="close-icon" onclick="togglePopup()">
                <img src="/img/close.png" alt="Close Icon" width="15" height="15">
            </span>
        
            <div class="popup-content" id="formTambahAdminContainer">
                <div class="popup-title">Data Koperasi</div>
                <form action="{{ route('admin_provinsi.manajemen_koperasi.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="namaLengkap">Nama Lengkap</label>
                        <div class="input-fields">
                            <input type="text" id="namaLengkap" name="nama_admin_koperasi" value="{{ old('nama_admin_koperasi') }}">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-fields">
                            <input type="text" id="username" name="username" value="{{ old('username') }}">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-fields">
                            <input type="password" id="password" name="password">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="password">Nama Koperasi</label>
                        <div class="input-fields">
                            <input type="text" id="nama_koperasi" name="nama_koperasi" value="{{ old('nama_koperasi') }}">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="id_admin_kabupatenkota">Nama Kabupaten/Kota</label>
                        <div class="input-fields">
                            <select id="id_admin_kabupatenkota" name="id_admin_kabupatenkota">
                                <option value="">Pilih Kabupaten/Kota</option>
                                @foreach($kabupatenKotaList as $id => $nama_kabupatenkota)
                                    <option value="{{ $id }}">{{ $nama_kabupatenkota }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                    
                    
                    <div class="btn-container">
                        <button type="button" class="btn btn-danger btn-batal" onclick="togglePopup()">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>        
            </div>
                <div id="confirmationPopup" class="confirmation-popup-container">
                    <div class="confirmation-popup-card">
                    <div class="confirmation-popup-title">Konfirmasi Hapus</div>
                    <div class="confirmation-popup-content">
                    <p>Anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="btn-container">
                    <button class="btn-batal-hapus" onclick="closeConfirmationPopup()">Batal</button>
                    <button class="btn-success-hapus" onclick="hapusData()">Hapus</button>
                </div>
                </div>
            </div>

        <div class="success-popup-container" id="successPopup">
            <img src="/img/ceklis.png" alt="Success Image" width="100" height="100">
            <div class="success-popup-title">Sukses!</div>
            <p>Data berhasil ditambahkan.</p>
            <button class="btn btn-success" onclick="closeSuccessPopup()">Tutup</button>
        </div>
    
        <div class="hapus-popup-container" id="hapusPopup">
            <img src="/img/ceklis.png" alt="Success Image" width="100" height="100">
            <div class="success-popup-title">Sukses!</div>
            <p>Data berhasil dihapus.</p>
            <button class="btn btn-success" onclick="closeHapusPopup()">Tutup</button>
        </div>
        
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>