<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dpspengawasanmenunggu.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Pengawasan Menunggu</title>
</head>

<body>
  @include('layouts.admin_kabkota_sidebar')
  @include('layouts.admin_kabkota_navbar')
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('js/dpspengawasanmenunggu.js')}}"></script>
  
  <div class="content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <strong>Manajemen DPS / Pengawasan DPS</strong>
            <div class="dashboard-subtitle">
              <p><strong>Nama:</strong> Ghina</p>
            </div>
          </div>
        </div>
      </div>

<!-- Box untuk Laporan Hasil Pengawasan DPS -->
<div class="dashboard-box" style="padding: 20px; border: 1px solid #d3d3d3; border-radius: 10px; max-height: 460px; overflow: auto;"> <!-- Tambahkan max-height untuk mengatur tinggi maksimal dan overflow: auto; untuk membuat scroll jika kontennya panjang -->
    <h2 style="text-align: center; font-weight: bold; margin-top: 0; margin-bottom: 20px;">Formulir Laporan Hasil Pengawasan DPS</h2>
    
    <!-- Tanggal Pengawasan dan Kolomnya -->
    <div style="display: flex; justify-content: space-between;">
      <div style="width: 48%; float: left; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; background-color: #f8f9fa;"> <!-- Ganti background color sesuai kebutuhan -->
        <p style="font-weight: bold; margin-bottom: 5px;">Tanggal Pengawasan:</p>
        <p style="margin: 0;">Data dari Database</p>
      </div>
      
      <!-- Periode dan Kolomnya (untuk menampilkan data) -->
      <div style="width: 48%; float: right; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; background-color: #f8f9fa; "> <!-- Ganti background color sesuai kebutuhan -->
        <p style="font-weight: bold; margin-bottom: 5px;">Periode:</p>
        <p style="margin: 0;">Data dari Database</p>
      </div>
    </div>

    <div style="width: 100%; float: left; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; background-color: #f8f9fa; margin-top: 20px"> <!-- Ganti background color sesuai kebutuhan -->
        <p style="font-weight: bold; margin-bottom: 5px;">Hasil:</p>
        <p style="margin: 0;">Data dari Database</p>
    </div>

    <div style="width: 100%; float: left; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; background-color: #f8f9fa; margin-top: 20px"> <!-- Ganti background color sesuai kebutuhan -->
        <p style="font-weight: bold; margin-bottom: 5px;">Permasalahan:</p>
        <p style="margin: 0;">Data dari Database</p>
    </div>

    <div style="width: 100%; float: left; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; background-color: #f8f9fa; margin-top: 20px"> <!-- Ganti background color sesuai kebutuhan -->
        <p style="font-weight: bold; margin-bottom: 5px;">Saran:</p>
        <p style="margin: 0;">Data dari Database</p>
    </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin menerima laporan ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-success" id="confirmAccept">Ya, Terima</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="successModalLabel">Sukses</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Laporan diterima dengan sukses!
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="confirmationRejectModal" tabindex="-1" role="dialog" aria-labelledby="confirmationRejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmationRejectModalLabel">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin menolak laporan ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-danger" id="confirmReject">Ya, Tolak</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="rejectSuccessModal" tabindex="-1" role="dialog" aria-labelledby="rejectSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="rejectSuccessModalLabel">Sukses</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Laporan ditolak dengan sukses!
        </div>
      </div>
    </div>
</div>

  
<div class="d-flex d-flex-buttons">
    <button type="button" class="btn btn-danger btn-reject" data-toggle="modal" data-target="#confirmationRejectModal">⨉ Tolak</button>
    <button type="button" class="btn btn-success btn-accept" data-toggle="modal" data-target="#confirmationModal">✓ Terima</button>
  </div>
  

</div>

<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
