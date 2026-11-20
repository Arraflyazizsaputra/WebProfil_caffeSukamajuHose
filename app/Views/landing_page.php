<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

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
        
        /* WARNA BACKGROUND */
        --vintage-wood: #1e1611;   
        --vintage-rust: #8b5a2b;   

        /* FONT */
        --font-heading: 'Special Elite', cursive;  
        --font-body: 'Courier Prime', monospace;   
    }

    body {
        background-color: var(--vintage-cream);
        color: var(--vintage-text);
        font-family: var(--font-body);
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        overflow-x: hidden;
    }

    .typewriter-font { 
        font-family: var(--font-heading) !important; 
        font-weight: 400; 
    }
    
    .typewriter-text { 
        font-family: var(--font-body) !important; 
        letter-spacing: 0px; 
    }

    /* --- CAROUSEL & HERO SECTION --- */
    .carousel-item {
        height: 100vh;
        min-height: 600px;
        background-color: #000;
        position: relative;
        transition: transform 1.5s cubic-bezier(0.25, 1, 0.5, 1);
        backface-visibility: hidden;
    }
    
    .overlay-bg {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-size: cover; background-position: center;
        animation: kenBurns 25s infinite alternate linear; 
    }
    
    .overlay-bg::after {
        content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(26,18,14,0.8));
    }

    @keyframes kenBurns {
        from { transform: scale(1); }
        to { transform: scale(1.15); }
    }

    /* --- HERO CONTENT --- */
    .hero-content {
        z-index: 10;
        pointer-events: none;
    }
    
    .hero-title {
        font-family: var(--font-heading) !important;
        font-size: clamp(2rem, 6vw, 4.5rem); 
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 3px; 
        text-shadow: 4px 4px 0 #000000;
        margin-bottom: 0 !important;
        line-height: 1;
        font-weight: 400; 
    }

    .glass-title {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        padding: 30px 50px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        display: inline-block;
        margin-bottom: 30px;
        pointer-events: auto;
    }

    /* --- CUSTOM CAROUSEL CONTROLS --- */
    .carousel-control-prev, .carousel-control-next {
        width: 8%; opacity: 0; transition: all 0.5s ease; z-index: 20;
    }

    #heroCarousel:hover .carousel-control-prev,
    #heroCarousel:hover .carousel-control-next { opacity: 1; }

    .custom-nav-btn {
        width: 60px; height: 60px;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.3);
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(5px);
        display: flex; align-items: center; justify-content: center;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
    }

    .custom-nav-btn i { font-size: 1.5rem; color: #fff; }

    .carousel-control-prev:hover .custom-nav-btn,
    .carousel-control-next:hover .custom-nav-btn {
        background: var(--vintage-accent);
        border-color: var(--vintage-accent);
        transform: scale(1.1); 
        box-shadow: 0 0 20px rgba(197, 160, 89, 0.6);
    }

    /* --- BUTTONS --- */
    .btn-vintage-primary {
        background-color: var(--vintage-accent); 
        color: var(--vintage-dark);
        font-weight: bold; 
        padding: 12px 30px; 
        transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
        border: 2px solid var(--vintage-accent);
        text-transform: uppercase;
        letter-spacing: 2px;
        font-family: var(--font-body); 
    }
    .btn-vintage-primary:hover {
        background-color: #fff; 
        color: var(--vintage-accent); 
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.4);
    }

    .btn-vintage-outline {
        background-color: transparent;
        color: #fff;
        font-weight: bold; 
        padding: 12px 30px; 
        transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
        border: 2px solid #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-family: var(--font-body); 
    }
    .btn-vintage-outline:hover {
        background-color: #fff;
        color: var(--vintage-dark);
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.4);
    }

    .btn-vintage-dark {
        background-color: var(--vintage-dark);
        color: var(--vintage-cream);
        font-weight: bold; 
        padding: 12px 30px; 
        transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
        border: 2px solid var(--vintage-dark);
        text-transform: uppercase;
        letter-spacing: 2px;
        font-family: var(--font-body);
    }
    .btn-vintage-dark:hover {
        background-color: var(--vintage-cream);
        color: var(--vintage-dark);
        transform: translateY(-5px);
    }

    /* --- SECTIONS --- */
    .section-padding { padding: 90px 0; }

    /* --- MENU CARD --- */
    .card-menu {
        border: none;
        background: #fff;
        transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        position: relative;
        overflow: hidden;
    }
    
    .card-menu::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 4px;
        background: var(--vintage-accent);
        transform: scaleX(0);
        transition: transform 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        transform-origin: left;
        z-index: 2;
    }

    .card-menu:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
    }

    .card-menu:hover::before {
        transform: scaleX(1);
    }

    .card-img-wrapper {
        height: 380px; /* DIPERBESAR ke bawah (sebelumnya 250px) */
        overflow: hidden;
        position: relative;
    }

    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: sepia(20%) contrast(110%); 
        transition: transform 0.8s ease, filter 0.8s ease;
    }

    .card-menu:hover .card-img-top {
        transform: scale(1.1);
        filter: sepia(0%) contrast(100%);
    }

    /* STYLE KARTU MENU */
    .card-menu .card-title {
        font-family: var(--font-heading) !important; 
        font-size: 1.35rem;
        letter-spacing: 0.5px;
    }

    .card-menu .card-text {
        font-family: var(--font-body) !important;
        font-size: 0.95rem;
        line-height: 1.6;
        color: #666;
        /* Line clamp dihapus agar detail deskripsi terlihat semua ke bawah */
        display: block; 
        overflow: visible;
    }

    .card-menu .price-tag {
        font-family: var(--font-heading) !important;
        font-weight: 700;
        letter-spacing: 1px;
    }

    /* --- GALERI --- */
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 4px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        cursor: zoom-in;
    }
    
    .gallery-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
        opacity: 0;
        transition: opacity 0.5s ease;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 25px;
        pointer-events: none; 
    }

    .gallery-item:hover .gallery-overlay { opacity: 1; }
    
    /* MODAL GALERI CUSTOM */
    #galleryLightbox .modal-content {
        background: transparent;
        border: none;
    }
    #lightboxImage {
        border: 5px solid white;
        box-shadow: 0 0 30px rgba(0,0,0,0.5);
        max-height: 85vh;
        object-fit: contain;
    }

    /* --- BUTTON TO TOP --- */
    #btn-back-to-top {
        position: fixed;
        bottom: 95px; 
        right: 30px;
        z-index: 9999;
        width: 50px; height: 50px;
        border-radius: 50%;
        background-color: var(--vintage-accent);
        color: var(--vintage-dark);
        border: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
        cursor: pointer;
        opacity: 0; 
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.6s cubic-bezier(0.19, 1, 0.22, 1);
    }

    #btn-back-to-top.show {
        opacity: 1; visibility: visible; transform: translateY(0);
    }

    #btn-back-to-top:hover {
        background-color: var(--vintage-dark);
        color: var(--vintage-accent);
        transform: translateY(-5px) scale(1.1);
    }

    /* --- BUTTON WHATSAPP --- */
    #btn-whatsapp {
        position: fixed;
        bottom: 30px; 
        right: 30px;
        z-index: 9998;
        width: 50px; height: 50px;
        border-radius: 50%;
        background-color: #25D366;
        color: #fff;
        border: 2px solid #fff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.4s ease;
    }

    #btn-whatsapp:hover {
        transform: translateY(-5px) scale(1.1);
        background-color: #128C7E;
        box-shadow: 0 6px 20px rgba(0,0,0,0.4);
    }

    .reveal-on-scroll { 
        opacity: 0; 
        transform: translateY(60px); 
        transition: all 1.2s cubic-bezier(0.19, 1, 0.22, 1); 
    }
    
    .reveal-on-scroll.active { 
        opacity: 1; 
        transform: translateY(0); 
    }

    @media (max-width: 768px) {
        .carousel-control-prev, .carousel-control-next { opacity: 1; width: 15%; }
        .hero-title { font-size: 2.8rem; letter-spacing: 1px; }
        .glass-title { padding: 20px 20px; width: 90%; }
        .section-padding { padding: 60px 0; }
        #btn-back-to-top { bottom: 85px; right: 20px; width: 45px; height: 45px; }
        #btn-whatsapp { bottom: 20px; right: 20px; width: 45px; height: 45px; font-size: 1.5rem; }
        .card-img-wrapper { height: 300px; }
    }
