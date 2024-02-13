document.addEventListener("DOMContentLoaded", function () {
    var overlay = document.getElementById("overlay");
    var popupContainer = document.getElementById("popupContainer");
    var btnTambah = document.getElementById("btnTambah");
    var formContainer = document.getElementById("formTambahAdminContainer");

    btnTambah.addEventListener("click", function () {
        overlay.style.display = "block";
        popupContainer.style.display = "flex";
        formContainer.style.display = "block";
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

    var btnHapusElements = document.querySelectorAll(".btn-hapus");
    btnHapusElements.forEach(function (btnHapus) {
        btnHapus.addEventListener("click", function (event) {
            event.preventDefault();
            var dataId = btnHapus.getAttribute("data-id");
            showConfirmationPopup(dataId);
        });
    });
});

function showConfirmationPopup(dataId) {
    var confirmationPopup = document.getElementById("confirmationPopup");
    confirmationPopup.style.display = "flex";

    var hapusButton = document.querySelector("#confirmationPopup .btn-success");
    hapusButton.onclick = function () {
        hapusData(dataId);
        confirmationPopup.style.display = "none";
    };
}

function hapusData(dataId) {
    // Anda dapat menambahkan logika penghapusan data sesuai dengan kebutuhan
    console.log("Menghapus data dengan ID:", dataId);
    // Setelah data dihapus, Anda dapat menampilkan pop-up sukses atau melakukan tindakan lainnya
}
