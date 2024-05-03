<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> 
  <link rel="stylesheet" href="{{ asset('css/laporandps.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

  <title>Sipanka KopSyah - Landing Page</title>

</head>

<body>
  @include('layouts.admin_provinsi_sidebar')
  @include('layouts.admin_provinsi_navbar')
  <script src="{{ asset('js/script.js') }}"></script>
  <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
              <h4>Dashboard / Manajemen DPS / Pengawasan DPS</h4>
              <div class="dashboard-subtitle">
                  <p><strong>Koperasi:  </strong> {{ $nama_koperasi }}</p>
                  <p><strong>DPS:  </strong> {{ $nama_lengkap }}</p>
                  @if($pengawasan)
                      <p><strong>Status:</strong>
                          @if($pengawasan->status === true)
                              <img src="/img/accepted.png" alt="Accepted Icon">
                          @else
                              <img src="/img/pending.png" alt="Pending Icon">
                          @endif
                      </p>
                      <a href="{{ route('pengawasan_terima', $pengawasan->id) }}" class="btn btn-primary">
                          @if($pengawasan->status)
                              Batalkan Penerimaan
                          @else
                              Terima Laporan
                          @endif
                      </a>
                  @endif
              </div>
          </div>
      </div>
  </div>
  
  


      <div class="dashboard-box"> 
        <h2>Formulir Laporan Hasil Pengawasan DPS</h2>
    
        <div class="coment-column">
          <div class="box-coment">
            <p>Tanggal Pengawasan:</p>
            <p-child>{{ $pengawasan->tanggal_pengawasan }}</p-child>
          </div>
        </div>
    
        <div class="coment-column3">
            <p>Hasil:</p>
            <p-child>{{ $pengawasan->hasil }}</p-child>
        </div>
    
        <div class="coment-column4">
            <p>Permasalahan:</p>
            <p-child >{{ $pengawasan->permasalahan }}</p-child>
        </div>
    
        <div class="coment-column5">
            <p>Saran:</p>
            <p-child>{{ $pengawasan->saran }}</p-child>
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
    
    
    
    
    
    <div class="user-comment-column">
        <h2 style="font-size: 18px; color: #07170b; margin-bottom: 10px;">Tambahkan Komentar</h2>
        
        <form action="{{ route('komentar.provinsi') }}" method="POST" class="comment-form">
          @csrf
          <input type="hidden" name="id_pengawasan" value="{{ $pengawasan->id }}">
          <div class="comment-box">
            <textarea name="komentar" placeholder="Tambahkan komentar/saran"></textarea>
            <button type="submit"><img src="/img/Send Icon.png" width="20" height="20" alt="Kirim"></button>
          </div>
        </form>
      </div>
      


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>