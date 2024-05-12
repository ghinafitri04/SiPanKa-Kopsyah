<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('css/navbarsidebar_koperasi.css') }}">
  <link rel="stylesheet" href="{{ asset('css/laporandps.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <title>Sipanka KopSyah - Hasil Pengawasan</title>

</head>

<body>
  @include('layouts.koperasi_sidebar')
  @include('layouts.koperasi_navbar')
  <script src="{{asset('js/script_koperasi.js')}}"></script>

  <div class="content">
    <div class="containermt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <h4>Hasil Pengawasan</h4>
            <div class="dashboard-subtitle">
              <p><strong>DPS:  </strong> {{ $nama_lengkap }}</p>
              </div>
            </div>  
        </div>

<div class="dashboard-box">
    <h2 >Laporan Hasil Pengawasan DPS</h2>
    
    <div class= "coment-column">
      <div class=box-coment> 
        <p>Tanggal Pengawasan:</p>
        <p-child>{{ $pengawasan->tanggal_pengawasan }}</p-child>
      </div>
      
    <dic class="coment-column2">
      <p-child>Status:</p>
      @if ($pengawasan->status === true)   
      <img src="{{ asset("img/accepted.png") }}" alt="">
      @elseif($pengawasan->status === false)
      <img src="{{ asset("img/rejected.png") }}" alt="">
      @endif
    </div>

    <div class="coment-column3">
        <p>Hasil:</p>
        <p-child>{{ $pengawasan->hasil }}</p-child>
    </div>

    <div class="coment-column4">
        <p>Permasalahan:</p>
        <p-child>{{ $pengawasan->permasalahan }}</p-child>
    </div>

    <div class="coment-column5">
        <p>Saran:</p>
        <p-child>{{ $pengawasan->saran }}</p>
    </div>
</div>

<div class="user-comment-column">
  <h2 style="font-size: 18px; color: #07170b; margin-bottom: 10px;">Komentar Pengguna</h2>

  <!-- Box untuk menampilkan komentar -->
  <div class="comment-list">
      <!-- Tampilkan daftar komentar di sini -->
      @forelse ($komentars->reverse() as $komentar)
          <div class="comment-item">
              <div class="comment-header">
                  <p class="comment-username"><strong>{{ $komentar->username }}</strong> - {{ $komentar->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}</p>
              </div>
              <div class="comment-content">
                  <p class="comment-text">{{ $komentar->komentar }}</p>
              </div>
          </div>
          <!-- Box untuk memisahkan komentar -->
          <div class="comment-divider"></div>
      @empty
          <p>Tidak ada komentar.</p>
      @endforelse
  </div>
</div>

<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </body>
</html>