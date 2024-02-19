<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/navbarsidebar_koperasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/proses_konversi1.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Sipanka KopSyah - Proses Konversi</title>

</head>
<body>

    @include('layouts.koperasi_sidebar')
    @include('layouts.koperasi_navbar')
    <script src="{{asset('js/script_koperasi.js')}}"></script>
    <script src="{{asset('js/proses_konversi1.js')}}"></script>

    <div class="content">
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="dashboard-title">Proses Konversi</h4>
                </div>
            </div>

            <div class="step-container">
                <div class="step-circle" onclick="updateStep(1)">
                    <div class="step-text">1</div>
                    <div class="pencil-icon"></div>
                    
                </div>
                <div class="step-line"></div>
                <div class="step-circle" onclick="updateStep(2)">
                    <div class="step-text">2</div>
                    <div class="pencil-icon"></div>
                </div>
                <div class="step-line"></div>
                <div class="step-circle" onclick="updateStep(3)">
                    <div class="step-text">3</div>
                    <div class="pencil-icon"></div>
                </div>
                <div class="step-line"></div>
                <div class="step-circle" onclick="updateStep(4)">
                    <div class="step-text">4</div>
                    <div class="pencil-icon"></div>
                </div>
            </div>

            <div class="initulisan">
                <span class="step-label">TAHAP 1</span>
                <span class="spasi"> </span>
                <span class="step-label">TAHAP 2</span>
                <span class="spasi"> </span>
                <span class="step-label">TAHAP 3</span>
                <span class="spasi"> </span>
                <span class="step-label">TAHAP 4</span>
            </div>
            
                <div class="keterangan-tahap">
                    <span>Kesepakatan Anggota</span>
                    <span class="spasi2"> </span>
                    <span>Perubahan Akad</span>
                    <span class="spasi2"> </span>
                    <span>Proses PAD</span>
                    <span class="spasi2"> </span>
                    <span>Pengesahan PAD</span>
                </div>

                <div class="berita-acara-container mt-5">
                    <div class="berita-acara-title-box">
                        <h5 class="berita-acara-title">Berita Acara</h5>
                    <div class="berita-acara-content-box">
                        <div class="berita-acara-content">
                            <!-- Tambahkan ikon upload di sini -->
                            <label for="file-upload" class="custom-file-upload">
                                <input type="file" id="file-upload" />
                                <img src="/img/uploadfile.png" alt="Your Image" class="centered-image">
                                <p class="image-caption">Upload Berita Acara</p>
                                {{-- <i class="fa fa-upload"></i> Upload Berita Acara  --}}
                            </label>
                        </div>
                    </div>
                 </div>
                </div>

                <div class="footer-buttons">
                    {{-- <button class="footer-button" id="sebelumnya">
                        <img src="/img/Vector.png" alt="Previous Icon" />
                        Sebelumnya
                    </button> --}}
                    <button class="footer-button">
                        <img src="/img/simpanfile.png" alt="Save Icon" />
                        Simpan
                    </button>
                    <button class="footer-button" style="background-color: #28a745;">
                        <img src="/img/selanjutnya.png" alt="Next Icon" />
                        Selanjutnya
                    </button>
            </div>
            
        </div>
    </div>

    <!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
