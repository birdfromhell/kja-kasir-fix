<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ERKA SOLUTION GROUP</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/kjakasirlogo.png') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        html, body {
            height: 100%;
            overflow: hidden;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #6a11cb 50%, #2575fc 100%);
            padding: 1rem;
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.2;
            mix-blend-mode: multiply;
            animation: blob 7s infinite;
        }

        .blob-1 {
            top: 0;
            left: -4rem;
            width: 18rem;
            height: 18rem;
            background: #a78bfa;
        }

        .blob-2 {
            top: 0;
            right: -4rem;
            width: 18rem;
            height: 18rem;
            background: #93c5fd;
            animation-delay: 2s;
        }

        .blob-3 {
            bottom: -8rem;
            left: 5rem;
            width: 18rem;
            height: 18rem;
            background: #f9a8d4;
            animation-delay: 4s;
        }

        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }

        .login-container {
            position: relative;
            max-width: 28rem;
            width: 100%;
            z-index: 1;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logo {
            width: 8rem;
            height: 8rem;
            margin: 0 auto 2rem;
            position: relative;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 1.875rem;
            font-weight: bold;
            background: linear-gradient(to right, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #6b7280;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            background: rgba(255, 255, 255, 0.5);
            transition: all 0.2s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 1.5rem;
        }

        .forgot-password a {
            color: #3b82f6;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .submit-btn {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(to right, #3b82f6, #8b5cf6);
            color: white;
            border: none;
            border-radius: 0.75rem;
            font-weight: 500;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .submit-btn:hover {
            opacity: 0.9;
        }

        .signup-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #6b7280;
        }

        .signup-link a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .form-check-input {
            margin-right: 0.5rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 0.375rem;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            font-size: 0.875rem;
        }

        .alert-danger i {
            margin-right: 0.5rem;
            color: #f5c6cb;
        }
    </style>
</head>
<body>
    <!-- Animated background blobs -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <!-- Login container -->
    <div class="login-container">
        <div class="login-card">
            <!-- Logo -->
            <div class="logo">
                <img src="{{ asset('assets/images/kjakasirlogo.png') }}" alt="Logo" style="width: 100%; height: auto; border-radius: 0.75rem;">
            </div>

            <!-- Header -->
            <div class="header">
                <h1>Welcome Back</h1>
                <p>ERKA SOLUTION GROUP</p>
            </div>

            <!-- Login Form -->
            <form id="login" action="/app/user/login" method="POST">
                @csrf
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="username" placeholder="Username" required name="username">
                </div>

                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" placeholder="Password" required name="password">
                </div>

                @if ($errors->has('loginError'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('loginError') }}
                    </div>
                @endif

                <div class="form-check">
                    <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label text-dark" for="flexCheckChecked">
                        Ingat Perangkat Ini?
                    </label>
                </div>

                <div class="forgot-password">
                    <a href="{{ url('/forget-password')}}">Lupa Password ?</a>
                </div>

                <button type="submit" class="submit-btn">
                    Log In
                </button>

                <div class="signup-link">
                    Tidak punya akun? <a href="{{ url('/app/user/register') }}">Buat akun baru</a>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('/login/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/login/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
