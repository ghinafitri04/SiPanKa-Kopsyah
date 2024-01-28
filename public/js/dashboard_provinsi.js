function loadAdminProvinsiDashboard() {
    // Menggunakan AJAX untuk memuat konten dari view yang sesuai
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "{{ route('admin_provinsi_dashboard') }}", true);
    xhttp.send();
}

function changeContent(view) {
    // Gantilah fungsi ini sesuai dengan kebutuhan Anda
    if (view === 'admin_provinsi_dashboard') {
        loadAdminProvinsiDashboard();
    } else {
        // Logika lain jika diperlukan
    }
}