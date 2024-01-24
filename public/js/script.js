    // Fungsi untuk mengubah konten
    function changeContent(content) {
    document.getElementById("dashboardContent").innerHTML = `<h1>${content}</h1>`;
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
    navbar.classList.toggle("black", navbar.classList.contains("navbar-shifted"));

    // Tambahkan kelas collapsed pada sidebar header untuk mengubah warna latar belakang
    var sidebarHeader = document.querySelector(".sidebar-header");
    sidebarHeader.classList.toggle("collapsed", sidebar.classList.contains("collapsed"));
    }   

    // Fungsi untuk menangani toggle submenu
    function toggleSubMenu(submenuId) {
        var submenu = document.getElementById(submenuId);
        submenu.classList.toggle('show');
    }
    // Fungsi untuk logout (sesuaikan dengan kebutuhan Anda)
    function logout() {
        // Implementasi fungsi logout di sini
        alert("Anda telah logout!");
    }
