<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - <?php echo $_SESSION['username']; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header class="header navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid px-5">
            <a href="dashboard.php" class="navbar-brand logo">Tri Restu <span>Sanubari</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <nav class="navbar-nav ms-auto">
                    <a href="dashboard.php" class="nav-link <?php if ($current == 'dashboard.php') echo 'active'; ?>">Home</a>
                    <a href="daftar_rangkuman.php" class="nav-link">Materi</a>
                    <a href="logout.php" class="nav-link">Logout</a>
                </nav>
            </div>
        </div>
    </header>

    <section class="home d-flex align-items-center" id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <div class="home-content">
                        <h1>Hi, Saya <span>Restu</span></h1>
                        <h3 class="text-animation">I'm a <span></span></h3>
                        <p>Saya seorang mahasiswa Semester 4 dengan jurusan Sistem Informasi di Institut Teknologi Mitra Gama yang
                        menyukai Pemrograman, Teknologi dan Keamanan Siber</p>
                        <p>Saat ini saya juga menjabat sebagai Ketua Divisi Kominfo BEM periode 2024/2025.</p>
                        <p>Mau liat Project saya selama belajar matakuliah Pemrograman Web 2? Klik My Project</p>
                        <div class="social-icon">
                            <a href="https://www.instagram.com/restu.sanubari.5"><i class="bi bi-instagram"></i></a>
                            <a href="mailto:restusanubari2@email.com"><i class="bi bi-envelope"></i></a>
                            <a href="https://wa.me/6282170918964" target="_blank"><i class="bi bi-whatsapp"></i></a>
                            <a href="https://github.com/TriRestuSanubari"><i class="bi bi-github"></i></a>
                        </div>
                        <div class="btn-group">
                            <a href="daftar_rangkuman.php" class="btn btn-primary">My Project</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="home-img">
                        <img src="image/restu_gambar.jpg" alt="Foto Profil">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="social-links mb-2">
                <a href="https://www.instagram.com/restu.sanubari.5"><i class="bi bi-instagram"></i></a>
                <a href="mailto:restusanubari2@email.com"><i class="bi bi-envelope"></i></a>
                <a href="https://wa.me/6282170918964" target="_blank"><i class="bi bi-whatsapp"></i></a>
                <a href="https://github.com/TriRestuSanubari"><i class="bi bi-github"></i></a>
            </div>
            <div class="footer-bottom text-center">
                <p>&copy; 2024 Tri Restu Sanubari</p>
            </div>
        </div>
    </footer>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>