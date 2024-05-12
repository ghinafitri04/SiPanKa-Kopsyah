document.addEventListener('DOMContentLoaded', function() {
    // Menggunakan AJAX untuk memuat konten dari view yang sesuai
    function loadAdminProvinsiDashboard() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("main-content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "{{ route('admin_provinsi_dashboard') }}", true);
        xhttp.send();
    }

    

});

