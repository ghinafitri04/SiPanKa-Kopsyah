<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <title>Sipanka KopSyah - Login Admin Provinsi </title>
</head>

<body>
    <div class="center-text">
        <img src="/img/logo_sumbar.png">
        <h2>Sistem Informasi Pemantauan Perkembangan Koperasi Syariah <br> Provinsi Sumatera Barat </h2>
    </div>

    <div class="square-box">
        <div class="box-text">
            <p>Login Admin</p>
            <p class="small-text">Silahkan login untuk mengakses aplikasi.</p>
        </div>

        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <!-- Pesan Kesalahan -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Input Username -->
            <div class="form-group input-with-icon">
                <img src="/img/username.png" class="icon" alt="Username icon">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username">
            </div>

            <!-- Input Password -->
            <div class="form-group input-with-icon">
                <img src="/img/password.png" class="icon" alt="Password icon">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                <img src="/img/eyeclosed.png" id="eye-icon" class="toggle-password" style="width: 17px; height: 17px;"
                    onclick="togglePassword('password')">
            </div>

            <div class="bt-login">
                <button type="submit" class="btn-login">Login</button>
            </div>
        </form>
    </div>

    <!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        function togglePassword(id) {
            var x = document.getElementById(id);
            var eyeIcon = document.getElementById('eye-icon');
            if (x.type === "password") {
                x.type = "text";
                eyeIcon.src = "/img/eyeopen.png";
            } else {
                x.type = "password";
                eyeIcon.src = "/img/eyeclosed.png";
            }
        }
    </script>
</body>

</html>
