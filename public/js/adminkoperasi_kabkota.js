document.addEventListener('DOMContentLoaded', function () {
    var overlay = document.getElementById("overlay");
    var popupContainer = document.getElementById("popupContainer");
    var btnTambah = document.getElementById("btnTambah");
    var btnTambahForm = document.getElementById("btnTambahForm");
    var formContainer = document.getElementById("formTambahAdminContainer");

    // Cek apakah pop-up form tambah data sudah pernah ditampilkan dalam sesi ini
    var isFormPopupShown = sessionStorage.getItem("formPopupShown");

    if (isFormPopupShown ) {
        // Sembunyikan formulir tambah data admin atau edit jika sudah pernah ditampilkan
        formContainer.style.display = "none";
    }

    btnTambah.addEventListener("click", function () {
        console.log("Tombol Tambah ditekan");
        overlay.style.display = "block";
        popupContainer.style.display = "flex";
        formContainer.style.display = "block";
    });

   
    

    var btnHapusElements = document.querySelectorAll(".btn-hapus");
    btnHapusElements.forEach(function (btnHapus) {
        btnHapus.addEventListener("click", function (event) {
            event.preventDefault();
            var confirmationPopup = document.getElementById("confirmationPopup");
            confirmationPopup.style.display = "flex";
            var dataId = btnHapus.getAttribute("data-id");
            var hapusButton = document.querySelector("#confirmationPopup .btn-success");
            hapusButton.onclick = function () {
                hapusData();
                confirmationPopup.style.display = "none";
                // Tambahkan logika lain yang perlu dilakukan setelah penghapusan
            };
        });
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

    // Fungsi untuk menangani dropdown Kabupaten/Kota
    var selectedOption = document.querySelector(".selected-option");
    var optionsList = document.querySelector(".options");

    selectedOption.addEventListener("click", function () {
        optionsList.style.display = optionsList.style.display === "block" ? "none" : "block";
    });

    optionsList.addEventListener("click", function (event) {
        var selectedValue = event.target.getAttribute("value");
        var selectedText = event.target.innerText;

        selectedOption.innerText = selectedText;
        optionsList.style.display = "none";

        // Lakukan sesuatu dengan nilai yang dipilih (jika perlu)
        // console.log(selectedValue);
    });

    btnTambahForm.addEventListener("click", function () {
        // Sembunyikan formulir "Pilih Kabupaten/Kota"
        var optionsList = document.querySelector(".options");
        optionsList.style.display = "none";
    
        // Simulasikan penambahan data dari backend
        // Anda dapat menyesuaikan ini dengan logika sesungguhnya saat menambahkan data
        // Jika berhasil, baru panggil fungsi showSuccessPopup
        // Misalnya:
        // if (dataBerhasilDitambahkan) {
        //     showSuccessPopup();
        // }
    
        // Contoh:
        simulateDataAdditionAndShowSuccessPopup();
    });

    
    

  

    btnTambahForm.addEventListener("click", function () {
        // Simulasikan penambahan data dari backend
        // Anda dapat menyesuaikan ini dengan logika sesungguhnya saat menambahkan data
        // Jika berhasil, baru panggil fungsi showSuccessPopup
        // Misalnya:
        // if (dataBerhasilDitambahkan) {
        //     showSuccessPopup();
        // }
    
        // Contoh:
        simulateDataAdditionAndShowSuccessPopup();
    });
    

    // Hapus status pop-up form dari sessionStorage saat halaman di-refresh
    window.addEventListener('beforeunload', function () {
        sessionStorage.removeItem("formPopupShown");
    });
});

    function simulateDataAdditionAndShowSuccessPopup() {
        // Simulasikan bahwa data berhasil ditambahkan
        // Anda dapat menyesuaikan ini dengan logika sesungguhnya
        var dataBerhasilDitambahkan = true;

        if (dataBerhasilDitambahkan) {
            showSuccessPopup();
        }
    }

    function showSuccessPopup() {
        var successPopup = document.getElementById("successPopup");

        // Tampilkan pop-up sukses
        successPopup.style.display = "flex";

        // Setelah beberapa waktu, sembunyikan pop-up sukses
        setTimeout(function () {
            successPopup.style.display = "none";
        }, 3000);
    }

    function closeSuccessPopup() {
        var successPopup = document.getElementById("successPopup");
        successPopup.style.display = "none";
    }

    function showConfirmationPopup(dataId) {
        var confirmationPopup = document.getElementById("confirmationPopup");
        confirmationPopup.style.display = "flex";

        // Menggunakan dataId untuk melakukan operasi yang sesuai
        console.log("Menghapus data dengan ID:", dataId);
    }

    function closeConfirmationPopup() {
        var confirmationPopup = document.getElementById("confirmationPopup");
        confirmationPopup.style.display = "none";
    }

    function hapusData() {
        // Logika penghapusan data

        // Setelah data dihapus, tampilkan pop-up sukses
        showHapusPopup();

        // Setelah data dihapus, sembunyikan pop-up konfirmasi
        closeConfirmationPopup();
    }

 
    


    function toggleOptionsList(formType, event) {
        var optionsList = document.querySelector(".options");
        optionsList.style.display = optionsList.style.display === "block" ? "none" : "block";

       
    }

    function selectOption(event, formType) {
        var selectedValue = event.target.getAttribute("value");
        var selectedText = event.target.innerText;


        toggleOptionsList(formType);
    }
  

    function togglePopup() {
        var body = document.body;
        body.classList.toggle("popup-open");

        // ... (kode lainnya)
    }

    function closePopup() {
        var body = document.body;
        body.classList.remove("popup-open");

        // ... (kode lainnya)
    }

    document.addEventListener('click', function(event) {
        var optionsList = document.querySelector(".options");
        if (optionsList.style.display === "block") {
            optionsList.style.display = "none";
        }
    });

    function simulateDataDeletionAndShowHapusPopup() {
        // Simulasikan bahwa data berhasil dihapus
        // Anda dapat menyesuaikan ini dengan logika sesungguhnya
        var dataBerhasilDihapus = true;

        if (dataBerhasilDihapus) {
            showHapusPopup();
        }
    }

    function showHapusPopup() {
        var hapusPopup = document.getElementById("hapusPopup");

        // Tampilkan pop-up sukses
        hapusPopup.style.display = "flex";

        // Setelah beberapa waktu, sembunyikan pop-up sukses
        setTimeout(function () {
            hapusPopup.style.display = "none";
        }, 3000);
    }

    function closeHapusPopup() {
        var hapusPopup = document.getElementById("hapusPopup");
        hapusPopup.style.display = "none";
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Ganti 'infoIcon1' dengan ID yang sesuai untuk ikon info pertama
        var infoIcon1 = document.getElementById('infoIcon1');

        infoIcon1.addEventListener('click', function () {
            // Dapatkan data ID dari atribut data-id
            var dataId = infoIcon1.getAttribute('data-id');

            // Alihkan ke halaman lainnya dengan menggunakan data ID
            window.location.href = '/detail-admin-koperasi-kabkota' ; // Gantilah '/info/' dengan URL yang sesuai
        });
    });