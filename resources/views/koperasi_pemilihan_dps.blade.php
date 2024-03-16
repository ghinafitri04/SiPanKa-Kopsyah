<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/navbarsidebar_koperasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pemilihan_dps.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Sipanka KopSyah - Pemilihan DPS</title>
</head>

<body>
@include('layouts.koperasi_sidebar')
@include('layouts.koperasi_navbar')
<script src="{{asset('js/script_koperasi.js')}}"></script>

<div class="content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="dashboard-title">Pemilihan DPS</h4>
            </div>
        </div>

        <div class="mt-3" style="margin-left: 0cm; margin-right: 0cm;">
            <form method="POST" action="{{ route('koperasi.pemilihan_dps.store') }}">
                @csrf
                <div class="table-row">
                    <div class="table-col">
                        <label for="dps1">Pilih DPS 1:</label>
                        <select id="dps1" name="dps1" class="form-control">
                            <option value="">Pilih DPS</option>
                            @foreach($dps1 as $dps)
                            <option value="{{ $dps->id_dps }}">{{ $dps->nama_lengkap }}</option>
                            @endforeach
                        </select>                        
                    </div>
            
                    <div class="table-col">
                        <label for="dps2">Masukkan DPS 2:</label>
                        <input type="text" id="dps2" name="dps2" class="form-control">
                    </div>
            
                    <div class="table-col">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="dashboard-subtitle" style="margin-top: 1cm;">Riwayat Pemilihan DPS</h4>
            </div>
        </div>
        <div class="mt-3" style="margin-left: 0cm; margin-right: 0cm;">
            <table class="table" style="margin-top: 0.5cm;">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama DPS 1</th>
                        <th scope="col">Nama DPS 2</th>
                        <th scope="col">Tanggal Pemilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayatPemilihan as $key => $riwayat)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            @if($riwayat->dps)
                                {{ $riwayat->dps->nama_lengkap }}
                            @else
                                {{ $riwayat->nama_dps2 }}
                            @endif
                        </td>
                        <td>
                            @if($riwayat->dps)
                                {{ $riwayat->nama_dps2 }}
                            @endif
                        </td>
                        <td>{{ $riwayat->tanggal_dipilih }}</td>
                    </tr>
                    @endforeach
                    <!-- Tambahkan baris lain sesuai kebutuhan -->
                </tbody>
                
            </table>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

</div>

<!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
