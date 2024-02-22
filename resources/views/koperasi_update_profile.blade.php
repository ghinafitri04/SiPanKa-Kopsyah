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

    <div class="content">
        <!-- Logo Box -->
        <div class="logo-box">
            <h5>Logo Koperasi</h5>
            <div class="border-gray">
                <img src="/img/logo_koperasi.png" alt="Profile Image">
            </div>
            <input type="file" id="imageInput" onchange="previewImage(event)">
<img id="imagePreview" src="#" alt="Preview Image" style="display:none;">

            <div class="edit-icon">
                <!-- Tambahkan id pada tombol Edit untuk referensi JavaScript -->
                <button id="editButton" class="edit-button" onclick="chooseFile()">
                    <img src="/img/Edit_gambar.png" alt="Edit Icon">
                </button>
            </div>
        </div>
        
        
        <div class="main-box">
            <!-- Box Profile -->
            <div class="profile-box">
                <h5 class="profile-title">Lengkapi Profile</h5>
                <div class="border-gray"></div> <!-- Border abu-abu di bawah judul -->

           
                @if($koperasi->id_koperasi)
                <a href="{{ route('update_profile_koperasi', ['id' => $koperasi->id_koperasi]) }}"></a>

            @else
                <p>ID koperasi tidak valid.</p>
            @endif
            




                @csrf

                @if ($koperasi)
                
                    <div class="table-row">
                        <div class="table-col">
                            <label for="adminName">Nama lengkap Admin</label>
                            <div id="adminName">
                                {{ $koperasi->nama_admin_koperasi ?? 'Belum diisi' }}
                            </div>
                        </div>
                        <div class="table-col">
                            <label for="coopName">Nama koperasi:</label>
                            <div id="coopName">
                                {{ $koperasi->nama_koperasi ?? 'Belum diisi' }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-row">
                        <div class="table-col">
                            <label for="legalNumber">No Badan Hukum:</label>
                            <div id="legalNumber">
                                {{ $koperasi->no_badan_hukum ?? 'Belum diisi'}}
                            </div>
                        </div>
                        <div class="table-col">
                            <label for="legalDate">Tanggal Badan Hukum:</label>
                            <div id="legalDate">
                                {{ $koperasi->tanggal_badan_hukum ?? 'Belum diisi' }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-row">
                        <div class="table-col full-width">
                            <label for="address">Alamat:</label>
                            <div id="address">
                                {{ $koperasi->alamat ?? 'Belum diisi' }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-row">
                        <div class="table-col">
                            <label for="district">Kecamatan:</label>
                            <div id="district">
                                {{ $koperasi->kecamatan ?? 'Belum diisi' }}
                            </div>
                        </div>
                        <div class="table-col">
                            <label for="city">Kabupaten/Kota:</label>
                            <div id="city">
                                {{ $kabupatenKota->nama_kabupatenkota ?? 'Belum diisi' }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-row">
                        <div class="table-col">
                            <label for="kelurahan">Kelurahan:</label>
                            <div id="subdistrict">
                                {{ $koperasi->kelurahan ?? 'Belum diisi' }}
                            </div>
                        </div>
                        <div class="table-col">
                            <label for="notelp">No Telp:</label>
                            <div id="phoneNumber">
                                {{ $koperasi->no_telp ?? 'Belum diisi'}}
                            </div>
                        </div>
                    </div>
                @else
                    <p>Data koperasi tidak ditemukan.</p>
                @endif

                <button type="submit">Simpan</button>

            
           
            </div>

        </div>
    </div>
    <script>
        function chooseFile() {
            // Fungsi untuk memilih file gambar
            console.log('Tombol Edit ditekan!');
            // Temukan input file gambar dan klik secara otomatis saat tombol Edit ditekan
            document.getElementById('imageInput').click();
        }

        function previewImage(event) {
    var imageInput = event.target;
    var imagePreview = document.getElementById('imagePreview');

    // Pastikan file dipilih
    if (imageInput.files && imageInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
        }

        reader.readAsDataURL(imageInput.files[0]);
    }
}

    </script>

    
    
    <script>
        var url = window.location.href;
        var decodedUrl = decodeURIComponent(url);
        window.history.replaceState({}, document.title, decodedUrl);
    </script>
    
    <!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
