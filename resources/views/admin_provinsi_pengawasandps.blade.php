<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/pengawasandps.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <!-- Font Awesome -->

  <title>Sipanka KopSyah - Landing Page</title>


</head>

<body>

    @include('layouts.sidebar')
    @include('layouts.navbar')

    <script src="{{asset('js/script.js')}}"></script>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="dashboard-title">
            <h4>Dashboard / Manajemen DPS / Pengawasan DPS</h4>
      </div>


         <!-- POP -->

        <div class="mt-3" style="margin-left: 6.5cm; margin-right: 4cm;">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama DPS</th>
                        <th scope="col">Jumlah Koperasi</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Ghina Fitri </td>
                        <td> 100 </td>
                        <td>            <a><img src="/img/Info Icon.png" alt="Edit Icon" width="30" height="30">
                        </i></a></td>
                        
                    </tr>
                    <!-- Tambahkan baris lain sesuai kebutuhan -->
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