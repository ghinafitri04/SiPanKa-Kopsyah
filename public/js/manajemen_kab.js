function loadAdminProvinsiDashboard() {
    // Menggunakan AJAX untuk memuat konten dari view yang sesuai
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "{{ route('tes') }}", true);
    xhttp.send();
}

function changeContent(view) {
    if (view === 'admin_provinsi_dashboard') {
        loadAdminProvinsiDashboard();
    } else {
       
    }
}

function togglePopup() {
    var overlay = document.getElementById("overlay");
    var popupContainer = document.getElementById("popupContainer");

    overlay.style.display = (overlay.style.display === "none") ? "block" : "none";
    popupContainer.style.display = (popupContainer.style.display === "none") ? "block" : "none";
}

var btnTambah = document.getElementById("btnTambah");
btnTambah.addEventListener("click", togglePopup);