<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register | ERKA SOLUTION GROUP</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/dashboard/images/logo.png') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #6a11cb 50%, #2575fc 100%);
            padding: 1rem; /* Padding diperpendek */
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px; /* Sudut lebih kecil */
            padding: 1.5rem; /* Padding dikurangi */
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 500px; /* Lebar card diperkecil */
        }

        .brand-logo {
    width: 120px; /* Ukuran logo */
    height: 120px;
    margin: 0 auto 1rem; /* Margin dikurangi */
    background: #fff;

    border-radius: 15px; /* Sudut melengkung */
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


        .logo-img {
            max-width: 70%;
            height: auto;
        }

        .nk-block-title {
            font-size: 1.5rem; /* Ukuran font judul diperkecil */
            font-weight: bold;
            background: linear-gradient(to right, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 1rem; /* Margin dikurangi */
            font-size: 1rem; /* Ukuran font subtitle diperkecil */
        }

        .form-group {
            margin-bottom: 0.8rem; /* Margin dikurangi */
        }

        .form-label {
            display: block;
            margin-bottom: 0.4rem; /* Margin dikurangi */
            color: #333;
            font-weight: 500;
            font-size: 0.9rem; /* Ukuran font label diperkecil */
        }

        .form-control {
            width: 100%;
            padding: 0.5rem; /* Padding dikurangi */
            border: 1px solid #e1e1e1;
            border-radius: 5px; /* Sudut lebih kecil */
            font-size: 0.8.5rem; /* Ukuran font input diperkecil */
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #2575fc;
            box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.1);
        }

        .password-strength {
            height: 3px; /* Tinggi bar kekuatan password diperkecil */
            background-color: #e1e1e1;
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s ease, background-color 0.3s;
        }

        .password-strengthicon {
            margin-top: 0.5rem; /* Margin dikurangi */
            font-size: 0.8rem; /* Ukuran font ikon kekuatan diperkecil */
            color: #666;
            display: flex;
            flex-wrap: wrap;
            gap: 7px; /* Jarak antar indikator dikurangi */
        }

        .indicator {
            display: inline-block;
            width: 8px; /* Ukuran indikator diperkecil */
            height: 8px;
            border-radius: 50%;
            background-color: #e1e1e1;
            margin-right: 3px; /* Margin dikurangi */
            position: relative;
            top: -1px;
        }

        .checked {
            background-color: #2575fc;
        }

        .alert {
            padding: 0.5rem; /* Padding dikurangi */
            margin-bottom: 0.8rem; /* Margin dikurangi */
            border-radius: 6px;
            font-size: 0.79rem; /* Ukuran font alert diperkecil */
            background-color: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin: 0.8rem 0; /* Margin dikurangi */
        }

        .form-check-input {
            margin-right: 0.3rem; /* Margin dikurangi */
        }

        .form-check-label {
            font-size: 0.8rem; /* Ukuran font label diperkecil */
            color: #666;
        }

        .btn-primary {
            width: 100%;
            padding: 0.5rem; /* Padding dikurangi */
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            border-radius: 7px; /* Sudut lebih kecil */
            font-size: 1rem; /* Ukuran font button diperkecil */
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .form-note-s2 {
            text-align: center;
            margin-top: 0.8rem; /* Margin dikurangi */
            font-size: 0.85rem; /* Ukuran font catatan diperkecil */
            color: #666;
        }

        .form-note-s2 a {
            color: #2575fc;
            text-decoration: none;
            font-weight: 500;
        }

        .form-note-s2 a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="brand-logo">
            <img class="logo-img" src="{{ asset('assets/dashboard/images/logo.png') }}" alt="logo">
        </div>
        <div class="nk-block-head">
            <h4 class="nk-block-title">Register</h4>
            <p class="subtitle">ERKA SOLUTION GROUP</p>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form id="register" action="/app/user/register" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Your username" value="{{ old('username') }}">
                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="name">Your Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Full Name" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" oninput="validatePassword()">
                <div class="password-strength">
                    <div class="progress-bar" id="progressBar"></div>
                </div>
                <div id="passwordStrengthicon" class="password-strengthicon">
                    <span><span id="capitalIndicator" class="indicator"></span> 1 capital letter</span>
                    <span><span id="lengthIndicator" class="indicator"></span> 8+ characters</span>
                    <span><span id="numberIndicator" class="indicator"></span> 1 number</span>
                    <span><span id="symbolIndicator" class="indicator"></span> 1 symbol</span>
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Remember this device
                    </label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>

        <div class="form-note-s2">
            Already have an account? <a href="{{ url('/app/user/login') }}">Login here</a>
        </div>
    </div>

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var passwordField = document.getElementById("password");
            password = passwordField.value.replace(/\s/g, '');
            passwordField.value = password;
            var capitalIndicator = document.getElementById("capitalIndicator");
            var lengthIndicator = document.getElementById("lengthIndicator");
            var numberIndicator = document.getElementById("numberIndicator");
            var symbolIndicator = document.getElementById("symbolIndicator");
            var progressBar = document.getElementById('progressBar');
            var strength = 0;

            if (/[A-Z]/.test(password)) {
                capitalIndicator.classList.add("checked");
                strength += 1;
            } else {
                capitalIndicator.classList.remove("checked");
            }

            if (password.length >= 8) {
                lengthIndicator.classList.add("checked");
                strength += 1;
            } else {
                lengthIndicator.classList.remove("checked");
            }

            if (/[0-9]/.test(password)) {
                numberIndicator.classList.add("checked");
                strength += 1;
            } else {
                numberIndicator.classList.remove("checked");
            }

            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                symbolIndicator.classList.add("checked");
                strength += 1;
            } else {
                symbolIndicator.classList.remove("checked");
            }

            progressBar.style.width = (strength * 25) + '%';

            if (strength == 0) {
                progressBar.style.backgroundColor = '#e1e1e1';
            } else if (strength == 1) {
                progressBar.style.backgroundColor = '#ff4d4d';
            } else if (strength == 2) {
                progressBar.style.backgroundColor = '#ffa64d';
            } else if (strength == 3) {
                progressBar.style.backgroundColor = '#4dff4d';
            } else {
                progressBar.style.backgroundColor = '#2575fc';
            }
        }
    </script>
</body>
</html>
