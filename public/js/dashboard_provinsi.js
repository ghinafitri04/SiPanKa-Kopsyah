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

    

    // Mengambil jumlah admin kabupaten/kota
    fetch("{{ route('admin_provinsi.get_jumlah_admin_kabupaten_kota') }}")
    .then(response => response.json())
    .then(data => {
        document.getElementById('jumlahAdminKabupatenKota').textContent = data.jumlah;
    })
    .catch(error => console.error('Error:', error));
});

fetch("{{ route('admin_provinsi.get_jumlah_admin_dps') }}")
.then(response => response.json())
.then(data => {
    document.getElementById('jumlahAdminDps').textContent = data.jumlah;
})
.catch(error => console.error('Error:', error));


