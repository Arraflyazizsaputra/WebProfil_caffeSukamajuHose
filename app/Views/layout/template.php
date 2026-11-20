<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400&family=Special+Elite&display=swap" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        :root {
            --vintage-dark: #261C15;
            --vintage-cream: #fdfbf7;
            --vintage-accent: #c5a059;
            --vintage-text: #3e2723;
            --vintage-paper: #f4f1ea;
        }

        body {
            background-color: var(--vintage-cream);
            color: var(--vintage-text);
            font-family: 'Courier Prime', monospace;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* --- NAVBAR --- */
        .navbar-vintage {
            background-color: var(--vintage-dark);
            border-bottom: 4px double var(--vintage-accent);
            padding: 15px 0;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .navbar-brand {
            font-family: 'Special Elite', cursive;
            color: var(--vintage-accent) !important;
            font-size: 1.6rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-shadow: 2px 2px 0px #000;
        }

        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            margin: 0 12px;
            position: relative;
            font-size: 0.95rem;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--vintage-accent) !important;
            transform: translateY(-2px);
            text-shadow: 0 0 10px rgba(197, 160, 89, 0.4);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0; height: 2px;
            bottom: -2px; left: 0;
            background-color: var(--vintage-accent);
            transition: width 0.3s ease;
        }

        .nav-link.dropdown-toggle::after {
            display: none !important;
        }

        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }

        /* --- DROPDOWN --- */
        .dropdown-menu-vintage {
            background-color: var(--vintage-dark);
            border: 2px solid var(--vintage-accent);
            border-radius: 0;
            margin-top: 10px;
            box-shadow: 5px 5px 0px rgba(0,0,0,0.5);
            padding: 10px 0;
        }

        .dropdown-item {
            color: rgba(255,255,255,0.8);
            font-family: 'Courier Prime', monospace;
            font-size: 0.9rem;
            padding: 10px 20px;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .dropdown-item:hover {
            background-color: var(--vintage-accent);
            color: var(--vintage-dark) !important;
            padding-left: 25px;
        }

        .dropdown-divider {
            border-top: 1px dashed var(--vintage-accent);
            opacity: 0.5;
        }

        /* PANAH DROPDOWN */
        .navbar-dark .navbar-nav .nav-link.dropdown-toggle {
            display: flex;
            align-items: center;
        }

        .navbar-dark .navbar-nav .nav-link.dropdown-toggle::before {
            display: inline-block;
            margin-left: 8px;
            vertical-align: middle;
            content: "";
            border-top: 0.3em solid var(--vintage-accent);
            border-right: 0.3em solid transparent;
            border-left: 0.3em solid transparent;
            order: 2;
        }

        .navbar-toggler {
            border: 2px solid var(--vintage-accent);
            color: var(--vintage-accent);
        }

        .navbar-toggler:focus {
            box-shadow: none;
            background-color: rgba(197, 160, 89, 0.1);
        }

        /* --- CONTENT --- */
        main { flex: 1; }

        /* --- FOOTER --- */
        .footer-vintage {
            background-color: var(--vintage-dark);
            color: #d7ccc8;
            padding-top: 60px;
            padding-bottom: 20px;
            border-top: 5px solid var(--vintage-accent);
            font-size: 0.95rem;
            position: relative;
        }

        .footer-vintage::before {
            content: '';
            position: absolute;
            top: 5px; left: 0; right: 0;
            height: 2px;
            background-color: var(--vintage-dark);
            border-top: 1px dashed rgba(255,255,255,0.2);
        }

        .footer-title {
            font-family: 'Special Elite', cursive;
            color: var(--vintage-accent);
            font-size: 1.3rem;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px dashed rgba(197, 160, 89, 0.3);
            display: inline-block;
            letter-spacing: 1px;
        }

        .footer-link {
            color: #d7ccc8;
            text-decoration: none;
            display: block;
            margin-bottom: 12px;
            transition: 0.3s;
            position: relative;
            padding-left: 0;
        }
        
        .footer-link:hover {
            color: var(--vintage-accent);
            padding-left: 10px;
        }

        .footer-link:hover::before {
            content: '»';
            position: absolute;
            left: 0;
            color: var(--vintage-accent);
        }

        .social-icon {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 40px; height: 40px;
            border: 1px solid rgba(255,255,255,0.2);
            color: #d7ccc8;
            margin-right: 10px;
            transition: all 0.3s;
            font-size: 1.2rem;
        }

        .social-icon:hover {
            background-color: var(--vintage-accent);
            color: var(--vintage-dark);
            transform: rotate(15deg) scale(1.1);
            border-color: var(--vintage-accent);
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .contact-item i {
            font-size: 1.2rem;
            color: var(--vintage-accent);
            margin-right: 15px;
            margin-top: 2px;
        }

        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 50px;
            padding-top: 25px;
            text-align: center;
            color: rgba(255,255,255,0.4);
            font-size: 0.85rem;
            letter-spacing: 1px;
        }

        @media (max-width: 768px) {
            .footer-title { margin-top: 20px; font-size: 1.2rem; }
            .navbar-brand { font-size: 1.3rem; }
            .dropdown-menu-vintage {
                border: none;
                box-shadow: none;
                background-color: rgba(0,0,0,0.2);
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-vintage sticky-top">
        <div class="container">
            <a class="navbar-brand page-transition" href="<?= base_url('/') ?>">
                <i class="bi bi-cup-hot-fill me-2"></i> SUKAMAJU HOUSE
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center py-3 py-lg-0">
                    <li class="nav-item">
                        <a class="nav-link page-transition <?= uri_string() == '' ? 'active' : '' ?>" href="<?= base_url('/') ?>">Beranda</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-transition <?= strpos(uri_string(), 'menu') !== false ? 'active' : '' ?>" 
                           href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sadjian
                        </a>
                        <ul class="dropdown-menu dropdown-menu-vintage shadow" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('/menu/custombeer') ?>">☕ Custombeer (Kopi&Non-Kopi)</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/menu/soekamakan') ?>">🍪 Soekamakan (Makanan Ringan)</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/menu/roeparasa') ?>">🍲 Roepa Rasa (Makanan Berat)</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= base_url('/menu') ?>">Semua Sadjian</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link page-transition <?= uri_string() == 'galeri' ? 'active' : '' ?>" href="<?= base_url('/galeri') ?>">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-transition <?= uri_string() == 'about' ? 'active' : '' ?>" href="<?= base_url('/about') ?>">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-transition <?= uri_string() == 'contact' ? 'active' : '' ?>" href="<?= base_url('/contact') ?>">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <?= $this->renderSection('content'); ?>
    </main>

    <footer class="footer-vintage">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="footer-title">SUKAMAJU HOUSE</h5>
                    <p class="opacity-75" style="line-height: 1.6;">
                        Menghadirkan kembali hangatnja nostalgia liwat setjangkir kopi. Sebuah roang oentoek bertjerita, mengenang masa lalu, dan menikmati hari ini.
                    </p>
                    <div class="mt-4">
                        <a href="https://www.instagram.com/sukamajuhouse?igsh=MXNkNDBsbXBlMjBzbg==" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.facebook.com/sukamaju.house" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.tiktok.com/@sukamajuhouse?_r=1&_t=ZS-92IYdszR4nX" class="social-icon"><i class="bi bi-tiktok"></i></a>
                        <a href="https://wa.me/62895638401279?text=Halo,%20Apakah%20benar%20ini%20owner%20Sukamaju%20House" class="social-icon"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="footer-title">Jalan Pintas</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('/') ?>" class="footer-link page-transition">Beranda</a></li>
                        <li><a href="<?= base_url('/menu') ?>" class="footer-link page-transition">Sadjian</a></li>
                        <li><a href="<?= base_url('/galeri') ?>" class="footer-link page-transition">Galeri</a></li>
                        <li><a href="<?= base_url('/about') ?>" class="footer-link page-transition">Tentang Kami</a></li>
                        <li><a href="<?= base_url('/contact') ?>" class="footer-link page-transition">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Alamat Kami</h5>
                    <ul class="list-unstyled">
                        <li class="contact-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Jl. Aloen-Aloen Kalidjati, Kec.Kalidjati, <br>Soebang, Djawa Barat 41271</span>
                        </li>
                        <li class="contact-item">
                            <i class="bi bi-telephone-fill"></i>
                            <span>+62 895-6384-01279</span>
                        </li>
                        <li class="contact-item">
                            <i class="bi bi-envelope-fill"></i>
                            <span>hello@sukamajuhouse.com</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Waktoe Buka</h5>
                    <ul class="list-unstyled opacity-75 mb-4">
                        <li class="d-flex justify-content-between border-bottom border-secondary pb-2 mb-2">
                            <span>Senin - Minggu</span>
                            <span class="text-warning">12.00 - 22:00</span>
                        </li>
                    </ul>
                    <a href="<?= base_url('/menu') ?>" class="btn btn-outline-warning w-100 rounded-0 py-2 page-transition" style="border-style: dashed;">
                        <i class="bi bi-journal-text me-2"></i> LIHAT MENU LENGKAP
                    </a>
                </div>
            </div>

            <div class="copyright">
                &copy; <?= date('Y'); ?> Dibuat dengan <i class="bi bi-heart-fill text-danger mx-1"></i> by <strong>Sukamaju House</strong>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('a.smooth-scroll, a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (this.hasAttribute('data-bs-toggle')) {
                    return; 
                }
                
                if (href.includes('#')) {
                    const targetId = href.split('#')[1];
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        e.preventDefault();
                        const headerOffset = 90; 
                        const elementPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.scrollY - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: "smooth"
                        });
                    } 
                }
            });
        });
    });
</script>
</body>
</html>