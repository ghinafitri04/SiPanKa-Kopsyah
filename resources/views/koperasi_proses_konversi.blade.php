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
                                    <input type="file" id="rapat_anggota" name="rapat_anggota" style="display:none">
                                    <img src="/img/uploadfile.png" alt="Your Image" id="pdf-preview-img" class="centered-image">
                                    <p class="image-caption">Upload Dokumen Rapat Anggota</p>
                                </label>

                                <!-- Footer buttons with reversed order -->
                                <div class="footer-buttons text-right mt-3">
                                    <a href="{{ route('prosesTahap2') }}" class="footer-button footer-button-next" style="background-color: #28a745;">
                                        <img src="/img/selanjutnya.png" alt="Next Icon" />
                                        Selanjutnya
                                    </a>
                                    <button type="button" class="footer-button footer-button-left" id="simpanButton">
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
                            <a id="preview-link" target="_blank" href="#">Lihat Pratinjau PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('simpanButton').addEventListener('click', function () {
            var fileName = document.getElementById('rapat_anggota').value.split('\\').pop();
            var confirmUpload = confirm("Apakah Anda yakin akan mengupload " + fileName + "?");
            if (confirmUpload) {
                document.getElementById('formUpload').submit();
            } else {
                // Batalkan pengiriman formulir
            }
        });

        function updatePdfPreview() {
            const input = document.getElementById('rapat_anggota');
            const previewFrame = document.getElementById('pdf-preview-frame');

            if (input.files && input.files[0]) {
                const file = input.files[0];
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
                                // Hapus konten yang sudah ada sebelumnya pada iframe
                                previewFrame.contentDocument.documentElement.innerHTML = '';
                                previewFrame.src = canvas.toDataURL('image/png');
                                // Tampilkan link preview PDF
                                document.getElementById('pdf-preview-link').style.display = 'block';
                                document.getElementById('preview-link').href = previewFrame.src;
                            });
                        });
                    });
                };

                fileReader.readAsArrayBuffer(file);
            }
        }

        document.getElementById('rapat_anggota').addEventListener('change', function () {
            var input = this;
            var fileName = input.files[0].name;
            var imageCaption = input.parentNode.querySelector('.image-caption');
            imageCaption.textContent = fileName;
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
                line.style.backgroundColor = index < step - 1 ? '#00BCD4' : '#ccc';
            });
        }

        // Fungsi untuk mengatur elemen yang sesuai saat halaman dimuat
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

        // Panggil fungsi setInitialStep saat halaman dimuat
        window.onload = function () {
            setInitialStep();
            // updatePdfPreview(); // Tidak perlu memanggil di sini karena akan dipanggil saat mengunggah file

            // Cek apakah ada file yang diunggah pada sesi sebelumnya
            const uploadedFile = localStorage.getItem('uploadedFile');
            if (uploadedFile) {
                // Jika ada, perbarui pratinjau dengan file tersebut
                document.getElementById('pdf-preview-frame').src = uploadedFile;
                // Tampilkan link preview PDF
                document.getElementById('pdf-preview-link').style.display = 'block';
                document.getElementById('preview-link').href = uploadedFile;
            }
        };

        // Panggil fungsi updatePdfPreview saat dokumen diunggah
        document.getElementById('formUpload').addEventListener('submit', function () {
            updatePdfPreview();
        });
    </script>
</body>

</html>
