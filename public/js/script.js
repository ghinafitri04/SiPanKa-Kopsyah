// Fungsi untuk mengubah konten
function changeContent(content) {
    // Fungsi ini akan menangani perubahan konten sesuai dengan parameter 'content'
    // Misalnya, Anda dapat menggunakan AJAX untuk mengambil konten halaman dari server
    // dan menempatkannya dalam elemen yang dituju (misalnya, sebuah div dengan ID 'contentContainer')

    // Contoh pengaturan sederhana, ganti ini sesuai dengan kebutuhan Anda
    var contentContainer = document.getElementById("contentContainer");
    var message;

    switch (content) {
        case "tes":
            message = "Ini adalah halaman Manajemen Kab/Kota";
            break;
        case "AdminDPS":
            message = "Ini adalah halaman Admin DPS";
            break;
        case "PengawasanDPS":
            message = "Ini adalah halaman Pengawasan DPS";
            break;
        case "AdminKoperasi":
            message = "Ini adalah halaman Admin Koperasi";
            break;
        case "KonversiKoperasi":
            message = "Ini adalah halaman Konversi Koperasi";
            break;
        default:
            // Default, mungkin tampilkan pesan kesalahan atau halaman default
            message = "Halaman tidak ditemukan";
    }

    contentContainer.innerHTML = `<h1>${message}</h1>`;
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

// Fungsi untuk mengubah konten
function changeContent(content) {
    document.getElementById(
        "dashboardContent"
    ).innerHTML = `<h1>${content}</h1>`;
}

// Fungsi untuk menangani toggle sidebar dan submenu
function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var navbar = document.getElementById("mainNavbar");

    // Toggle the collapsed class on the sidebar
    sidebar.classList.toggle("collapsed");

    // Toggle the shifted class on the navbar
    navbar.classList.toggle("navbar-shifted");

    // Toggle the shifted class on the body
    document.body.classList.toggle("body-shifted");

    // Tambahkan kelas black pada navbar untuk mengubah warna latar belakang
    navbar.classList.toggle(
        "black",
        navbar.classList.contains("navbar-shifted")
    );

    // Tambahkan kelas collapsed pada sidebar header untuk mengubah warna latar belakang
    var sidebarHeader = document.querySelector(".sidebar-header");
    sidebarHeader.classList.toggle(
        "collapsed",
        sidebar.classList.contains("collapsed")
    );
}

// Fungsi untuk menangani toggle submenu
function toggleSubMenu(submenuId) {
    var submenu = document.getElementById(submenuId);
    submenu.classList.toggle("show");
}
