<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/navbarsidebar_koperasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/updateprofil.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Sipanka KopSyah - Update Profil</title>
</head>

<body>
    @include('layouts.koperasi_sidebar')
    @include('layouts.koperasi_navbar')
    <script src="{{asset('js/script_koperasi.js')}}"></script>
    <script src="{{asset('js/koperasi_updateprofile.js')}}"></script>

    <div class="content">
        <!-- Logo Box -->
        <div class="logo-box">
            <h5>Logo Koperasi</h5>
            <div class="border-gray" id="imagePreviewContainer"> 
            </div>
          
            <div class="edit-icon">
                <button id="editButton" class="edit-button" onclick="chooseFile()">
                    <img src="/img/Edit_gambar.png" alt="Edit Icon">
                </button>
            </div>
        </div>
        
        <div class="main-box">
            <!-- Implementasi -->
            <div class="profile-box">
                <h5 class="profile-title">Lengkapi Profile</h5>
                <div class="border-gray"></div> <!-- Border abu-abu di bawah judul -->

                @if ($koperasi)
                <form action="{{ route('koperasi_update_profile.store', ['id' => $koperasi->id_koperasi]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $koperasi->id_koperasi ?? '' }}">
                    
                    <div class="table-row">
                        <div class="table-col">
                            <label for="adminName">Nama lengkap Admin</label>
                            <div id="adminName">{{ $koperasi->nama_admin_koperasi ?? 'Belum diisi' }}</div>
                        </div>
                        <div class="table-col">
                            <label for="coopName">Nama koperasi:</label>
                            <div id="coopName">{{ $koperasi->nama_koperasi ?? 'Belum diisi' }}</div>
                        </div>
                    </div>
                    
                    <div class="table-row">
                        <div class="table-col">
                            <label for="legalNumber">No Badan Hukum:</label>
                            <input type="text" id="no_badan_hukum" name="no_badan_hukum" value="{{ $koperasi->no_badan_hukum }}">
                        </div>
                        <div class="table-col">
                            <label for="legalDate">Tanggal Badan Hukum:</label>
                            <input type="date" id="tanggal_badan_hukum" name="tanggal_badan_hukum" value="{{ $koperasi->tanggal_badan_hukum }}">
                        </div>
                    </div>
                    
                    <div class="table-row">
                        <div class="table-col">
                            <label for="alamat">Alamat:</label>
                            <input type="text" id="alamat" name="alamat" value="{{ $koperasi->alamat }}">
                        </div>
                    </div>
                    
                    <div class="table-row">
                        <div class="table-col">
                            <label for="district">Kecamatan:</label>
                            <input type="text" id="district" name="kecamatan" value="{{ $koperasi->kecamatan }}">
                        </div>
                        <div class="table-col">
                            <label for="city">Kabupaten/Kota:</label>
                            <div id="id_admin_kabupatenkota">{{ $kabupatenKota->nama_kabupatenkota ?? 'Belum diisi' }}</div>
                        </div>
                    </div>
                    
                    <div class="table-row">
                        <div class="table-col">
                            <label for="kelurahan">Kelurahan:</label>
                            <input type="text" id="kelurahan" name="kelurahan" value="{{ $koperasi->kelurahan }}">
                        </div>
                        <div class="table-col">
                            <label for="phoneNumber">No Telp:</label>
                            <input type="tel" id="phoneNumber" name="no_telp" value="{{ $koperasi->no_telp }}">
                        </div>
                    </div>

                    <div class="table-row">
                        <div class="table-col">
                            <label for="logo">Logo Koperasi:</label>
                            <input type="file" id="logo" name="logo">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                @else
                    <p>Data koperasi tidak ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
  
    <!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
