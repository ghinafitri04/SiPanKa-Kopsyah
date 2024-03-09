<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipanka KopSyah - Proses Konversi</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/navbarsidebar_koperasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/proses_konversi4.css') }}">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
</head>

<body>

    @include('layouts.koperasi_sidebar')
    @include('layouts.koperasi_navbar')
    <script src="{{asset('js/script_koperasi.js')}}"></script>
    <script src="{{asset('js/proses_konversi4.js')}}"></script>

    <div class="content">
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="dashboard-title">Proses Konversi</h4>
                </div>
            </div>

            <div class="step-container">
                <div id="step1" class="step-circle active" onclick="updateStep(1)">
                    <div class="step-text">1</div>
                    <div id="pencil1" class="pencil-icon active"></div>
                </div>

                <div class="step-line" id="line1" style="background-color: #00BCD4;"></div>
                <div id="step2" class="step-circle active" onclick="updateStep(2)">
                    <div class="step-text">2</div>
                    <div id="pencil2" class="pencil-icon active"></div>
                </div>

                <div class="step-line" id="line1" style="background-color: #00BCD4;"></div>
                <div id="step3" class="step-circle active" onclick="updateStep(3)">
                    <div class="step-text">3</div>
                    <div id="pencil3" class="pencil-icon active"></div>
                </div>

                <div class="step-line" id="line1" style="background-color: #00BCD4;"></div>
                <div id="step4" class="step-circle active" onclick="updateStep(4)">
                    <div class="step-text">4</div>
                    <div id="pencil4" class="pencil-icon active"></div>
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
                        <h5 class="berita-acara-title">Pengesahan PAD</h5>
                        <div class="berita-acara-content-box">
                            <div class="berita-acara-content">
                                <!-- Form untuk mengunggah dokumen perubahan PAD -->
                                <form id="formUpload" action="{{ route('prosesTahap4') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="pengesahan_pad" class="custom-file-upload">
                                        <input type="file" id="pengesahan_pad" name="pengesahan_pad" style="display:none">
                                        <img src="/img/uploadfile.png" alt="Your Image" class="centered-image">
                                        <p class="image-caption">Upload Dokumen Perubahan PAD</p>
                                    </label>
                                </form>
                            </div>

                            <div id="pdf-preview-link" style="display: none;">
                                <a id="preview-link" target="_blank" href="#">Lihat Pratinjau PDF</a>
                            </div>
                        </div>
                        <div class="footer-buttons mt-3 d-flex justify-content-between">
                           
                           <div class="d-flex align-items-center">
            <button type="button" class="footer-button footer-button-left" id="simpanButton">
                <img src="/img/simpanfile.png" alt="Save Icon" />
                Simpan
            </button>
            <a href="{{ route('koperasi.tabelkonversi') }}" class="footer-button footer-button-next" style="background-color: #28a745;">
               
                Selesaikan 
            </a>
        </div>
    
                            <button type="button" class="footer-button footer-button-left" id="previousButton" onclick="goBack()">
                                Sebelumnya
                            </button>
                        </div>
                        
                        
                        
                        
                        <!-- Success message -->
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    <!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }

        document.getElementById('simpanButton').addEventListener('click', function () {
            var fileName = document.getElementById('pengesahan_pad').value.split('\\').pop();
            var confirmUpload = confirm("Apakah Anda yakin akan mengupload " + fileName + "?");
            if (confirmUpload) {
                document.getElementById('formUpload').submit();
            } else {
                // Batalkan pengiriman formulir
            }
        });

        document.getElementById('pengesahan_pad').addEventListener('change', function () {
            var input = this;
            var fileName = input.files[0].name;
            var imageCaption = input.parentNode.querySelector('.image-caption');
            imageCaption.textContent = fileName;
        });


        // Event listener untuk memanggil updatePdfPreview() saat file dipilih
        document.getElementById('pengesahan_pad').addEventListener('change', function (event) {
            const input = event.target;
            updatePdfPreview();

            // Kirim data formulir menggunakan AJAX
            const formData = new FormData();
            formData.append('pengesahan_pad', input.files[0]);

            fetch('{{ route('prosesTahap2') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => {
                    if (response.ok) {
                        // Sembunyikan formulir upload
                        hideUploadForm();
                        return response.text();
                    }
                    throw new Error('Network response was not ok.');
                })
                .then(result => console.log(result)) // Tambahkan penanganan respons sesuai kebutuhan
                .catch(error => console.error('Error:', error));
        });

        function updateStep(step) {
            const circles = document.querySelectorAll('.step-circle');
            const lines = document.querySelectorAll('.step-line');

            circles.forEach((circle, index) => {
                if (index < step) {
                    circle.classList.add('active');
                } else {
                    circle.classList.remove('active');
                }
            });

            lines.forEach((line, index) => {
                if (index === step - 1) {
                    line.classList.add('active');
                } else {
                    line.classList.remove('active');
                }
            });
        }

        // Fungsi untuk memperbarui tampilan preview PDF
        function updatePdfPreview() {
            const input = document.getElementById('pengesahan_pad');
            const previewFrame = document.getElementById('pdf-preview-frame');
            const pdfLink = document.getElementById('pdf-link');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function () {
                    previewFrame.src = reader.result;
                    pdfLink.href = reader.result; // Update link to PDF
                };

                reader.readAsDataURL(file);
            }
        }


        // Fungsi untuk menyembunyikan formulir upload
        function hideUploadForm() {
            document.getElementById('formUpload').style.display = 'none';
        }
    </script>
</body>

</html>
