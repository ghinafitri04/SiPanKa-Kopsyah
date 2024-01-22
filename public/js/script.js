// public/js/script.js

function changeContent(content) {
    document.getElementById(
        "dashboardContent"
    ).innerHTML = `<h1>${content}</h1>`;
}

function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var navbar = document.getElementById("mainNavbar");

    // Toggle the collapsed class on the sidebar
    sidebar.classList.toggle("collapsed");

    // Toggle the shifted class on the navbar
    navbar.classList.toggle("navbar-shifted");
}
