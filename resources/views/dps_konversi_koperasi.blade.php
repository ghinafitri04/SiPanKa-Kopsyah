<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/navbarsidebar_dps.css') }}">
  <link rel="stylesheet" href="{{ asset('css/konversikoperasi.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Konversi Koperasi</title>
</head>

<body>
    @include('layouts.dps_sidebar')
    @include('layouts.dps_navbar')

  <script src="{{asset('js/script_dps.js')}}"></script>
  <script src="{{asset('js/dps_konversikoperasi.js')}}"></script>

  <div class="content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <strong> Manajemen Koperasi / Konversi Koperasi</strong>
          </div>
        </div>
    </div>

    <div class="mt-3" style="margin-left: 6.5cm; margin-right: 4cm;">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Koperasi</th>
                    <th scope="col">Rapat Anggota</th>
                    <th scope="col">Perubahan PAD</th>
                    <th scope="col">Bukti Notaris</th>
                    <th scope="col">Pengesahan PAD</th>
                </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach($prosesKonversi as $proses)
              <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <td>{{ $proses->koperasi->nama_koperasi }}</td>
                  <td>
                    @if($proses->rapat_anggota)
                        <a href="{{ asset($proses->rapat_anggota) }}" target="_blank" class="btn btn-success">Sudah</a>
                    @else
                        <button class="btn btn-danger" onclick="setAsNotDone(1)">Belum</button>
                    @endif
                </td>
                <td>
                    @if($proses->perubahan_pad)
                        <a href="{{ asset($proses->perubahan_pad) }}" target="_blank" class="btn btn-success">Sudah</a>
                    @else
                        <button class="btn btn-danger" onclick="setAsNotDone(2)">Belum</button>
                    @endif
                </td>
                <td>
                    @if($proses->nama_notaris)
                        <a href="{{ asset($proses->nama_notaris) }}" target="_blank" class="btn btn-success">Sudah</a>
                    @else
                        <button class="btn btn-danger" onclick="setAsNotDone(3)">Belum</button>
                    @endif
                </td>
                <td>
                    @if($proses->pengesahan_pad)
                        <a href="{{ asset($proses->pengesahan_pad) }}" target="_blank" class="btn btn-success">Sudah</a>
                    @else
                        <button class="btn btn-danger" onclick="setAsNotDone(4)">Belum</button>
                    @endif
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
