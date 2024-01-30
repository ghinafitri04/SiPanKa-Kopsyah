document.addEventListener('DOMContentLoaded', function () {
    var overlay = document.getElementById("overlay");
    var popupContainer = document.getElementById("popupContainer");
    var btnTambah = document.getElementById("btnTambah");
    var btnTambahForm = document.getElementById("btnTambahForm");
    var formContainer = document.getElementById("formTambahAdminContainer");

    // Cek apakah pop-up form tambah data sudah pernah ditampilkan dalam sesi ini
    var isFormPopupShown = sessionStorage.getItem("formPopupShown");

    if (isFormPopupShown) {
        // Sembunyikan formulir tambah data admin jika sudah pernah ditampilkan
        formContainer.style.display = "none";
    }

    btnTambah.addEventListener("click", function () {
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

    // Setelah data dihapus, sembunyikan popup konfirmasi
    closeConfirmationPopup();
}

