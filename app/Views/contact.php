<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    /* --- HERO SECTION --- */
    .hero-contact-bg {
        background-image: url('<?= base_url('img/Bg1.png'); ?>'); 
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        position: relative;
        border-bottom: 5px double var(--vintage-accent);
        padding: 160px 0;
        display: flex; align-items: center; justify-content: center;
    }

    .hero-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(rgba(38, 28, 21, 0.8), rgba(38, 28, 21, 0.6));
        z-index: 1;
    }

    /* --- CONTENT SECTION --- */
    .vintage-paper-bg {
        background-color: var(--vintage-paper);
        background-image: url('https://www.transparenttextures.com/patterns/aged-paper.png'); 
    }

    /* KARTU INFO & FORM */
    .card-vintage {
        background-color: #fffcf5;
        border: 2px solid var(--vintage-dark);
        padding: 30px;
        box-shadow: 10px 10px 0px rgba(0,0,0,0.15);
        height: 100%;
        position: relative;
    }
    
    .card-vintage::before {
        content: '';
        position: absolute; top: 5px; left: 5px; right: 5px; bottom: 5px;
        border: 1px dashed var(--vintage-accent);
        pointer-events: none;
    }

    /* FORM INPUT STYLES */
    .form-control {
        background-color: rgba(255, 255, 255, 0.5);
        border: 1px solid var(--vintage-text);
        border-radius: 0;
        font-family: var(--font-body);
        color: var(--vintage-dark);
        padding: 12px;
    }
    .form-control:focus {
        background-color: #fff;
        border-color: var(--vintage-accent);
        box-shadow: none;
    }

    /* TOMBOL KIRIM */
    .btn-vintage-solid {
        background-color: var(--vintage-dark);
        color: var(--vintage-accent);
        border: 1px solid var(--vintage-dark);
        text-transform: uppercase;
        font-family: var(--font-heading);
        letter-spacing: 2px;
        transition: 0.3s;
    }
    .btn-vintage-solid:hover {
        background-color: var(--vintage-accent);
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
    #btn-back-to-top:hover { background-color: var(--vintage-dark); color: var(--vintage-accent); }

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

    .swal2-popup-vintage {
        border: 3px solid var(--vintage-dark) !important;
        border-radius: 0 !important;
        background-color: var(--vintage-paper) !important;
        font-family: var(--font-body) !important;
    }
    .swal2-title-vintage {
        font-family: var(--font-heading) !important;
        color: var(--vintage-dark) !important;
    }

    @media (max-width: 768px) {
        #btn-back-to-top { bottom: 85px; right: 20px; width: 45px; height: 45px; }
        #btn-help-wa { bottom: 20px; right: 20px; width: 45px; height: 45px; font-size: 1.5rem; }
    }
</style>


<button type="button" id="btn-back-to-top" title="Kembali ke Atas"><i class="bi bi-arrow-up"></i></button>
<a href="https://wa.me/62895638401279?text=Halo%20Admin%20Sukamaju%20House%2C%20saya%20ingin%20bertanya%20sesuatu." target="_blank" id="btn-help-wa" title="Butuh Bantuan?"><i class="bi bi-whatsapp"></i></a>


<header class="hero-contact-bg">
    <div class="hero-overlay"></div>
    <div class="container text-center position-relative" style="z-index: 2;">
        <div style="border: 2px solid var(--vintage-accent); padding: 20px 40px; display: inline-block; background: rgba(38, 28, 21, 0.6); backdrop-filter: blur(2px);">
            <h1 class="display-3 fw-bold text-white typewriter-font m-0" style="text-shadow: 3px 3px 0 #000;">
                HOEBOENGI KAMI
            </h1>
        </div>
        <p class="text-white-50 fs-5 mt-3 typewriter-text fst-italic">
            "Kami selaloe senang mendengar tjerita dari Toean atau Njonja."
        </p>
    </div>
</header>


<section class="section-padding py-5 vintage-paper-bg">
    <div class="container">
        <div class="row g-5">

            <div class="col-lg-5">
                <div class="card-vintage">
                    <h3 class="fs-2 mb-4 typewriter-font text-uppercase" style="color: var(--vintage-dark); border-bottom: 2px dashed var(--vintage-accent); display: inline-block;">Lokasi & Info</h3>

                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="bi bi-geo-alt-fill fs-3" style="color: var(--vintage-accent);"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="fw-bold typewriter-font">Alamat</h5>
                            <p class="text-muted typewriter-text">Jl. Aloen-Aloen Kalidjati, Kec.Kalidjati, Soebang, Djawa Barat 41271</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="bi bi-envelope-fill fs-3" style="color: var(--vintage-accent);"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="fw-bold typewriter-font">Email</h5>
                            <p class="text-muted typewriter-text">hello@sukamajuhouse.com</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="bi bi-whatsapp fs-3" style="color: var(--vintage-accent);"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="fw-bold typewriter-font">WhatsApp</h5>
                            <p class="text-muted mb-2 typewriter-text">+62 895-6384-01279</p>
                            
                            <?php 
                                $pesanReservasi = "📋 *FORMULIR RESERVASI & PRE-ORDER*\n";
                                $pesanReservasi .= "--------------------------------------------------\n";
                                $pesanReservasi .= "Halo Admin Sukamaju House, saya ingin melakukan reservasi tempat.\n\n";
                                
                                $pesanReservasi .= "👤 *DETAIL PELANGGAN*\n";
                                $pesanReservasi .= "• Nama: [Isi Nama]\n";
                                $pesanReservasi .= "• Tanggal: [Tgl-Bln-Thn]\n";
                                $pesanReservasi .= "• Waktu: [Jam] WIB\n";
                                $pesanReservasi .= "• Jumlah: [..] Orang\n\n";
                                
                                $pesanReservasi .= "🍴 *PESANAN MENU (PRE-ORDER)*\n";
                                $pesanReservasi .= "1. [Nama Menu] (..x) @Rp[Harga]\n";
                                $pesanReservasi .= "2. [Nama Menu] (..x) @Rp[Harga]\n";
                                $pesanReservasi .= "--------------------------------------------------\n";
                                $pesanReservasi .= "💰 *ESTIMASI TOTAL:* Rp[Total Harga]\n\n";
                                
                                $pesanReservasi .= "📝 *CATATAN TAMBAHAN:*\n";
                                $pesanReservasi .= "[Misal: Request meja outdoor / Tanpa gula]\n\n";
                                
                                $pesanReservasi .= "Mohon informasi ketersediaan tempatnya. Terima kasih! ✨";
                                
                                $linkReservasi = "https://wa.me/62895638401279?text=" . urlencode($pesanReservasi);
                            ?>
                            
                            <a href="<?= $linkReservasi; ?>" target="_blank" class="btn btn-sm btn-vintage-solid rounded-0 shadow-sm px-3 py-2 typewriter-text">
                                <i class="bi bi-calendar-check me-2"></i> Reservasi Sekarang
                            </a>
                        </div>
                    </div>

                    <div class="ratio ratio-4x3 mt-4 border border-2 border-dark shadow-sm" style="filter: sepia(30%);">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5052.3144706802195!2d107.67558104319153!3d-6.526017405641331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693d00428321db%3A0x7922cf1107178a1b!2sSukamaju%20House!5e0!3m2!1sid!2sid!4v1767100733796!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card-vintage">
                    <h3 class="fs-2 mb-4 typewriter-font text-uppercase" style="color: var(--vintage-dark); border-bottom: 2px dashed var(--vintage-accent); display: inline-block;">Kirim Pesan</h3>
                    <p class="text-muted mb-4 typewriter-text">Poenja saran, kritik, atau ingin mengadakan atjara di Sukamaju House? Isi formoelir di bawah ini.</p>

                    <form action="<?= base_url('/contact/send'); ?>" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label fw-bold typewriter-font">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bold typewriter-font">Alamat Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email@contoh.com" required>
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label fw-bold typewriter-font">Soebjek</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Misal: Reservasi Tempat">
                            </div>
                            <div class="col-12">
                                <label for="pesan" class="form-label fw-bold typewriter-font">Pesan Anda</label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Toelis pesan Anda di sini..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-lg w-100 btn-vintage-solid rounded-0 shadow">
                                    <i class="bi bi-send-fill me-2"></i> KIRIM PESAN
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- LOGIKA SWEETALERT UNTUK NOTIFIKASI SUKSES ---
        <?php if (session()->getFlashdata('sukses')) : ?>
            Swal.fire({
                title: 'BERHASIL!',
                text: '<?= session()->getFlashdata('sukses'); ?>',
                icon: 'success',
                confirmButtonText: 'TUTUP',
                confirmButtonColor: '#261C15',
                background: '#fdfbf7',
                customClass: {
                    popup: 'swal2-popup-vintage',
                    title: 'swal2-title-vintage'
                },
                buttonsStyling: true,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
        <?php endif; ?>

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
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });
</script>


<?= $this->endSection(); ?>