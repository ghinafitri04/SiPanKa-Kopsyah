<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('css/navbarsidebar_koperasi.css') }}">
  <link rel="stylesheet" href="{{ asset('css/hasil_pengawasan.css') }}">
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
          </div>
        </div>

        <div class="mt-3" style="margin-left: 0cm; margin-right: 0cm;">
          <table class="table">
              <thead class="table-light">
                  <tr>
                      <th scope="col" style="width: 1cm;">No</th>
                      <th scope="col" >Tanggal Pengawasan</th>
                      <th scope="col">Nama DPS</th>
                      <th scope="col" >Status</th>
                      <th scope="col" style="width: 3cm;">Tindakan</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($pengawasan as $hasil)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class="left-align">{{ $hasil->tanggal_pengawasan }}</td>
                    <td class="left-align">{{ $hasil->dps->nama_lengkap }}</td>
                    <td>
                      @if ($hasil->status === true)
                          <img src="{{ asset('img/accepted.png') }}" alt="">
                      @elseif($hasil->status === false)
                        <img src="{{ asset('img/rejected.png') }}" alt="">  
                      @endif
                    </td>
                    <td>   
                        <a href="{{ route('hasil.pengawasan.koperasi2', ['id' => $hasil->id]) }}">
                            <img src="/img/Info Icon.png" alt="Detail Icon" width="30" height="30">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
          </table>
      </div>
</div>

<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </body>
</html>