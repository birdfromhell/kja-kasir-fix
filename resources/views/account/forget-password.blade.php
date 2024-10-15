<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password | ERKA SOULITON GROUP</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #6a11cb 50%, #2575fc 100%);
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            border-radius: 1rem;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .brand-logo {
            width: 130px;
            height: 130px;
            margin: 0 auto 1.5rem;
            background: white;
            border-radius: 20px;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-logo img {
            width: 100%;
            height: auto;
        }

        h4 {
            color: #4f46e5;
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 2rem;
            font-size: 0.85rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #374151;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.5);
            transition: all 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .btn {
            width: 100%;
            padding: 0.75rem;
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn:hover {
            background: #4338ca;
        }

        .form-note {
            text-align: center;
            margin-top: 1.5rem;
            color: #6b7280;
        }

        .form-note a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
        }

        .alert {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            background: #fee2e2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="brand-logo">
            <img src="{{ asset('assets/images/kjakasirlogo.png')}}" alt="logo">
        </div>
        <h4>Reset Password</h4>
        <p class="subtitle">ERKA SOLUTION GROUP</p>

        @if (session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        <form action="/app/user/forget-password" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}">
                @error('email')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Send Reset Link</button>
            </div>
        </form>

        <div class="form-note">
            Remember your password? <a href="{{ url('/app/user/login') }}">Login here</a>
        </div>
    </div>
</body>
</html>