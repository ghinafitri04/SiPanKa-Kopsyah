function togglePopup() {
    var overlay = document.getElementById("overlay");
    var popupContainer = document.getElementById("popupContainer");

    overlay.style.display = (overlay.style.display === "none") ? "block" : "none";
    popupContainer.style.display = (popupContainer.style.display === "none") ? "block" : "none";
}

var btnTambah = document.getElementById("btnTambah");
btnTambah.addEventListener("click", togglePopup);