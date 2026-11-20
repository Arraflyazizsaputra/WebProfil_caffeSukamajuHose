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
        --vintage-wood: #1e1611;
        --vintage-paper: #f4f1ea;

        --font-heading: 'Special Elite', cursive;  
        --font-body: 'Courier Prime', monospace;   
    }

    body {
        font-family: var(--font-body);
        color: var(--vintage-text);
        background-color: var(--vintage-wood);
    }

    .typewriter-font { font-family: var(--font-heading) !important; }
    .typewriter-text { font-family: var(--font-body) !important; letter-spacing: 0px; }

    /* --- HEADER SECTION --- */
    .gallery-header {
        position: relative;
        padding: 140px 0; 
        border-bottom: 5px double var(--vintage-accent);
        background-image: url('<?= base_url('img/Bg1.png'); ?>'); 
        background-size: cover; 
        background-position: center;
        background-attachment: fixed;
    }

    .gallery-header .overlay-bg {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(rgba(38, 28, 21, 0.8), rgba(38, 28, 21, 0.6));
        z-index: 1;
    }

    /* --- POLAROID CARD STYLING --- */
    .vintage-wall-bg {
        background-color: var(--vintage-wood);
        background-image: url("https://www.transparenttextures.com/patterns/dark-wood.png");
        box-shadow: inset 0 0 150px rgba(0,0,0,0.8);
    }

    .polaroid-card {
        background-color: var(--vintage-paper); 
        padding: 15px 15px 40px 15px; 
        box-shadow: 5px 10px 20px rgba(0,0,0,0.5);
        transform: rotate(-2deg);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        border: 1px solid #d7ccc8;
        cursor: pointer;
    }

    .polaroid-card::before {
        content: "";
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-image: url("https://www.transparenttextures.com/patterns/cream-paper.png");
        opacity: 0.6;
        pointer-events: none;
    }

    .polaroid-card:hover {
        transform: rotate(0deg) scale(1.03) translateY(-10px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.6);
        z-index: 10;
        background-color: #fff;
    }

    .col-lg-4:nth-child(even) .polaroid-card { transform: rotate(2deg); }
    .col-lg-4:nth-child(even) .polaroid-card:hover { transform: rotate(0deg) scale(1.03) translateY(-10px); }

    .image-wrapper {
        width: 100%;
        height: 280px;
        overflow: hidden;
        background: #000;
        border: 1px solid #999;
        position: relative;
    }

    .image-wrapper img {
        width: 100%; height: 100%; object-fit: cover;
        filter: sepia(40%) contrast(1.1) grayscale(20%);
        transition: filter 0.5s ease, transform 0.8s ease;
    }

    .polaroid-card:hover .image-wrapper img {
        filter: sepia(0%) contrast(1.05) grayscale(0%);
        transform: scale(1.15);
    }

    .pin {
        width: 15px; height: 15px;
        border-radius: 50%;
        background: radial-gradient(circle at 30% 30%, #c5a059, #5d4037); 
        position: absolute; top: -7px; left: 50%; transform: translateX(-50%);
        box-shadow: 1px 2px 4px rgba(0,0,0,0.6); 
        z-index: 5;
        border: 1px solid #3e2723;
    }

    .btn-vintage-back {
        display: inline-block;
        padding: 10px 25px;
        border: 1px solid var(--vintage-accent);
        color: var(--vintage-paper);
        font-family: var(--font-body);
        text-decoration: none;
        letter-spacing: 1px;
        transition: 0.3s;
        background: rgba(255,255,255,0.05);
    }
    .btn-vintage-back:hover {
        background: var(--vintage-accent);
        color: var(--vintage-dark);
    }

    /* --- FLOATING BUTTONS --- */
    #btn-back-to-top {
        position: fixed; bottom: 90px; right: 30px; z-index: 9999;
        width: 50px; height: 50px; border-radius: 50%;
        background-color: var(--vintage-accent); color: var(--vintage-dark);
        border: none; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem; cursor: pointer;
        opacity: 0; visibility: hidden; transform: translateY(20px);
        transition: all 0.5s ease;
    }
    #btn-back-to-top.show { opacity: 1; visibility: visible; transform: translateY(0); }
    #btn-back-to-top:hover { background-color: var(--vintage-paper); color: var(--vintage-dark); }

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

    @media (max-width: 768px) {
        #btn-back-to-top { bottom: 85px; right: 20px; width: 45px; height: 45px; }
        #btn-help-wa { bottom: 20px; right: 20px; width: 45px; height: 45px; font-size: 1.5rem; }
    }
</style>