</style>


<button type="button" id="btn-back-to-top" title="Kembali ke Atas">
    <i class="bi bi-arrow-up"></i>
</button>


<a href="https://wa.me/62895638401279?text=Halo%20Admin%20Sukamaju%20House%2C%20saya%20butuh%20bantuan%20mengenai%20menu%20dan%20reservasi." 
   target="_blank" 
   id="btn-whatsapp" 
   title="Butuh Bantuan? Hubungi Kami">
    <i class="bi bi-whatsapp"></i>
</a>


<header class="position-relative w-100 p-0 m-0" style="height: 100vh; overflow: hidden;">
    <div id="heroCarousel" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="6000" data-bs-pause="false">
        <div class="carousel-inner h-100">
            <div class="carousel-item active"><div class="overlay-bg" style="background-image: url('<?= base_url('img/Bg1.png') ?>');"></div></div>
            <div class="carousel-item"><div class="overlay-bg" style="background-image: url('<?= base_url('img/Bg6.jpeg') ?>');"></div></div>
            <div class="carousel-item"><div class="overlay-bg" style="background-image: url('<?= base_url('img/Bg3.jpeg') ?>');"></div></div>
            <div class="carousel-item"><div class="overlay-bg" style="background-image: url('<?= base_url('img/Bg4.jpeg') ?>');"></div></div>
            <div class="carousel-item"><div class="overlay-bg" style="background-image: url('<?= base_url('img/Bg5.jpeg') ?>');"></div></div>
        </div>
        
        <button class="carousel-control-prev d-none d-md-flex" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <div class="custom-nav-btn"><i class="bi bi-chevron-left"></i></div>
        </button>
        <button class="carousel-control-next d-none d-md-flex" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <div class="custom-nav-btn"><i class="bi bi-chevron-right"></i></div>
        </button>
    </div>
    
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center text-center px-3 hero-content">
        <div class="glass-title animate-up">
            <h1 class="hero-title typewriter-font">SUKAMAJU HOUSE</h1>
            <p class="text-white typewriter-text mb-0 d-none d-md-block" style="letter-spacing: 4px; font-weight: 600;">EST. 2025</p>
        </div>
        
        <div class="d-flex flex-column flex-md-row gap-3 animate-up delay-2" style="pointer-events: auto;">
            <a href="#menu" class="btn btn-lg rounded-0 shadow btn-vintage-primary px-5">LIHAT SADJIAN</a>
            <a href="<?= base_url('/about') ?>" class="btn btn-lg rounded-0 shadow btn-vintage-outline px-5">TENTANG KAMI</a>
        </div>
    </div>
