function chooseFile() {
    // Buat elemen input file
    var input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*'; // Hanya terima berkas gambar
    input.style.display = 'none'; // Sembunyikan elemen input

    // Tambahkan event listener untuk menangani pemilihan berkas
    input.addEventListener('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            // Buat objek FileReader untuk membaca berkas gambar
            var reader = new FileReader();

            // Setelah berkas selesai dibaca
            reader.onload = function(e) {
                var previewImage = document.createElement('img');
                previewImage.src = e.target.result;
                previewImage.alt = 'Preview Image';
                previewImage.style.maxWidth = '100%'; // Atur lebar gambar agar sesuai dengan lebar kontainer
                previewImage.style.display = 'block'; // Tampilkan gambar

                // Hapus gambar lama (jika ada) dan tambahkan gambar baru ke kontainer
                var imagePreviewContainer = document.getElementById('imagePreviewContainer');
                imagePreviewContainer.innerHTML = '';
                imagePreviewContainer.appendChild(previewImage);
            };

            // Baca berkas gambar sebagai URL data
            reader.readAsDataURL(file);
        }
    });

    // Klik secara otomatis elemen input saat tombol Edit ditekan
    input.click();
}
