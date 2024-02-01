function redirectToNextPage(tahap) {
    // Tentukan URL tujuan berdasarkan tahap
    let url;
    switch (tahap) {
      case 1:
        url = '/detail-dps'; // Ganti dengan URL sesuai kebutuhan
        break;
      case 2:
        url = '/detail-dps'; // Ganti dengan URL sesuai kebutuhan
        break;
      case 3:
        url = '/halaman-tahap-3'; // Ganti dengan URL sesuai kebutuhan
        break;
      case 4:
        url = '/halaman-tahap-4'; // Ganti dengan URL sesuai kebutuhan
        break;
      default:
        console.error('Tahap tidak valid');
        return;
    }
  
    // Alihkan ke URL tujuan
    window.location.href = url;
  }
  