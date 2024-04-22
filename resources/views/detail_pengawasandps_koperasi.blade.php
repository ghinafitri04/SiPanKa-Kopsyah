<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/detailpengawasankoperasi.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Sipanka KopSyah - Detail Pengawasan Koperasi</title>
</head>

<body>
  @include('layouts.admin_provinsi_sidebar')
  @include('layouts.admin_provinsi_navbar')
  <script src="{{asset('js/script.js')}}"></script>

  <div class="content">
    <div class="containermt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <strong>Manajemen DPS / Pengawasan DPS</strong>
          </div>
        </div>

        <div class="mt-3" style="margin-left: 0cm; margin-right: 0cm;">
          <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Koperasi</th>
                    <th scope="col">Kabupaten/Kota</th>
                    <th scope="col">Tanggal Pengawasan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemilihanDps as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->koperasi->nama }}</td>
                    <td>{{ $data->koperasi->kabupaten_kota }}</td>
                    <td>{{ $data->tanggal_dipilih }}</td>
                    <td>
                        @if($data->status === 'accepted')
                        <img src="/img/accepted.png" alt="Accepted Icon">
                        @elseif($data->status === 'pending')
                        <img src="/img/pending.png" alt="Pending Icon">
                        @elseif($data->status === 'rejected')
                        <img src="/img/rejected.png" alt="Rejected Icon">
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="/detail-dps{{ $data->status }}"><img src="/img/Info Icon.png" alt="Info Icon" width="30" height="30"></a>
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