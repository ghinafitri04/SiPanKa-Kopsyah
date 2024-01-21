<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">

    <title>Sipanka KopSyah - Login Admin Provinsi </title>

    <style>
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
            padding: 115px;
        }

        .center-text img {
            max-height: 60px;
            margin-right: 10px;
        }

        .center-text h2 {
            font-size: 20px;
            color: black;
            margin-top: 0;
            margin-bottom: 5px;
            text-align: left;
        }

        .square-box {
            width: 12cm;
            height: 8cm;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0px 0px 7px 0px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            margin: auto;
            margin-top: -90px;
            padding: 20px; 
            box-sizing: border-box;
        }

        .box-text {
            text-align: left;
            margin: 25px;
        }

        .box-text p:first-child {
            font-size: 20px;
            color: black;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            margin-top: -20px;
            margin-bottom: 2px;
            text-align: left;
        }

        .box-text p.small-text {
            font-size: 12px;
            color: black;
            font-family: 'Poppins', sans-serif;
            font-weight: semi-bold;
            text-align: left;
        }

        .input-with-icon {
            position: relative;
            display: flex;
            align-items: center;
            /* Menengahkan secara vertikal */
        }

        .input-with-icon input {
            padding-left: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .input-with-icon img {
            max-width: 37px;
            max-height: 37px;
        }

        .form-group {
            margin-top: -25px;
            margin-bottom: 35px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-control {
            width: 80%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
            font-family: 'Poppins', sans-serif;
        }

        .btn-login {
            background-color: #28A745;
            color: white;
            border: none;
            padding: 7px 120px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 100%;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #ccc;
        }

        .toggle-password.inactive {
            color: #ccc;
        }

        .small-text a {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: -15px;
        }

        .small-text a#lupa {
            color: black;
            text-decoration: none;
        }

        .small-text a#lupa:hover {
            text-decoration: underline;
        }
    </style>

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

        <!-- Form Login -->
        <form id="login-form" action="{{ route('admin_provinsi.login') }}" method="POST">

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

            <div class="small small-text">
                <p class="small-text"><a id="lupa" href="#">Lupa Password?</a></p>
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

    <!-- JavaScript untuk toggle password -->
    <script>
        var loginForm = document.getElementById('login-form');

        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();

            var usernameValue = document.getElementById('username').value;
            var passwordValue = document.getElementById('password').value;

            if (usernameValue === "admin" && passwordValue === "admin") {
                // Alihkan ke halaman dashboard (ganti URL sesuai dengan route dashboard Anda)
                window.location.href = "{{ route('dashboardAdminProvinsi') }}";
                alert("Selamat Datang!");
            } else {
                alert("Login gagal. Tolong cek username dan Password.");
            }
        });

        function togglePassword(inputId) {
            var passwordInput = document.getElementById(inputId);
            var eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.src = "/img/openeye.png"; // Ganti dengan path gambar mata tertutup
            } else {
                passwordInput.type = "password";
                eyeIcon.src = "/img/eyeclosed.png"; // Ganti dengan path gambar mata terbuka
            }
        }
    </script>

</body>

</html>
