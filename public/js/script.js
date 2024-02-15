// Fungsi untuk mengubah konten
function changeContent(content) {
    document.getElementById("dashboardContent").innerHTML = `<h1>${content}</h1>`;
}

// Fungsi untuk menangani toggle sidebar dan submenu
function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var navbar = document.getElementById("mainNavbar");

    // Toggle class 'collapsed' pada sidebar
    sidebar.classList.toggle("collapsed");

    // Toggle class 'navbar-shifted' pada navbar
    navbar.classList.toggle("navbar-shifted");

    // Toggle class 'body-shifted' pada body
    document.body.classList.toggle("body-shifted");

    // Tambahkan kelas 'black' pada navbar untuk mengubah warna latar belakang
    navbar.classList.toggle("black", navbar.classList.contains("navbar-shifted"));

    // Tambahkan atau hapus class 'collapsed' pada sidebar header tergantung dari kondisi saat ini
    var sidebarHeader = document.querySelector(".sidebar-header");
    sidebarHeader.classList.toggle("collapsed", sidebar.classList.contains("collapsed"));

    // Simpan status sidebar di localStorage
    var sidebarStatus = sidebar.classList.contains("collapsed") ? "collapsed" : "expanded";
    localStorage.setItem("sidebarStatus", sidebarStatus);
}

// Fungsi untuk menangani toggle submenu
function toggleSubMenu(submenuId) {
    var submenu = document.getElementById(submenuId);
    submenu.classList.toggle('show');
}



// Fungsi untuk menangani klik pada link di sidebar
function handleSidebarLinkClick(event) {
    event.preventDefault();
    event.stopPropagation();
    console.log('Handle Sidebar Link Click function called');
    changeContent('Dashboard');
}

function handleOtherClicks(event) {
    // Logika penanganan event lainnya
    event.stopPropagation(); // Mencegah event klik menyebar
}

document.addEventListener('DOMContentLoaded', function() {
    var savedSidebarStatus = localStorage.getItem("sidebarStatus");
    var sidebar = document.getElementById("sidebar");
    var navbar = document.getElementById("mainNavbar");

    if (savedSidebarStatus === "collapsed") {
        sidebar.classList.add("collapsed");
        navbar.classList.add("navbar-shifted");
        document.body.classList.add("body-shifted");
        navbar.classList.add("black");
        var sidebarHeader = document.querySelector(".sidebar-header");
        sidebarHeader.classList.add("collapsed");
    }
});


window.addEventListener('popstate', function(event) {
    // Tambahkan logika yang diperlukan, seperti mengecek URL dan menjalankan script sesuai
    console.log('URL changed:', window.location.href);
});

window.addEventListener('load', function() {
    var savedSidebarStatus = localStorage.getItem("sidebarStatus");
    var sidebar = document.getElementById("sidebar");
    var navbar = document.getElementById("mainNavbar");

    if (savedSidebarStatus === "collapsed") {
        sidebar.classList.add("collapsed");
        var sidebarHeader = document.querySelector(".sidebar-header");
        sidebarHeader.classList.add("collapsed");
    }
});


     
function logout() {
    console.log('Logout button clicked'); // Pastikan bahwa fungsi logout() dijalankan
    fetch('/logout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({}),
    })
    .then(response => {
        if (response.ok) {
            window.location.href = '/login';
        } else {
            console.error('Logout request failed');
        }
    })
    .catch(error => {
        console.error('Network error:', error);
    });
}
