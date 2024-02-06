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
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('js/manajemen_kab.js')}}"></script>

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
                <input type="text" id="username" name="username">
            </div>
        
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
        
            <div class="form-group">
                <label for="kabupatenKota">Kabupaten/Kota</label>
                <select id="kabupatenKota" name="kabupatenKota">
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

    <div class="mt-3" style="margin-left: 6.5cm; margin-right: 4cm;">
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
                @foreach ($adminKabupatenKota as $index => $admin)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <img src="/img/Profile Icon.png" alt="Profile Icon" width="15" height="15"> {{ $admin->username }}<br>
                        </td>
                        <td>
                            <img src="/img/Lock Icon.png" alt="Lock Icon" width="15" height="15"> {{ $admin->password_text }}
                        </td>
                        <td>{{ $admin->kabupatenKota->nama_kabupatenkota }}</td>
                        <td>
                            <a href="#" class="btn-edit" data-id="{{ $admin->id_admin_kabupatenkota }}">
                                <img src="/img/Edit.png" alt="Edit Icon" width="30" height="30">
                            </a>
                            <a href="#" class="btn-hapus" data-id="{{ $admin->id_admin_kabupatenkota }}">
                                <img src="/img/Hapus.png" alt="Delete Icon" width="30" height="30">
                            </a>
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
        
        <form>
            <div class="popup-title">Edit Data Admin Kab/Kota</div>
        
                <div class="form-group">
                    <label for="editNamaLengkap">Nama Lengkap</label>
                    <div class="edit-fields">
                        <input type="text" id="editNamaLengkap" name="editNamaLengkap">
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="editUsername">Username</label>
                    <div class="edit-fields">
                        <input type="text" id="editUsername" name="editUsername">
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="editPassword">Password</label>
                    <div class="edit-fields">
                        <input type="password" id="editPassword" name="editPassword">
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="kabupatenKota">Kabupaten/Kota</label>
                        <div class="custom-select">
                            <div class="editable-option" id="selectedKabupatenKotaEdit" onclick="toggleOptionsList('edit')">Pilih Kabupaten/Kota</div>
                            <ul class="options" id="kabupatenKotaOptionsEdit">
                                <li value="kabupaten_1">Kabupaten Agam</li>
                                <li value="kabupaten_2">Kabupaten Dharmasraya</li>
                                <li value="kabupaten_3">Kabupaten Kepulauan Mentawai</li>
                                <li value="kabupaten_4">Kabupaten Lima Puluh Kota</li>
                                <li value="kabupaten_5">Kabupaten Padang Pariaman</li>
                                <li value="kabupaten_6">Kabupaten Pasaman</li>
                                <li value="kabupaten_7">Kabupaten Pasaman Barat</li>
                                <li value="kabupaten_8">Kabupaten Pesisir Selatan</li>
                                <li value="kabupaten_9">Kabupaten Sijunjung</li>
                                <li value="kabupaten_10">Kabupaten Solok</li>
                                <li value="kabupaten_11">Kabupaten Solok Selatan</li>
                                <li value="kabupaten_12">Kabupaten Tanah Datar</li>
                                <li value="kota_1">Kota Bukittinggi</li>
                                <li value="kota_2">Kota Padang</li>
                                <li value="kota_3">Kota Padang Panjang</li>
                                <li value="kota_4">Kota Pariaman</li>
                                <li value="kota_5">Kota Payakumbuh</li>
                                <li value="kota_6">Kota Sawahlunto</li>
                                <li value="kota_7">Kota Solok</li>
                            </ul>
                        </div>
                        <input type="hidden" id="selectedKabupatenKotaEditValue" name="selectedKabupatenKotaEdit" value="" />
                </div>
        
                <div class="btn-container">
                    <button type="button" class="btn btn-danger btn-batal-edit" onclick="cancelEdit()">Batal</button>
                    <button type="button" class="btn btn-success" onclick="simpanPerubahan()">Simpan</button>
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
            <p>Data Berhasil Ditambahkan</p>
            <button class="btn btn-success" onclick="closeSuccessPopup()">Tutup</button>
        </div>
    
        <div class="edit-popup-container" id="editPopup">
            <img src="/img/ceklis.png" alt="Success Image" width="100" height="100">
            <div class="success-popup-title">Sukses!</div>
            <p>Data Berhasil Diedit</p>
            <button class="btn btn-success" onclick="closeEditPopup()">Tutup</button>
        </div>
    
        <div class="hapus-popup-container" id="hapusPopup">
            <img src="/img/ceklis.png" alt="Success Image" width="100" height="100">
            <div class="success-popup-title">Sukses!</div>
            <p>Data Berhasil Dihapus</p>
            <button class="btn btn-success" onclick="closeHapusPopup()">Tutup</button>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>