<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css"> <!-- Hubungkan dengan file CSS eksternal jika diperlukan -->
  <!-- Bootstrap CSS (jika menggunakan Bootstrap) -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <title>Sipanka KopSyah - Landing Page</title>

  <style>
    /* Tambahkan gaya CSS di sini */
    body {
      font-family: 'Poppins', sans-serif;
      background: #FAFAFA;
      margin: 0;
      padding: 0;
    }

    .center-text {
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 95px; 
    }

    .center-text img{
        max-height: 60px;
        margin-right: 10px;
    }

    .center-text h2 {
      font-size: 23px;
      color: black;
      margin-top: 0;
      margin-bottom: 5px;
      text-align: left;
    }

    .button-container {
      position: relative;
      display: flex;
      flex-direction: column; /* Membuat button-container menjadi kolom */
     align-items: center; /* Menyusun elemen secara vertikal di tengah */
      top: -40px;
      text-align: center;

    }

    .button-container button_admin {
      font-size: 21px;
      background-color: white;
      font-family: 'Poppins', sans-serif;
      padding: 15px 150px 15px 30px;
      color: black;
      border: black;
      cursor: pointer;
      font-weight: semi-bold;
      border-radius: 10px; /* Memberikan lengkungan pada tombol */
      border: 1px solid #FAFAFA; /* Ubah nilai border sesuai keinginan Anda */
      box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); /* Efek bayangan */
      background-image: url('/img/gambar_admin.png'); /* Ganti dengan path gambar kecil Anda */
      background-size: contain;
      background-position: left center;
      background-repeat: no-repeat;
      margin-bottom: 15px; /* Memberikan jarak bawah antara dua tombol */
      background-size: auto 25px; /* Mengatur ukuran gambar */
      text-align: left;
      
    }

    .button-container button_dps {
      font-size: 21px;
      background-color: white;
      font-family: 'Poppins', sans-serif;
      padding: 15px 165px 15px 30px;
      color: black;
      border: black;
      cursor: pointer;
      font-weight: semi-bold;
      border-radius: 10px; /* Memberikan lengkungan pada tombol */
      border: 1px solid #FAFAFA; /* Ubah nilai border sesuai keinginan Anda */
      box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); /* Efek bayangan */
      background-image: url('/img/gambar_admin.png'); /* Ganti dengan path gambar kecil Anda */
      background-size: contain;
      background-position: left center;
      background-repeat: no-repeat;
      margin-bottom: 15px; /* Memberikan jarak bawah antara dua tombol */
      background-size: auto 25px; /* Mengatur ukuran gambar */
      text-align: left;
    }

    .button-container button_koperasi {
      font-size: 21px;
      background-color: white;
      font-family: 'Poppins', sans-serif;
      padding: 15px 130px 15px 30px;
      color: black;
      border: black;
      cursor: pointer;
      font-weight: semi-bold;
      border-radius: 10px; /* Memberikan lengkungan pada tombol */
      border: 1px solid #FAFAFA; /* Ubah nilai border sesuai keinginan Anda */
      box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); /* Efek bayangan */
      background-image: url('/img/gambar_admin.png'); /* Ganti dengan path gambar kecil Anda */
      background-size: contain;
      background-position: left center;
      background-repeat: no-repeat;
      background-size: auto 25px; /* Mengatur ukuran gambar */
      text-align: left;
    }



  </style>
</head>
<body>



<div class="center-text">
        <img src="/img/logo_sumbar.png">
        <h2>Sistem Informasi Pemantauan Perkembangan Koperasi Syariah <br> Provinsi Sumatera Barat </h2> 
</div>

<div class="button-container">
    <button_admin onclick="location.href='/your-link-here';">Login Sebagai Admin</button>
</div>

<div class="button-container">
    <button_dps onclick="location.href='/your-link-here';">Login Sebagai DPS</button>
</div>

<div class="button-container">
    <button_koperasi onclick="location.href='/your-link-here';">Login Sebagai Koperasi</button>
</div>


<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
