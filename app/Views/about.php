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
        --vintage-gold: #c5a059;
        --vintage-paper: #f4f1ea;
        --vintage-ink: #3e2723;
        --vintage-wood: #1e1611;
        --font-heading: 'Special Elite', cursive;  
        --font-body: 'Courier Prime', monospace;   
    }

    body {
        font-family: var(--font-body);
        color: var(--vintage-ink);
        background-color: var(--vintage-paper);
    }

    .typewriter-font { font-family: var(--font-heading) !important; }
    .typewriter-text { font-family: var(--font-body) !important; letter-spacing: 0px; }

    .parallax-header {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 160px 0; 
        position: relative;
        border-bottom: 5px double var(--vintage-gold);
        display: flex; align-items: center; justify-content: center;
    }

    .parallax-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(rgba(38, 28, 21, 0.8), rgba(38, 28, 21, 0.6));
        z-index: 1;
    }

    .vintage-paper-section {
        background-color: var(--vintage-paper);
        background-image: url('https://www.transparenttextures.com/patterns/aged-paper.png');
        color: var(--vintage-ink);
    }

    .vintage-photo-frame {
        background: #fff;
        padding: 15px 15px 40px 15px;
        box-shadow: 5px 5px 15px rgba(0,0,0,0.2);
        transform: rotate(-2deg);
        transition: transform 0.3s ease;
        border: 1px solid #dcdcdc;
    }

    .vintage-photo-frame:hover {
        transform: rotate(0deg) scale(1.02);
        box-shadow: 8px 8px 20px rgba(0,0,0,0.3);
    }

    .vintage-photo-frame img {
        width: 100%; height: auto;
        filter: sepia(40%) contrast(1.1);
        transition: filter 0.3s ease;
    }
    .vintage-photo-frame:hover img {
        filter: sepia(0%) contrast(1);
    }

    #btn-back-to-top {
        position: fixed; bottom: 90px; right: 30px; z-index: 9999;
        width: 50px; height: 50px; border-radius: 50%;
        background-color: var(--vintage-gold); color: var(--vintage-wood);
        border: none; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem; cursor: pointer;
        opacity: 0; visibility: hidden; transform: translateY(20px);
        transition: all 0.5s ease;
    }
    #btn-back-to-top.show { opacity: 1; visibility: visible; transform: translateY(0); }
    #btn-back-to-top:hover { background-color: var(--vintage-wood); color: var(--vintage-gold); }

    #btn-help-wa {
        position: fixed; bottom: 30px; right: 30px; z-index: 9999;
        width: 50px; height: 50px; border-radius: 50%;
        background-color: #25D366; color: white;
        border: 2px solid white; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem; text-decoration: none;
        transition: all 0.3s ease;
    }
    #btn-help-wa:hover { transform: scale(1.1); background-color: #128C7E; }

    .drop-cap::first-letter {
        float: left;
        font-family: var(--font-heading);
        font-size: 3.5rem;
        line-height: 0.8;
        padding-right: 15px; padding-top: 5px;
        color: var(--vintage-gold);
    }

    .divider-vintage {
        border-top: 1px dashed var(--vintage-gold);
        margin: 2rem 0; position: relative;
    }

    .divider-vintage::after {
        content: '★'; position: absolute;
        top: -12px; left: 50%; transform: translateX(-50%);
        background: var(--vintage-paper);
        padding: 0 10px; color: var(--vintage-gold);
    }

    @media (max-width: 768px) {
        #btn-back-to-top { bottom: 85px; right: 20px; width: 45px; height: 45px; }
        #btn-help-wa { bottom: 20px; right: 20px; width: 45px; height: 45px; font-size: 1.5rem; }
    }
</style>


<button type="button" id="btn-back-to-top" title="Kembali ke Atas"><i class="bi bi-arrow-up"></i></button>
<a href="https://wa.me/62895638401279?text=Halo%20Admin%20Sukamaju%20House%2C%20saya%20ingin%20bertanya%20seputar%20Cafe." target="_blank" id="btn-help-wa" title="Butuh Bantuan?"><i class="bi bi-whatsapp"></i></a>


<header class="parallax-header" style="background-image: url('<?= base_url('img/' . $about['gambar']); ?>');">
    <div class="parallax-overlay"></div>

    <div class="container text-center position-relative text-white" style="z-index: 2;">
        <div style="border: 2px solid rgba(255,255,255,0.3); display: inline-block; padding: 5px 15px; transform: rotate(-3deg); margin-bottom: 20px;">
            <p class="typewriter-text text-uppercase m-0" style="letter-spacing: 3px; font-size: 0.9rem;">Est. 2025</p>
        </div>

        <h1 class="display-3 fw-bold typewriter-font mb-3 text-uppercase" style="text-shadow: 3px 3px 0px #000;">
            <?= $about['judul']; ?>
        </h1>
        
        <p class="typewriter-text fs-5 text-warning" style="letter-spacing: 1px;">
            ~ Sebuah Kisah Perjalanan Rasa ~
        </p>
    </div>
</header>


<section class="section-padding py-5 vintage-paper-section">
    <div class="container py-4">
        
        <div class="row align-items-start g-5">
            
            <div class="col-lg-7 order-2 order-lg-1">
                <div class="pe-lg-4">
                    <h4 class="typewriter-font text-uppercase mb-2" style="color: var(--vintage-gold); border-bottom: 2px solid var(--vintage-gold); display: inline-block;">
                        Tjerita Kami
                    </h4>
                    <h2 class="typewriter-font mb-4" style="color: var(--vintage-ink);">Di Balik Roemah Jadoel terdapat sebuah kenikmatan</h2>
                    
                    <div class="typewriter-text fs-5 text-secondary drop-cap text-justify" style="text-align: justify; line-height: 1.8;">
                        <?= nl2br($about['deskripsi']); ?>
                    </div>

                    <div class="divider-vintage"></div>

                    <div class="row mt-4 typewriter-text">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-geo-alt fs-2 me-3 text-muted"></i>
                                <div>
                                    <h6 class="fw-bold mb-0 text-uppercase">Lokasi</h6>
                                    <small class="text-muted">Jl. Aloen-Aloen Kalidjati, Kec.Kalidjati, Soebang</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-cup-hot fs-2 me-3 text-muted"></i>
                                <div>
                                    <h6 class="fw-bold mb-0 text-uppercase">Soeasana</h6>
                                    <small class="text-muted">Klasik & Hanggat & Jadoel</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 order-1 order-lg-2 mb-4 mb-lg-0">
                <div class="vintage-photo-frame">
                    <img src="<?= base_url('img/' . $about['gambar']); ?>" alt="Interior Kafe">
                    <div class="text-center mt-3 typewriter-text text-muted small">
                        <i>"Sudut favorit para penikmat senja"</i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="py-5 bg-dark text-white position-relative" style="background-image: url('https://www.transparenttextures.com/patterns/black-linen.png'); border-top: 4px double var(--vintage-gold);">
    <div class="container text-center py-4">
        <i class="bi bi-quote fs-1 mb-3 d-block" style="color: var(--vintage-gold);"></i>
        <h3 class="typewriter-text fst-italic fw-light mb-4 w-75 mx-auto" style="line-height: 1.6;">
            "Kamu yakin, yang kamu minum itu kopi? Itu racun rindu, yang mengandung aku."
        </h3>
        <p class="typewriter-font text-uppercase letter-spacing-2 text-warning small mb-0">
            — Joko Pinurbo
        </p>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // BACK TO TOP
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
    });
</script>

<?= $this->endSection(); ?>