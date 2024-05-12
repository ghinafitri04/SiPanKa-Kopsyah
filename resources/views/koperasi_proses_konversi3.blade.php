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
    <link rel="stylesheet" href="{{ asset('css/proses_konversi3.css') }}">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
</head>

<body>
    @include('layouts.koperasi_sidebar')
    @include('layouts.koperasi_navbar')
    <script src="{{asset('js/script_koperasi.js')}}"></script>
    <script src="{{asset('js/proses_konversi3.js')}}"></script>

    <div class="content">
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="dashboard-title">Proses Konversi</h4>
                </div>
            </div>

             <!-- Step container -->
             <div class="step-container">
                <!-- Step circles -->
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

            <form action="{{ route('prosesTahap3Update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="_method" value="PUT"> 
                <div class="berita-acara-container mt-5">
                    <div class="berita-acara-title-box">
                        <h5 class="berita-acara-title">Nama Notaris</h5>
                        <div>
                            <input type="text" id="nama_notaris" name="nama_notaris" class="inputnamanotaris">
                        </div>
                    </div>
                    <div class="berita-acara-title-box">
                        <h5 class="berita-acara-title">Foto Bukti Pertemuan dengan Notaris</h5>
                        <div class="berita-acara-content-box">
                            <div class="berita-acara-content">
                                <label for="bukti_notaris" class="custom-file-upload">
                                    <input type="file" id="bukti_notaris" name="bukti_notaris" style="opacity: 0;">
                                    <img src="/img/uploadfile.png" alt="Your Image" class="centered-image" style="width: 80px; height: 80px;">
                                    <p class="image-caption">Upload Gambar PNG,JPG, or JPEG</p>
                                </label>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="footer-buttons">
                    <button type="button" class="footer-button footer-button-left" id="previousButton" onclick="goBack()">
                        Sebelumnya
                    </button>

                    <div class="footer-buttons">
                        <button type="submit" class="footer-button" name="action" value="update">
                            <img src="/img/simpanfile.png" alt="Save Icon" />
                            Update
                        </button>
                        <a href="{{ route('prosesTahap4') }}" class="footer-button footer-button-next" style="background-color: #28a745;">
                            <img src="/img/selanjutnya.png" alt="Next Icon" />
                            Selanjutnya
                        </a>
                    </div>
                </div>
            </form>
            
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>

document.getElementById('simpanButton').addEventListener('click', function () {
            var fileName = document.getElementById('perubahan_pad').value.split('\\').pop();
            var confirmUpload = confirm("Apakah Anda yakin akan mengupload " + fileName + "?");
            if (confirmUpload) {
                document.getElementById('formUpload').submit();
            } else {
                // Batalkan pengiriman formulir
            }
        });
     
     function goBack() {
            window.history.back();
        }
        // Event listener untuk memanggil updateImagePreview() saat file dipilih
        document.getElementById('bukti_notaris').addEventListener('change', function (event) {
            const input = event.target;
            updateImagePreview();

            // Kirim data formulir menggunakan AJAX
            const formData = new FormData();
            formData.append('bukti_notaris', input.files[0]);

            fetch('{{ route('prosesTahap3Update') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => {
                    if (response.ok) {
                        // Lakukan sesuatu setelah data terkirim
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
        line.style.backgroundColor = index < step - 1 ? '#00BCD4' : '#ccc';
    });

    function updateImagePreview() {
        const input = document.getElementById('bukti_notaris');
        const imagePreview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();

            reader.onload = function () {
                imagePreview.src = reader.result;
            };

            reader.readAsDataURL(file);
        }
    }

}
    </script>
</body>

</html>
