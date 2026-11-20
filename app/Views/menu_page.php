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
        --font-heading: 'Special Elite', cursive;
        --font-body: 'Courier Prime', monospace;   
    }

    body {
        font-family: var(--font-body);
        color: var(--vintage-text);
        background-color: var(--vintage-cream);
    }

    .typewriter-font { font-family: var(--font-heading) !important; }
    .typewriter-text { font-family: var(--font-body) !important; letter-spacing: 0px; }

    /* --- HERO SECTION --- */
    .hero-menu-bg {
        background-image: url('<?= base_url('img/Bg6.jpeg'); ?>'); 
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        position: relative;
        border-bottom: 5px double var(--vintage-accent);
        padding: 140px 0; 
        display: flex; align-items: center; justify-content: center;
    }

    .hero-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(rgba(38, 28, 21, 0.9), rgba(38, 28, 21, 0.7));
    }

    /* --- FILTER CATEGORY NAVIGATION --- */
    .category-filter-nav {
        margin-top: -35px;
        position: relative;
        z-index: 10;
    }

    .filter-box {
        background-color: var(--vintage-cream);
        border: 2px solid var(--vintage-dark);
        display: inline-flex;
        padding: 5px;
        box-shadow: 6px 6px 0px var(--vintage-dark);
    }

    .filter-item {
        color: var(--vintage-dark);
        text-decoration: none;
        padding: 8px 20px;
        font-family: var(--font-heading);
        font-size: 0.9rem;
        text-transform: uppercase;
        transition: 0.3s;
        border: 1px solid transparent;
    }

    .filter-item:hover {
        background-color: rgba(197, 160, 89, 0.2);
    }

    .filter-item.active {
        background-color: var(--vintage-dark);
        color: var(--vintage-accent);
    }

    /* --- MENU SECTION --- */
    .menu-section-bg {
        background-color: #f4f1ea;
        background-image: url('https://www.transparenttextures.com/patterns/aged-paper.png'); 
    }

    .card-vintage-menu {
        background-color: #fffcf5;
        border: 1px solid var(--vintage-dark);
        box-shadow: 5px 5px 0px rgba(62, 39, 35, 0.1);
        transition: all 0.3s ease;
        position: relative;
        /* cursor: pointer;  <-- DIHAPUS agar gambar tidak terlihat seperti tombol */
    }

    .card-vintage-menu:hover {
        transform: translateY(-5px) rotate(1deg);
        box-shadow: 8px 8px 0px rgba(197, 160, 89, 0.4);
    }

    .vintage-img-filter {
        filter: sepia(40%) contrast(110%);
        transition: 0.5s;
        border-bottom: 2px dashed var(--vintage-dark);
    }

    .card-vintage-menu:hover .vintage-img-filter {
        filter: sepia(0%) contrast(100%);
    }

    .price-ribbon {
        position: absolute;
        top: 15px; right: -10px;
        background: var(--vintage-dark);
        color: var(--vintage-accent);
        padding: 5px 15px;
        font-family: var(--font-heading);
        font-weight: bold;
        box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
        z-index: 5;
    }

    .btn-detail-sm {
        font-size: 0.8rem;
        padding: 5px 12px;
        border: 1px solid var(--vintage-text);
        color: var(--vintage-text);
        background: transparent;
        transition: 0.3s;
        text-transform: uppercase;
        cursor: pointer;
    }
    
    .btn-detail-sm:hover {
        background: var(--vintage-text);
        color: #fff;
    }

    /* --- FLOATING BUTTONS --- */
    #btn-back-to-top {
        position: fixed; bottom: 90px; right: 30px;
        z-index: 999; width: 50px; height: 50px;
        border-radius: 50%; background: var(--vintage-accent);
        color: var(--vintage-dark); border: none;
        display: flex; align-items: center; justify-content: center;
        opacity: 0; transition: 0.5s;
        visibility: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }
    #btn-back-to-top.show { opacity: 1; visibility: visible; }
    #btn-back-to-top:hover { background-color: var(--vintage-cream); color: var(--vintage-dark); }

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
        .filter-box { flex-direction: column; width: 90%; }
        .filter-item { text-align: center; border-bottom: 1px dashed #ccc; }
        .filter-item:last-child { border-bottom: none; }
        .filter-item:active { border: none; }
        #btn-back-to-top { bottom: 85px; right: 20px; width: 45px; height: 45px; }
        #btn-help-wa { bottom: 20px; right: 20px; width: 45px; height: 45px; font-size: 1.5rem; }
    }