</header>


<section class="section-padding reveal-on-scroll">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 order-lg-2 text-center position-relative">
                <div style="border: 2px dashed var(--vintage-dark); padding: 10px; display: inline-block; transform: rotate(2deg);">
                    <img src="img/logo.jpg" alt="Logo Vintage" class="img-fluid shadow-lg" style="max-width: 100%; filter: sepia(30%); width: 350px;">
                </div>
            </div>
            <div class="col-lg-7 order-lg-1 text-center text-lg-start">
                <h5 class="typewriter-font mb-2 text-uppercase" style="color: var(--vintage-accent); letter-spacing: 3px; font-size: 1rem;">Selamat Datang</h5>
                <h2 class="display-5 typewriter-font mb-4" style="line-height: 1.2;">Lebih Dari Sekadar<br>Waroeng Biasa</h2>
                <p class="lead typewriter-text mb-4" style="text-align: justify; font-size: 1.1rem; color: #555;">
                    Di Sukamaju House, waktoe seolah berhenti sejenak. Kami pertjaja bahwa soeasana adalah boemboe rahasia jang paling nikmat. Bukan hanja sekadar tempat menyesap kopi atau lainnja, melainkan seboeah roang oentoek bertjerita.
                </p>
                <div class="mt-4 opacity-75" style="font-family: var(--font-heading); font-size: 1.8rem; transform: rotate(-2deg); color: var(--vintage-accent); font-style: italic;">
                    - Sukamaju House -
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-padding reveal-on-scroll" style="background-color: var(--vintage-wood); background-image: url('https://www.transparenttextures.com/patterns/dark-wood.png');">
    <div class="container">
        <div class="text-center mb-5 text-white">
            <h2 class="display-5 typewriter-font" style="color: var(--vintage-cream);">Intip Soeasana Kami</h2>
            <p class="lead opacity-75 typewriter-text">Tjoeplikan soedoet ternjaman di Sukamaju House.</p>
            <div style="width: 60px; height: 3px; background: var(--vintage-accent); margin: 20px auto;"></div>
        </div>
        
        <div class="row g-4" id="gallery-container">
            <?php if (empty($galeri)) : ?>
                <div class="col-12 text-center text-white opacity-50 py-5 typewriter-text">
                    <p>Beloem ada potret soeasana jang dioenggah.</p>
                </div>
            <?php else : ?>
                <?php foreach (array_slice($galeri, 0, 3) as $g) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item h-100" onclick="openLightbox('<?= base_url('img/galeri/' . $g['gambar']); ?>', '<?= $g['judul']; ?>')">
                            <img src="<?= base_url('img/galeri/' . $g['gambar']); ?>" 
                                 class="img-fluid w-100 h-100 gallery-img" 
                                 style="height: 350px; object-fit: cover; filter: sepia(30%); transition: transform 0.6s ease;"
                                 alt="<?= $g['judul']; ?>">
                            <div class="gallery-overlay">
                                <h4 class="mb-0 typewriter-font text-white" style="text-shadow: 1px 1px 2px black; letter-spacing: 1px;"><?= $g['judul']; ?></h4>
                                <small class="text-white opacity-75 typewriter-text d-block text-truncate"><?= $g['subjudul']; ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-5">
            <a href="<?= base_url('/galeri') ?>" class="btn btn-vintage-outline rounded-0 px-5 py-3 typewriter-text" style="letter-spacing: 2px; font-size: 0.9rem;">
                LIHAT SELOEROEH GALERI <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<div class="modal fade" id="galleryLightbox" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="z-index: 10;"></button>
                <div class="text-center">
                    <img src="" id="lightboxImage" class="img-fluid">
                    <h3 id="lightboxCaption" class="typewriter-font text-white mt-3"></h3>
                </div>
            </div>
        </div>
    </div>
