<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipanka KopSyah - Proses Konversi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/navbarsidebar_koperasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/proses_konversi1.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS styles */
        .footer-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #pdf-preview-link {
            margin-top: 85px;
        }
    </style>
</head>

<body>
    @include('layouts.koperasi_sidebar')
    @include('layouts.koperasi_navbar')
    <script src="{{ asset('js/script_koperasi.js') }}"></script>
    <script src="{{ asset('js/proses_konversi1.js') }}"></script>

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
                            <form id="formUpload" action="{{ route('prosesTahap1Submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="rapat_anggota" class="custom-file-upload">
                                    <input type="file" id="rapat_anggota" name="rapat_anggota" style="display:none" onchange="updateFileName()">
                                    <img src="/img/uploadfile.png" alt="Your Image" id="pdf-preview-img" class="centered-image">
                                    <span id="file-selected-text" class="image-caption">Upload Dokumen Rapat Anggota</span>
                                </label>
                                

                                <!-- Footer buttons with reversed order -->
                                <div class="footer-buttons text-right mt-3">
                                    <a href="{{ route('prosesTahap2') }}" class="footer-button footer-button-next" style="background-color: #28a745;">
                                        <img src="/img/selanjutnya.png" alt="Next Icon" />
                                        Selanjutnya
                                    </a>
                                    <button type="submit" class="footer-button footer-button-left" id="simpanButton">
                                        <img src="/img/simpanfile.png" alt="Save Icon" />
                                        Simpan
                                    </button>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success mt-3">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </form>
                        </div>

                                                <!-- Preview PDF link -->
                        <div id="pdf-preview-link" style="display: none;">
                            <span id="preview-text">Lihat Kesepakatan Anggota</span>
                        </div>


                        <!-- PDF Preview Frame -->
                        <iframe id="pdf-preview-frame" style="width:100%; height:500px; display:none;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>


    <script>
        // Panggil fungsi setInitialStep saat halaman dimuat
        window.onload = function () {
            // Pindahkan pemanggilan setInitialStep() ke dalam bagian ini
            setInitialStep();
    
            // Cek apakah ada file yang diunggah pada sesi sebelumnya
            const uploadedFile = localStorage.getItem('uploadedFile');
            if (uploadedFile) {
                // Jika ada, perbarui pratinjau dengan file tersebut
                document.getElementById('pdf-preview-frame').src = uploadedFile;
                // Tampilkan iframe dengan pratinjau PDF
                document.getElementById('pdf-preview-frame').style.display = 'block';
                // Tampilkan link preview PDF
                document.getElementById('pdf-preview-link').style.display = 'block';
                document.getElementById('preview-link').href = uploadedFile;
            }
        };
    
        // Panggil fungsi updatePdfPreview saat dokumen diunggah
        document.getElementById('formUpload').addEventListener('submit', function (event) {
            event.preventDefault(); // Hindari pengiriman form secara otomatis
    
            // Dapatkan file yang diunggah
            const file = document.getElementById('rapat_anggota').files[0];
    
            if (file) {
                var fileName = file.name;
                var confirmUpload = confirm("Apakah Anda yakin akan mengupload " + fileName + "?");
                if (confirmUpload) {
                    // Panggil fungsi updatePdfPreview() setelah pengguna mengonfirmasi pengungahan file
                    updatePdfPreview(file);
                    // Simpan file yang diunggah di Local Storage
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        localStorage.setItem('uploadedFile', e.target.result);
                    };
                    reader.readAsDataURL(file);
                } else {
                    // Batalkan pengiriman formulir jika pengguna membatalkan pengungahan
                }
            }
        });
    
        function updatePdfPreview(file) {
            const pdfContainer = document.getElementById('pdf-preview-frame');

            const fileReader = new FileReader();
            fileReader.onload = function () {
                const typedarray = new Uint8Array(this.result);
                pdfjsLib.getDocument(typedarray).promise.then(function (pdf) {
                    pdf.getPage(1).then(function (page) {
                        const scale = 1.5;
                        const viewport = page.getViewport({ scale: scale });

                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        const renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };

                        page.render(renderContext).promise.then(function () {
                            // Hapus konten yang sudah ada sebelumnya di dalam pdfContainer
                            pdfContainer.innerHTML = '';
                            // Tambahkan pratinjau PDF ke dalam pdfContainer
                            pdfContainer.appendChild(canvas);
                            // Tampilkan iframe dengan pratinjau PDF
                            pdfContainer.style.display = 'block';
                            // Tampilkan link preview PDF
                            document.getElementById('pdf-preview-link').style.display = 'block';
                            document.getElementById('preview-link').href = canvas.toDataURL('image/png');
                        });
                    });
                });
            };
            fileReader.readAsArrayBuffer(file);
        }

        function setInitialStep() {
            // Hapus kelas active dari semua ikon pensil
            const pencils = document.querySelectorAll('.pencil-icon');
            pencils.forEach(pencil => {
                pencil.classList.remove('active');
            });
    
            // Tambahkan kelas active pada ikon pensil tahap 1
            const pencil1 = document.getElementById('pencil1');
            pencil1.classList.add('active');
            // Sembunyikan link preview PDF saat halaman dimuat
            document.getElementById('pdf-preview-link').style.display = 'none';
        }

        function updateFileName() {
        const fileInput = document.getElementById('rapat_anggota');
        const fileName = fileInput.files[0].name;
        document.getElementById('file-selected-text').textContent = fileName;
    }

    </script>
    
</body>

</html>