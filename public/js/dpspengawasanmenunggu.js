$(document).on('click', '#confirmAccept', function () {
    // Lakukan tindakan ketika "Ya, Terima" diklik
    // Misalnya, tampilkan notifikasi sukses
    $('#successModal').modal('show');

    // Tutup modal konfirmasi setelah tindakan dilakukan
    $('#confirmationModal').modal('hide');
});

$(document).on('click', '#confirmReject', function () {
    // Lakukan tindakan ketika "Ya, Tolak" diklik
    // Misalnya, tampilkan notifikasi sukses
    $('#rejectSuccessModal').modal('show');

    // Tutup modal konfirmasi setelah tindakan dilakukan
    $('#confirmationRejectModal').modal('hide');
});