</div>


<section id="menu" class="section-padding bg-light reveal-on-scroll" style="background-image: var(--vintage-paper);">
    <div class="container">
        <div class="text-center mb-5">
            <h5 class="typewriter-font mb-2 text-uppercase" style="color: var(--vintage-accent); letter-spacing: 3px; font-size: 1rem;">Oentoek Toean & Njonja</h5>
            <h2 class="display-5 typewriter-font">Sadjian Pilihan Kategori</h2>
            <p class="text-muted typewriter-text fst-italic">Menoe terbaik dari setiap kategori jang kami miliki.</p>
            <div style="width: 80px; height: 3px; background: var(--vintage-dark); margin: 20px auto;"></div>
        </div>

        <div class="row g-4 justify-content-center">
            <?php if (empty($menus)) : ?>
                <div class="col-12 text-center py-5 typewriter-text">
                    <p class="text-muted fst-italic">Beloem ada data sadjian jang ditampilkan.</p>
                </div>
            <?php else : ?>
                <?php foreach ($menus as $m) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-menu h-100">
                            <div class="card-img-wrapper">
                                <img src="<?= base_url('img/' . $m['gambar']); ?>"
                                     class="card-img-top"
                                     alt="<?= $m['nama_menu']; ?>"
                                     onerror="this.src='https://via.placeholder.com/400x300?text=Sukamaju+House';">
                            </div>
                            <div class="card-body text-center p-4">
                                <small class="text-uppercase mb-2 d-block fw-bold" style="letter-spacing: 2px; color: var(--vintage-accent); font-size: 0.75rem;">
                                    <i class="bi bi-tag-fill me-1"></i> <?= $m['kategori']; ?>
                                </small>
                                
                                <h5 class="card-title fw-bold typewriter-font text-uppercase mb-2"><?= $m['nama_menu']; ?></h5>
                                
                                <div style="height: 1px; width: 40px; background: var(--vintage-accent); margin: 15px auto;"></div>
                                
                                <p class="card-text text-muted typewriter-text mb-4">
                                    <?= $m['deskripsi']; ?>
                                </p>
                                
                                <span class="d-block fs-5 fw-bold typewriter-font price-tag mt-auto" style="color: var(--vintage-dark);">
                                    IDR <?= number_format($m['harga'], 0, ',', '.'); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?= base_url('/menu') ?>" class="btn btn-vintage-outline text-dark border-dark rounded-0 px-5 py-3 typewriter-text" style="letter-spacing: 2px; font-size: 0.9rem;">
                LIHAT SELOEROEH MENOE <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>


