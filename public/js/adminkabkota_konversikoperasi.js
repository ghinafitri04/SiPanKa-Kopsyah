function redirectToNextPage(tahap) {
    // Tentukan URL tujuan berdasarkan tahap
    let url;
    switch (tahap) {
      case 1:
        url = '/adminkabkota-konversi-tahap1'; // Ganti dengan URL sesuai kebutuhan
        break;
      case 2:
        url = '/adminkabkota-konversi-tahap2'; // Ganti dengan URL sesuai kebutuhan
        break;
      case 3:
        url = '/adminkabkota-konversi-tahap3'; // Ganti dengan URL sesuai kebutuhan
        break;
      case 4:
        url = '/adminkabkota-konversi-tahap4'; // Ganti dengan URL sesuai kebutuhan
        break;
      default:
        console.error('Tahap tidak valid');
        return;
    }
  
    // Alihkan ke URL tujuan
    window.location.href = url;
  }
  