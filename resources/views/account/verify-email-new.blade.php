<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - ERKA SOLUTION GROUP</title>
    <link rel="icon" href="{{ asset('/login/assets/images/logos/favicon.png') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #6a11cb 50%, #2575fc 100%);
        }
        #scene-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #333;
            z-index: 1;
            width: 90%;
            max-width: 500px;
        }
        .card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(138, 43, 226, 0.1);
            transition: all 0.5s ease;
            backdrop-filter: blur(10px);
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(138, 43, 226, 0.2);
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #4B0082;
            font-weight: 700;
        }
        h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #8A2BE2;
            font-weight: 600;
        }
        p {
            font-size: 1.1em;
            margin-bottom: 30px;
            line-height: 1.6;
            color: #555;
        }
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 10px;
            text-transform: uppercase;
            background: linear-gradient(45deg, #9370DB, #8A2BE2);
            color: white;
            box-shadow: 0 4px 15px rgba(138, 43, 226, 0.2);
            position: relative;
            overflow: hidden;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(138, 43, 226, 0.3);
        }
        .btn:active {
            transform: translateY(1px);
        }
        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transition: width 0.3s ease, height 0.3s ease;
        }
        .btn:hover::after {
            width: 300px;
            height: 300px;
            margin-left: -150px;
            margin-top: -150px;
        }
        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f8f5ff 0%, #e6e0fa 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            color: #4B0082;
            font-size: 2em;
        }
        .floating-icon {
            position: absolute;
            font-size: 2em;
            opacity: 0.7;
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>

<body>
    <div id="loading">Loading...</div>
    <div id="scene-container"></div>
    <div class="content">
        <div class="card">
            <h1>ERKA SOLUTION GROUP</h1>
            <h2>VERIFY YOUR EMAIL</h2>
            <p>Selamat datang di pengalaman verifikasi email! Klik tombol di bawah untuk memulai perjalanan verifikasi Anda.</p>
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        var alert = document.querySelector('.alert-success');
                        if (alert) {
                            alert.style.display = 'none';
                        }
                    }, 10000);
                </script>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn">{{ __('Verifikasi Email') }}</button>
                <button type="submit" formaction="{{ url('/logout') }}" class="btn">{{ __('Log Out') }}</button>
            </form>
        </div>
    </div>

    <script>
        let scene, camera, renderer, particles;

        function init() {
            scene = new THREE.Scene();
            camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            renderer = new THREE.WebGLRenderer({ alpha: true });
            renderer.setClearColor(0xf8f5ff, 1);
            renderer.setSize(window.innerWidth, window.innerHeight);
            document.getElementById('scene-container').appendChild(renderer.domElement);

            const geometry = new THREE.BufferGeometry();
            const vertices = [];
            const sizes = [];

            for (let i = 0; i < 3000; i++) {
                vertices.push(THREE.MathUtils.randFloatSpread(2000));
                vertices.push(THREE.MathUtils.randFloatSpread(2000));
                vertices.push(THREE.MathUtils.randFloatSpread(2000));
                sizes.push(Math.random() * 4 + 1);
            }

            geometry.setAttribute('position', new THREE.Float32BufferAttribute(vertices, 3));
            geometry.setAttribute('size', new THREE.Float32BufferAttribute(sizes, 1));

            const material = new THREE.PointsMaterial({
                color: 0x8A2BE2,
                sizeAttenuation: true,
                transparent: true,
                opacity: 0.6
            });

            particles = new THREE.Points(geometry, material);
            scene.add(particles);

            camera.position.z = 500;

            animate();
            document.getElementById('loading').style.display = 'none';
            addFloatingIcons();
        }

        function animate() {
            requestAnimationFrame(animate);
            particles.rotation.x += 0.0001;
            particles.rotation.y += 0.0001;
            renderer.render(scene, camera);
        }

        function onWindowResize() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        }

        window.addEventListener('resize', onWindowResize, false);

        function startVerification() {
            gsap.to('.card', {
                duration: 0.5,
                scale: 0.8,
                opacity: 0,
                rotationY: 180,
                onComplete: () => {
                    document.querySelector('.card').innerHTML = `
                        <h2>Verifikasi Berhasil!</h2>
                        <p>Selamat! Email Anda telah berhasil diverifikasi. Terima kasih atas partisipasi Anda.</p>
                        <button class="btn" onclick="location.reload()">Kembali</button>
                    `;
                    gsap.to('.card', {
                        duration: 0.5,
                        scale: 1,
                        opacity: 1,
                        rotationY: 0
                    });
                }
            });
        }

        function addFloatingIcons() {
            const icons = ['✉️', '🔐', '✅', '🔑', '🌟', '📧', '🔔'];
            icons.forEach((icon, index) => {
                for (let i = 0; i < 5; i++) {
                    const iconElement = document.createElement('div');
                    iconElement.className = 'floating-icon';
                    iconElement.textContent = icon;
                    iconElement.style.left = `${Math.random() * 80 + 10}%`;
                    iconElement.style.top = `${Math.random() * 80 + 10}%`;
                    iconElement.style.animationDelay = `${index * 0.5 + Math.random() * 0.5}s`;
                    document.body.appendChild(iconElement);
                }
            });
        }

        init();
    </script>
</body>

</html>
