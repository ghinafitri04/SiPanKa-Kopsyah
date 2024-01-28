// Fungsi untuk mengubah konten
function changeContent(content) {
    // Fungsi ini akan menangani perubahan konten sesuai dengan parameter 'content'
    // Misalnya, Anda dapat menggunakan AJAX untuk mengambil konten halaman dari server
    // dan menempatkannya dalam elemen yang dituju (misalnya, sebuah div dengan ID 'contentContainer')

    // Contoh pengaturan sederhana, ganti ini sesuai dengan kebutuhan Anda
    var contentContainer = document.getElementById("contentContainer");

    switch (content) {
        case "tes":
            contentContainer.innerHTML =
                "Ini adalah halaman Manajemen Kab/Kota";
            break;
        case "AdminDPS":
            contentContainer.innerHTML = "Ini adalah halaman Admin DPS";
            break;
        case "PengawasanDPS":
            contentContainer.innerHTML = "Ini adalah halaman Pengawasan DPS";
            break;
        case "AdminKoperasi":
            contentContainer.innerHTML = "Ini adalah halaman Admin Koperasi";
            break;
        case "KonversiKoperasi":
            contentContainer.innerHTML = "Ini adalah halaman Konversi Koperasi";
            break;
        default:
            // Default, mungkin tampilkan pesan kesalahan atau halaman default
            contentContainer.innerHTML = "Halaman tidak ditemukan";
    }
}

// Menggunakan ID tautan "Manajemen Kab/Kota" untuk menangani klik
document
    .getElementById("manajemenKabKotaLink")
    .addEventListener("click", function (event) {
        event.preventDefault();
        changeContent("admin_provinsi_manajemenkabkota"); // Ganti dengan nilai sesuai dengan kebutuhan Anda
    });

// Fungsi untuk logout (sesuaikan dengan kebutuhan Anda)
function logout() {
    // Implementasi fungsi logout di sini
    alert("Anda telah logout!");
}