</style>


<button type="button" id="btn-back-to-top" title="Ke Atas"><i class="bi bi-arrow-up"></i></button>
<a href="https://wa.me/62895638401279?text=Halo%20Admin%20Sukamaju%20House%2C%20saya%20sedang%20melihat%20Menu%20dan%20butuh%20bantuan." target="_blank" id="btn-help-wa" title="Butuh Bantuan?"><i class="bi bi-whatsapp"></i></a>


<section class="position-relative hero-menu-bg">
    <div class="hero-overlay"></div>
    <div class="container text-center position-relative" style="z-index: 2;">
        <div style="border: 2px solid var(--vintage-accent); padding: 20px; display: inline-block;">
            <h1 class="display-4 text-white fw-bold typewriter-font m-0" style="text-shadow: 3px 3px 0 #000;">
                <?= (!$kategori_aktif) ? 'DAFTAR SADJIAN' : 'MENU ' . strtoupper($kategori_aktif); ?>
            </h1>
        </div>
        <p class="text-white-50 lead typewriter-text fst-italic mt-3">
            "Racikan istimewa dari masa lalu, oentoek dinikmati hari ini."
        </p>
    </div>
</section>


<div class="container text-center category-filter-nav">
    <div class="filter-box shadow">
        <a href="<?= base_url('menu'); ?>" class="filter-item <?= (!$kategori_aktif) ? 'active' : ''; ?>">Semoea</a>
        <a href="<?= base_url('menu/custombeer'); ?>" class="filter-item <?= ($kategori_aktif == 'custombeer') ? 'active' : ''; ?>">Custombeer</a>
        <a href="<?= base_url('menu/soekamakan'); ?>" class="filter-item <?= ($kategori_aktif == 'soekamakan') ? 'active' : ''; ?>">Soekamakan</a>
        <a href="<?= base_url('menu/roeparasa'); ?>" class="filter-item <?= ($kategori_aktif == 'roeparasa') ? 'active' : ''; ?>">Roepa Rasa</a>
    </div>
</div>


