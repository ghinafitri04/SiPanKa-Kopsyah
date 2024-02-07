document.addEventListener("DOMContentLoaded", function () {
    var overlay = document.getElementById("overlay");
    var popupContainer = document.getElementById("popupContainer");
    var btnTambah = document.getElementById("btnTambah");
    var btnTambahForm = document.getElementById("btnTambahForm");
    var formContainer = document.getElementById("formTambahAdminContainer");

    // Cek apakah pop-up form tambah data sudah pernah ditampilkan dalam sesi ini
    var isFormPopupShown = sessionStorage.getItem("formPopupShown");
    var isEditFormShown = sessionStorage.getItem("editFormShown");

    if (isFormPopupShown || isEditFormShown) {
        // Sembunyikan formulir tambah data admin atau edit jika sudah pernah ditampilkan
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
            var confirmationPopup =
                document.getElementById("confirmationPopup");
            confirmationPopup.style.display = "flex";
            var dataId = btnHapus.getAttribute("data-id");
            var hapusButton = document.querySelector(
                "#confirmationPopup .btn-success"
            );
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
        optionsList.style.display =
            optionsList.style.display === "block" ? "none" : "block";
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

    // Fungsi untuk menangani dropdown Kabupaten/Kota pada formulir edit
    var selectedOptionEdit = document.getElementById(
        "selectedKabupatenKotaEdit"
    );
    var optionsListEdit = document.getElementById("kabupatenKotaOptionsEdit");

    selectedOptionEdit.addEventListener("click", function () {
        optionsListEdit.style.display =
            optionsListEdit.style.display === "block" ? "none" : "block";
    });

    optionsListEdit.addEventListener("click", function (event) {
        var selectedValueEdit = event.target.getAttribute("value");
        var selectedTextEdit = event.target.innerText;

        selectedOptionEdit.innerText = selectedTextEdit;
        optionsListEdit.style.display = "none";

        // Lakukan sesuatu dengan nilai yang dipilih (jika perlu)
        // console.log(selectedValueEdit);

        // Tetapkan nilai yang dipilih dalam input tersembunyi
        document.getElementById("selectedKabupatenKotaEditValue").value =
            selectedValueEdit;
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
    window.addEventListener("beforeunload", function () {
        sessionStorage.removeItem("formPopupShown");
        sessionStorage.removeItem("editFormDataId");
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

$(document).ready(function () {
    $(".btn-edit").click(function () {
        // Ambil ID dari data yang akan diedit
        var dataId = $(this).data("id");

        // Ambil data dari baris yang di-klik
        var username = $(this).closest("tr").find("td:eq(0)").text().trim();
        var password = $(this).closest("tr").find("td:eq(1)").text().trim();
        var kabupatenKotaId = $(this)
            .closest("tr")
            .find("td:eq(2)")
            .data("kabupaten-kota");

        // Setel nilai input pada formulir edit
        $("#editForm").attr(
            "action",
            "/admin_provinsi/manajemen_kab_kota/" + dataId
        );
        $("#editUsername").val(username);
        $("#editPassword").val(password);

        // Setel nilai pada dropdown Kabupaten/Kota
        $("#editKabupatenKota").val(kabupatenKotaId);

        // Tampilkan formulir edit
        $(".editz-form").show();
    });

    // Tangkap acara submit formulir edit
    $("#editForm").submit(function (event) {
        // Menghentikan perilaku bawaan formulir untuk mengirimkan permintaan
        event.preventDefault();

        // Ambil URL aksi formulir dari atribut action
        var url = $(this).attr("action");

        // Ambil metode HTTP dari atribut method
        var method = $(this).attr("method");

        // Ambil data formulir
        var formData = $(this).serialize();

        // Kirim permintaan AJAX ke server
        $.ajax({
            url: url,
            method: method,
            data: formData,
            success: function (response) {
                // Tampilkan pesan sukses jika permintaan berhasil
                alert("Data berhasil diperbarui.");
                // Redirect ke halaman indeks
                window.location.href =
                    "{{ route('admin_provinsi.manajemen_kab_kota.index') }}";
            },
            error: function (xhr, status, error) {
                // Tangani kesalahan jika permintaan gagal
                if (xhr.status == 422) {
                    // Jika validasi gagal, tampilkan pesan validasi yang diberikan oleh server
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = "";
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + "\n";
                    });
                    alert(errorMessage);
                } else {
                    // Jika terjadi kesalahan server lainnya, tampilkan pesan umum
                    alert("Gagal memperbarui data. Silakan coba lagi.");
                }
            },
        });
    });
});

function showEditForm() {
    // Sesuaikan dengan kelas atau ID formulir edit yang sebenarnya
    $(".editz-form").show();
}

function closeEditForm() {
    var editFormContainer = document.querySelector(".editz-form");
    editFormContainer.style.display = "none";
}

// Fungsi untuk menangani pembatalan dalam formulir edit
function cancelEdit() {
    closeEditForm();
    sessionStorage.removeItem("editFormShown");
}

// Fungsi untuk menangani penyimpanan perubahan dalam formulir edit
function simpanPerubahan() {
    // Implementasikan logika penyimpanan perubahan di sini
    // Setelah penyimpanan berhasil, Anda dapat menampilkan pop-up sukses atau melakukan tindakan lainnya
    showEditPopup(); // Contoh pemanggilan pop-up sukses
    closeEditForm();
    sessionStorage.removeItem("editFormShown");
}

function toggleOptionsList(formType, event) {
    var optionsList = document.querySelector(".options");
    optionsList.style.display =
        optionsList.style.display === "block" ? "none" : "block";

    // Jika ini formulir edit, hindari menutup dropdown
    if (formType === "edit" && event) {
        event.stopPropagation();
    }
}

function selectOption(event, formType) {
    var selectedValue = event.target.getAttribute("value");
    var selectedText = event.target.innerText;

    var selectedOption = document.getElementById("selectedKabupatenKotaEdit");
    selectedOption.innerText = selectedText;

    var selectedInput = document.getElementById(
        "selectedKabupatenKotaEditValue"
    );
    selectedInput.value = selectedValue;

    toggleOptionsList(formType);
}

// Tambahkan event listener ke tombol "Batal" dalam formulir edit
var btnCancelEdit = document.querySelector(".btn-batal-edit");
btnCancelEdit.addEventListener("click", cancelEdit);

// Tambahkan event listener ke tombol "Simpan" dalam formulir edit
var btnSimpanEdit = document.querySelector(".btn-simpan");
btnSimpanEdit.addEventListener("click", simpanPerubahan);

// Fungsi untuk menyembunyikan pop-up edit
function toggleEditPopup() {
    var editFormContainer = document.querySelector(".edit-form-container");
    editFormContainer.style.display = "none";
}

// Hapus status pop-up edit dari sessionStorage saat halaman di-refresh
sessionStorage.removeItem("editFormShown");

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

document.addEventListener("click", function (event) {
    var optionsList = document.querySelector(".options");
    if (optionsList.style.display === "block") {
        optionsList.style.display = "none";
    }
});

function simulateDataEditAndShowEditPopup() {
    // Simulasikan bahwa data berhasil diedit
    // Anda dapat menyesuaikan ini dengan logika sesungguhnya
    var dataBerhasilDiedit = true;

    if (dataBerhasilDiedit) {
        showEditPopup();
    }
}

function showEditPopup() {
    var editPopup = document.getElementById("editPopup");

    // Tampilkan pop-up pengeditan
    editPopup.style.display = "flex";

    // Setelah beberapa waktu, sembunyikan pop-up pengeditan
    setTimeout(function () {
        editPopup.style.display = "none";
    }, 3000);
}

function closeEditPopup() {
    var editPopup = document.getElementById("editPopup");
    editPopup.style.display = "none";
}

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
