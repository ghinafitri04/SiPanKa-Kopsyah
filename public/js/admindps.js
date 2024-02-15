document.addEventListener("DOMContentLoaded", function () {
    var overlay = document.getElementById("overlay");
    var popupContainer = document.getElementById("popupContainer");
    var btnTambah = document.getElementById("btnTambah");
    var formContainer = document.getElementById("formTambahAdminContainer");

    btnTambah.addEventListener("click", function () {
        overlay.style.display = "block";
        popupContainer.style.display = "flex";
        formContainer.style.display = "block";
    });

    var closeIcon = document.querySelector(".close-icon");
    closeIcon.addEventListener("click", function () {
        overlay.style.display = "none";
        popupContainer.style.display = "none";
        formContainer.style.display = "none";
    });

    var btnCancel = document.querySelector(".btn-danger");
    btnCancel.addEventListener("click", function () {
        overlay.style.display = "none";
        popupContainer.style.display = "none";
        formContainer.style.display = "none";
    });


    document.getElementById('form-hapus-{{ $dps }}').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah formulir dikirim secara langsung
        var form = this;
        if (confirm('Apakah Anda yakin ingin menghapus data DPS ini?')) {
            // Menggunakan Axios atau jQuery untuk mengirim permintaan DELETE secara asinkron
            axios.delete(form.action)
                .then(function(response) {
                    // Tindakan jika penghapusan berhasil
                    console.log(response.data.message); // Log pesan sukses
                    // Tambahkan kode lain yang ingin Anda jalankan setelah penghapusan berhasil
                })
                .catch(function(error) {
                    // Tangani kesalahan jika penghapusan gagal
                    console.error('Gagal menghapus data:', error.response.data.message); // Log pesan gagal
                    // Tambahkan kode lain yang ingin Anda jalankan setelah penghapusan gagal
                });
        }
    });
    
        
});           