<button type="button" id="btn-back-to-top" title="Kembali ke Atas"><i class="bi bi-arrow-up"></i></button>
<a href="https://wa.me/62895638401279?text=Halo%20Admin%20Sukamaju%20House%2C%20saya%20sedang%20melihat%20Galeri%20dan%20butuh%20bantuan." target="_blank" id="btn-help-wa" title="Butuh Bantuan?"><i class="bi bi-whatsapp"></i></a>


<header class="gallery-header text-center">
    <div class="overlay-bg"></div>
    <div class="container position-relative" style="z-index: 2;">
        
        <div style="border: 2px solid var(--vintage-accent); padding: 20px 30px; display: inline-block;">
            <h1 class="display-3 fw-bold text-white m-0 typewriter-font" style="letter-spacing: 3px; text-shadow: 2px 2px 0px #000;">
                GALERI KENANGAN
            </h1>
        </div>
        
        <div style="width: 100px; height: 2px; background: var(--vintage-accent); margin: 25px auto;"></div>
        
        <p class="fs-5 text-white-50 m-0 typewriter-text" style="letter-spacing: 1px;">
            ~ Merekam djedjak waktoe di Sukamaju House ~
        </p>
    </div>
</header>


<section class="section-padding py-5 vintage-wall-bg" style="min-height: 100vh;">
    <div class="container">
        
        <div class="mb-5 text-center">
            <a href="<?= base_url('/') ?>" class="btn-vintage-back rounded-0">
                <i class="bi bi-arrow-left me-2"></i> KEMBALI KE BERANDA
            </a>
        </div>

        <div class="row g-5">
            <?php if(empty($galeri)) : ?>
                <div class="col-12 text-center text-white-50 py-5">
                    <div style="border: 2px dashed var(--vintage-accent); padding: 40px; display: inline-block;">
                        <i class="bi bi-camera-reels fs-1 mb-3 d-block" style="color: var(--vintage-accent);"></i>
                        <p class="fs-5 typewriter-text">Beloem ada rol film jang ditjetak.</p>
                    </div>
                </div>
            <?php else : ?>
                <?php foreach($galeri as $g) : ?>
                
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="polaroid-card" 
                         data-bs-toggle="modal" 
                         data-bs-target="#modalGallery"
                         data-imgsrc="<?= base_url('img/galeri/' . $g['gambar']); ?>"
                         data-title="<?= $g['judul']; ?>"
                         data-subtitle="<?= $g['subjudul']; ?>">
                        
                        <div class="pin"></div>

                        <div class="image-wrapper">
                            <img src="<?= base_url('img/galeri/' . $g['gambar']); ?>" 
                                 class="img-fluid" 
                                 alt="<?= $g['judul']; ?>">
                        </div>
                        
                        <div class="mt-4 text-center">
                            <h5 class="fw-bold mb-1 text-uppercase typewriter-font" style="font-size: 1.2rem; color: var(--vintage-dark);">
                                <?= $g['judul']; ?>
                            </h5>
                            <div style="height: 1px; width: 40px; background: var(--vintage-accent); margin: 5px auto 10px;"></div>
                            <p class="text-muted small mb-0 typewriter-text fst-italic" style="font-size: 0.9rem;">
                                "<?= $g['subjudul']; ?>"
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="text-center mt-5 pt-5 opacity-25">
            <p class="typewriter-font" style="font-size: 2rem; color: var(--vintage-cream);">Sukamaju House</p>
        </div>

    </div>
</section>

<div class="modal fade" id="modalGallery" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0 border-0" style="background-color: #fff; padding: 15px;">
            <div class="modal-body p-0 position-relative text-center">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2 z-3" data-bs-dismiss="modal" aria-label="Close"></button>
                
                <img src="" id="modalImage" class="img-fluid" style="max-height: 75vh; width: 100%; object-fit: contain;">
                
                <div class="pt-4 pb-2 text-center">
                    <h4 id="modalTitle" class="fw-bold mb-1 text-uppercase typewriter-font" style="color: var(--vintage-dark);"></h4>
                    <p id="modalSubtitle" class="text-muted mb-0 small fst-italic typewriter-text"></p>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modalGallery = document.getElementById('modalGallery');
        modalGallery.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var imgSrc = button.getAttribute('data-imgsrc');
            var title = button.getAttribute('data-title');
            var subtitle = button.getAttribute('data-subtitle');
            
            var modalImage = modalGallery.querySelector('#modalImage');
            var modalTitle = modalGallery.querySelector('#modalTitle');
            var modalSubtitle = modalGallery.querySelector('#modalSubtitle');
            
            modalImage.src = imgSrc;
            modalTitle.textContent = title;
            modalSubtitle.textContent = subtitle;
        });

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