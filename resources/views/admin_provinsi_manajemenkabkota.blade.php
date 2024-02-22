<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/manajemenkabkota.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - ManajemenKabKota</title>
</head>

<body>
    @include('layouts.admin_provinsi_sidebar')
    @include('layouts.admin_provinsi_navbar')
  <div class="content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <h4>
                <strong> Manajemen Kabupaten/Kota</strong>
            </h4>
          </div>
          <button class="tambah-admin" id="btnTambah" onclick="togglePopup()">Tambah Data Admin</button>
        </div>
    </div>

    <div class="overlay" id="overlay"></div>
    <div class="popup-container" id="popupContainer">
        <span class="close-icon" onclick="togglePopup()">
            <img src="/img/close.png" alt="Close Icon" width="15" height="15">
        </span>
        
        <div class="popup-content" id="formTambahAdminContainer">
            <div class="popup-title">Data Admin Kab/Kota</div>
            <form method="POST" action="{{ route('admin_provinsi.manajemen_kab_kota.store') }}">
                @csrf        
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>
                
                <div class="form-group">
                    <label for="kabupatenKota">Kabupaten/Kota</label>
                    <select id="kabupatenKota" name="kabupatenKota" class="form-control" required>
                        <option value="">Pilih Kabupaten/Kota</option>
                        @foreach($kabupatenKotaList as $kabupatenKota)
                            <option value="{{ $kabupatenKota->id_kabupatenkota }}">{{ $kabupatenKota->nama_kabupatenkota }}</option>
                        @endforeach
                    </select>                               
                </div>
                
                <div class="btn-container">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-3" style="margin-left: 4.5cm; margin-right: 4cm;">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Kabupaten/Kota</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            
            <tbody>
                @if(isset($adminKabupatenKota) && count($adminKabupatenKota) > 0)
                    @foreach ($adminKabupatenKota as $admin)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $admin->username }}</td>
                            <td>{{ $admin->password_text }}</td>
                            <td data-kabupaten-kota="{{ $admin->kabupatenKota->id_kabupatenkota }}">
                                {{ $admin->kabupatenKota->nama_kabupatenkota }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn-edit" data-id="{{ $admin->id_admin_kabupatenkota }}">
                                        <img src="/img/Edit.png" alt="Edit Icon" width="30" height="30">
                                    </a>
                                    <form id="form-hapus" action="{{ route('admin_provinsi.manajemen_kab_kota.destroy', ['id' => $admin->id_admin_kabupatenkota]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="delete-btn-container">
                                            <a href="#" class="btn-hapus" data-id="{{ $admin->id_admin_kabupatenkota }}">
                                                <img src="/img/Hapus.png" alt="Hapus" style="width: 30px; height: 30px;">
                                            </a>
                                            <button type="submit" style="display:none;" id="btn-hapus"></button>
                                        </div>
                                    </form>
                                </div>
                            </td>                        
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Tidak ada data yang tersedia</td>
                    </tr>
                @endif
            </tbody>
        </table>        
    </div>
    
    <div class="editz-form" style="display: none;">
        <span class="close-icon" onclick="closeEditForm()">
            <img src="/img/close.png" alt="Close Icon" width="15" height="15">
        </span>
        
        <form method="POST" id="editForm" action="{{ route('admin_provinsi.manajemen_kab_kota.update', ['id' => 'admin_id']) }}">
            @csrf
            @method('PUT')
            <div class="popup-title">Edit Data Admin Kab/Kota</div>
            
            <div class="form-group">
                <label for="editUsername">Username</label>
                <div class="edit-fields">
                    <input type="text" id="editUsername" name="username">
                </div>
            </div>
            
            <div class="form-group">
                <label for="editPassword">Password</label>
                <div class="edit-fields">
                    <input type="text" id="editPassword" name="password">
                </div>
            </div>
            
            <div class="form-group">
                <label for="editKabupatenKota">Kabupaten/Kota</label>
                <div class="edit-fields">
                    <select id="editKabupatenKota" name="kabupatenKota">
                        @foreach($kabupatenKotaList as $kabupatenKota)
                            <option value="{{ $kabupatenKota->id_kabupatenkota }}">{{ $kabupatenKota->nama_kabupatenkota }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="btn-container">
                <button type="button" class="btn btn-danger btn-batal-edit" onclick="cancelEdit()">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
    
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> 
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('js/manajemen_kab.js')}}"></script>
</body>
</html>