<section class="py-5 text-center text-white reveal-on-scroll" style="background-color: var(--vintage-rust); background-image: url('https://www.transparenttextures.com/patterns/cubes.png');">
    <div class="container py-4">
        <h2 class="display-6 fw-bold mb-4 typewriter-font" style="color: var(--vintage-dark); text-shadow: 1px 1px 0 #fff;">Rasakan Pengalamannja Langsoeng</h2>
        
        <button type="button" class="btn btn-lg rounded-0 shadow btn-vintage-dark typewriter-text px-5 py-3" data-bs-toggle="modal" data-bs-target="#locationModal">
            <i class="bi bi-geo-alt-fill me-2"></i> LIHAT LOKASI KAMI
        </button>
    </div>
</section>


<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0" style="background-color: var(--vintage-paper); border: 3px double var(--vintage-dark);">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title typewriter-font fw-bold" id="locationModalLabel" style="color: var(--vintage-dark); letter-spacing: 1px;">LOKASI KAMI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3 typewriter-text" style="color: var(--vintage-text);">
                    <p class="mb-1 fw-bold fs-5">SUKAMAJU HOUSE</p>
                    <p class="small text-muted fst-italic">Tempat di mana rasa dan cerita bertemu.</p>
                </div>
                
                <div class="ratio ratio-16x9" style="border: 2px solid var(--vintage-dark); filter: sepia(20%);">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.967160333041!2d107.67510531036709!3d-6.525831563769645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693d00428321db%3A0x7922cf1107178a1b!2sSukamaju%20House!5e0!3m2!1sid!2sid!4v1767136320532!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <a href="https://maps.app.goo.gl/kPnbq9WRKHarT3WG6" target="_blank" class="btn btn-vintage-primary btn-sm rounded-0 typewriter-text shadow-sm">
                    Buka di Google Maps
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    // FUNGSI EMBUKA LIGHTBOX GAMBAR
    function openLightbox(imgSrc, caption) {
        const modal = new bootstrap.Modal(document.getElementById('galleryLightbox'));
        document.getElementById('lightboxImage').src = imgSrc;
        document.getElementById('lightboxCaption').innerText = caption;
        modal.show();
    }

    document.addEventListener("DOMContentLoaded", function() {
        
        // 1. CAROUSEL AUTO PLAY
        var myCarousel = document.querySelector('#heroCarousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000,
            ride: 'carousel',
            pause: false,
            wrap: true 
        });

        // 2. SCROLL REVEAL
        window.addEventListener('scroll', reveal);
        function reveal() {
            var reveals = document.querySelectorAll('.reveal-on-scroll');
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var revealTop = reveals[i].getBoundingClientRect().top;
                var revealPoint = 100;
                if (revealTop < windowHeight - revealPoint) {
                    reveals[i].classList.add('active');
                }
            }
        }
        reveal(); 

        // 3. SMOOTH SCROLL FOR LINKS
        document.addEventListener('click', function(e) {
            const targetLink = e.target.closest('a[href^="#"]');
            
            if (targetLink) {
                e.preventDefault(); 
                const targetId = targetLink.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const headerOffset = 85; 
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.scrollY - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth"
                    });
                }
            }
        });

        // 4. BUTTON BACK TO TOP
        const btnBackToTop = document.getElementById("btn-back-to-top");

        window.addEventListener('scroll', function () {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                btnBackToTop.classList.add('show');
            } else {
                btnBackToTop.classList.remove('show');
            }
        });

        btnBackToTop.addEventListener("click", function() {
            document.body.scrollTop = 0; 
            document.documentElement.scrollTop = 0; 
        });

        // 5. INTERAKTIVITAS GALERI
        const items = document.querySelectorAll('.gallery-item');
        items.forEach(item => {
            item.addEventListener('mousemove', (e) => {
                const img = item.querySelector('img');
                const { left, top, width, height } = item.getBoundingClientRect();
                const x = (e.clientX - left) / width - 0.5;
                const y = (e.clientY - top) / height - 0.5;
                
                img.style.transform = `scale(1.1) rotateX(${y * 10}deg) rotateY(${x * 10}deg)`;
            });

            item.addEventListener('mouseleave', () => {
                const img = item.querySelector('img');
                img.style.transform = `scale(1) rotateX(0) rotateY(0)`;
            });
        });
    });
</script>


<?= $this->endSection(); ?>