<section class="py-5 menu-section-bg">
    <div class="container mt-4">
        
        <div class="row g-4 justify-content-center">
            <?php if (empty($menus)) : ?>
                <div class="col-12 text-center py-5">
                    <div class="p-5" style="border: 2px dashed var(--vintage-dark); background: rgba(255,255,255,0.5);">
                        <h3 class="typewriter-font">Maaf, Sadjian Habis.</h3>
                        <p class="typewriter-text text-muted">Beloem ada menoe oentoek kategori ini, Tuan & Njonja.</p>
                        <a href="<?= base_url('menu'); ?>" class="btn btn-outline-dark rounded-0 mt-3">Kembali ke Semua Menu</a>
                    </div>
                </div>
            <?php else : ?>
                <?php foreach ($menus as $m) : ?>
                    <?php 
                        $modalID = 'menuModal' . $m['id'];
                        // PERUBAHAN DI SINI: mengganti 'nama_kopi' menjadi 'nama_menu'
                        $namaMenu = $m['nama_menu']; 
                        $harga = number_format($m['harga'], 0, ',', '.');
                        $gambar = base_url('img/' . $m['gambar']);
                        $kategori = ucfirst($m['kategori']);
                    ?>

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card card-vintage-menu h-100 rounded-0">
                            <div class="card-img-wrapper position-relative" style="height: 240px; overflow: hidden;">
                                <img src="<?= $gambar; ?>" class="w-100 h-100 vintage-img-filter" style="object-fit: cover;" alt="<?= $namaMenu; ?>" onerror="this.src='https://via.placeholder.com/400x300?text=Sukamaju';">
                                <div class="price-ribbon">Rp <?= $harga; ?></div>
                            </div>
                            <div class="card-body text-center p-4 d-flex flex-column align-items-center">
                                <small class="text-muted text-uppercase mb-1" style="letter-spacing: 2px; font-size: 0.7rem; font-weight: bold;">
                                    <?= $m['kategori']; ?>
                                </small>
                                <h5 class="card-title fw-bold typewriter-font text-uppercase mb-3" style="color: var(--vintage-dark);">
                                    <?= $namaMenu; ?>
                                </h5>
                                <button class="btn btn-detail-sm typewriter-text mt-auto" data-bs-toggle="modal" data-bs-target="#<?= $modalID; ?>">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade modal-vintage" id="<?= $modalID; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content shadow-lg" style="background-color: #fffcf5; border: 3px double var(--vintage-dark); border-radius: 0;">
                                <div class="modal-header border-bottom border-dashed border-dark">
                                    <h5 class="modal-title typewriter-font fw-bold">DETAIL SADJIAN</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center p-4">
                                    <img src="<?= $gambar; ?>" class="img-fluid mb-3 border border-dark p-1" style="max-height: 250px;">
                                    <h3 class="typewriter-font text-uppercase"><?= $namaMenu; ?></h3>
                                    <span class="badge border border-dark text-dark mb-3"><?= strtoupper($m['kategori']); ?></span>
                                    <h4 class="fw-bold text-success">Rp <?= $harga; ?></h4>
                                    <hr class="border-dark opacity-25">
                                    <p class="typewriter-text text-muted" style="text-align: justify;"><?= $m['deskripsi']; ?></p>
                                </div>
                                <div class="modal-footer border-top border-dashed border-dark justify-content-center gap-2">
                                    <button type="button" class="btn btn-outline-dark rounded-0 px-4 typewriter-text" data-bs-dismiss="modal">
                                        TUTUP
                                    </button>
                                    <button onclick="kirimWA('<?= $namaMenu; ?>', '<?= $kategori; ?>', '<?= $harga; ?>')" class="btn btn-dark rounded-0 px-4 typewriter-text">
                                        <i class="bi bi-whatsapp me-2"></i>PESAN SEKARANG
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<script>
    function kirimWA(nama, kategori, harga) {
        const sekarang = new Date();
        const tgl = String(sekarang.getDate()).padStart(2, '0') + '-' + 
                    String(sekarang.getMonth() + 1).padStart(2, '0') + '-' + 
                    sekarang.getFullYear();
        const jam = String(sekarang.getHours()).padStart(2, '0') + ':' + 
                    String(sekarang.getMinutes()).padStart(2, '0');
        const waktuPesan = tgl + ' ' + jam;

        let pesan = `📋 *FORMULIR PEMESANAN - SUKAMAJU HOUSE*\n`;
        pesan += `--------------------------------------------------\n\n`;
        pesan += `Halo Admin, saya ingin memesan menu berikut:\n\n`;
        pesan += `🍴 *Menu :* ${nama}\n`;
        pesan += `📂 *Kategori :* ${kategori}\n`;
        pesan += `💰 *Harga :* Rp ${harga}\n`;
        pesan += `🔢 *Jumlah :* (Isi Jumlah Pesanan)\n\n`;
        pesan += `👤 *Data Pemesan:*\n`;
        pesan += `• Nama : \n`;
        pesan += `• No. Meja/Alamat : \n`;
        pesan += `• Catatan : (Contoh: Tanpa gula / Pedas)\n\n`;
        pesan += `--------------------------------------------------\n`;
        pesan += `Waktu Pesan: ${waktuPesan} WIB\n`;
        pesan += `Terima kasih, mohon segera diproses ya! ✨`;

        const linkWA = `https://wa.me/62895638401279?text=${encodeURIComponent(pesan)}`;
        window.open(linkWA, '_blank');
    }

    document.addEventListener("DOMContentLoaded", function() {
        const btn = document.getElementById("btn-back-to-top");
        window.addEventListener('scroll', function () {
            if (window.scrollY > 300) { btn.classList.add('show'); } 
            else { btn.classList.remove('show'); }
        });
        btn.addEventListener("click", function() { window.scrollTo({top: 0, behavior: 'smooth'}); });
    });
</script>

<?= $this->endSection(); ?>