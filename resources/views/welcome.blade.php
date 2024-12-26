<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Furniture | Welcome</title>
    <!-- Link ke Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        /* Header Styling */
        .navbar {
            background-color: #0047ab;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: bold;
        }
        .nav-link:hover {
            text-decoration: underline;
        }
        .hero-section {
            background: url('https://blog.atome.id/wp-content/uploads/2022/03/9-rekomendasi-furniture-stores-atau-toko-furnitur-terbaik.jpg') no-repeat center center/cover;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }
        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .hero-content {
            z-index: 2;
        }
        .hero-content h1 {
            font-size: 4rem;
            font-weight: bold;
        }
        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .footer {
            background-color: #0047ab;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Toko Furniture</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Selamat Datang di Toko Furniture</h1>
            <p>Temukan berbagai pilihan furniture terbaik untuk rumah dan kantor Anda.</p>
            <a href="#kategori" class="btn btn-primary btn-lg">Jelajahi Sekarang</a>
        </div>
    </section>

    <!-- Kategori Section -->
    <section id="kategori" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Kategori Pilihan</h2>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <!-- Path gambar di folder public/images/ -->
                    <img src="{{ asset('images/image1.jpg') }}" class="card-img-top" alt="Sofa">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sofa</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('images/image2.jpg') }}" class="card-img-top" alt="Meja & Kursi">
                    <div class="card-body">
                        <h5 class="card-title text-center">Meja & Kursi</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('images/image3.jpg') }}" class="card-img-top" alt="Tempat Tidur">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tempat Tidur</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('images/image4.jpg') }}" class="card-img-top" alt="Decorasi">
                    <div class="card-body">
                        <h5 class="card-title text-center">Decorasi</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Toko Furniture. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>