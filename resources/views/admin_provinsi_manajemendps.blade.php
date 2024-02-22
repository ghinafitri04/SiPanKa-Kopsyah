<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admindps.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Admin DPS</title>
</head>

<body>
  @include('layouts.admin_provinsi_sidebar')
  @include('layouts.admin_provinsi_navbar')
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('js/admindps.js')}}"></script>

  <div class="content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <h4>
              <strong>Manajemen DPS / Admin DPS</strong>
            </h4>
          </div>
          <button class="tambah-admin" id="btnTambah">Tambah Data DPS</button>
        </div>
      </div>
  
      <div class="overlay" id="overlay"></div>
      <div class="popup-container" id="popupContainer">
        <span class="close-icon">
          <img src="/img/close.png" alt="Close Icon" width="15" height="15">
        </span>
  
        <div class="popup-content" id="formTambahAdminContainer">
          <div class="popup-title">Data DPS</div>
          <form method="POST" action="{{ route('admin_provinsi.manajemen_dps.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="namaLengkap">Nama Lengkap</label>
              <div class="input-fields">
                <input type="text" id="namaLengkap" name="nama_lengkap">
              </div>
            </div>
  
            <input type="hidden" name="role" value="dps">
  
            <div class="form-group">
              <label for="username">Username</label>
              <div class="input-fields">
                <input type="text" id="username" name="username">
              </div>
            </div>
  
            <div class="form-group">
              <label for="password">Password</label>
              <div class="input-fields">
                <input type="password" id="password" name="password">
              </div>
            </div>
  
            <div class="form-group">
              <label for="kontak">Kontak</label>
              <div class="input-fields">
                <input type="text" id="kontak" name="kontak">
              </div>
            </div>
  
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <div class="input-fields">
                <textarea id="alamat" name="alamat"></textarea>
              </div>
            </div>
  
            <div class="form-group">
              <label for="sertifikat">Sertifikat (PDF)</label>
              <div class="input-fields">
                <input type="file" id="sertifikat" name="sertifikat">
              </div>
            </div>
  
            <div class="btn-container">
              <button type="button" class="btn btn-danger btn-batal" >Batal</button>
              <button type="submit" class="btn btn-success" id="btnTambahForm">Tambah</button>
            </div>
          </form>
        </div>
      </div>

    <div class="mt-3" style="margin-left: 4.5cm; margin-right: 4cm;">
        <table class="table">
            <thead class="table-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Akses Login</th>
                <th scope="col">No HP</th>
                <th scope="col">Alamat</th>
                <th scope="col">Sertifikat</th>
                <th scope="col">Tindakan</th>
              </tr>
            </thead>
            <tbody>
              @foreach($dpsList as $key => $dps)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $dps->nama_lengkap }}</td>
                <td>
                  <img src="/img/Profile Icon.png" alt="Profile Icon" width="15" height="15"> {{ $dps->username }}<br>
                  <img src="/img/Lock Icon.png" alt="Lock Icon" width="15" height="15"> {{ $dps->password_text }}
                </td>
                <td>{{ $dps->kontak }}</td>
                <td>{{ $dps->alamat }}</td>
                <td>
                  <a href="{{ route('sertifikat.show', ['filename' => basename($dps->sertifikat)]) }}" target="_blank">{{ basename($dps->sertifikat) }}</a>
                </td>
                <td>
                  <form id="form-hapus-{{ $dps->id_dps }}" action="{{ route('admin_provinsi.manajemen_dps.destroy', ['id' => $dps->id_dps]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <a href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data DPS ini?')) document.getElementById('form-hapus-{{ $dps->id }}').submit();">
                        <img src="/img/Hapus.png" alt="Hapus" width="30" height="30">
                    </a>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> 
</body>
</html>