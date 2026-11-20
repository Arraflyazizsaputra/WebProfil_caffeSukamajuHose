<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400&family=Special+Elite&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    :root {
        --vintage-bg: #fdfbf7;
        --vintage-card: #fffcf5;
        --vintage-dark: #261C15;
        --vintage-gold: #8d6e63; 
        --vintage-text: #3e2723;
        --btn-primary-vintage: #4e342e;
        --font-heading: 'Special Elite', cursive;
        --font-body: 'Courier Prime', monospace;
    }

    body {
        background-color: var(--vintage-bg);
        font-family: var(--font-body);
        color: var(--vintage-text);
    }

    div:where(.swal2-container) div:where(.swal2-popup) {
        background: #f4f1ea url('https://www.transparenttextures.com/patterns/aged-paper.png');
        border: 3px double var(--vintage-dark);
        border-radius: 2px;
        font-family: var(--font-body) !important;
        box-shadow: 10px 10px 0px rgba(62, 39, 35, 0.4);
    }

    div:where(.swal2-container) h2:where(.swal2-title) {
        color: var(--vintage-dark) !important;
        font-family: var(--font-heading) !important;
        font-size: 1.8rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        border-bottom: 2px dashed var(--vintage-gold);
        padding-bottom: 10px;
    }

    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
        background-color: #8d6e63 !important;
        border-radius: 0 !important;
        border: 2px solid var(--vintage-dark) !important;
        box-shadow: 4px 4px 0px var(--vintage-dark) !important;
    }

    .card-polaroid {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 15px 15px 20px 15px;
        box-shadow: 5px 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .card-polaroid::before {
        content: "";
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 30px;
        background-color: rgba(215, 204, 200, 0.5);
        z-index: 3;
        box-shadow: 2px 2px 5px rgba(0,0,0,0.05);
    }

    .card-polaroid:hover {
        transform: rotate(-1deg) translateY(-5px);
        box-shadow: 10px 10px 20px rgba(62, 39, 35, 0.2);
    }

    .polaroid-img-wrapper {
        height: 220px;
        overflow: hidden;
        border: 1px solid #eee;
        margin-bottom: 15px;
        background-color: #f0f0f0;
    }

    .polaroid-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: sepia(30%) contrast(1.1);
    }

    .gallery-description {
        font-family: var(--font-body);
        color: #5d4037;
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 20px;
        min-height: 4.5em; 
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-polaroid:hover .gallery-description {
        overflow: visible;
        display: block;
    }

    .page-header h3 {
        font-family: var(--font-heading);
        border-bottom: 2px dashed var(--vintage-dark);
    }

    /* --- UPDATED: BUTTON TAMBAH (Interaktif & Responsif) --- */
    .btn-vintage-add {
        background-color: var(--btn-primary-vintage);
        color: #fdfbf7;
        font-family: var(--font-heading);
        border: 2px solid var(--vintage-dark);
        padding: 10px 20px;
        text-decoration: none;
        box-shadow: 3px 3px 0px var(--vintage-dark);
        /* Tambahan Transisi & Layout */
        transition: all 0.15s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    /* Efek Hover (Melayang Sedikit) */
    .btn-vintage-add:hover {
        background-color: #5d4037;
        transform: translate(-2px, -2px);
        box-shadow: 5px 5px 0px var(--vintage-dark);
        color: #fff;
    }

    /* Efek Klik (Tombol Tertekan) */
    .btn-vintage-add:active {
        transform: translate(3px, 3px);
        box-shadow: 0px 0px 0px var(--vintage-dark);
    }

    .btn-action-sm {
        border: 1px solid var(--vintage-dark);
        font-family: var(--font-body);
        font-weight: bold;
        padding: 5px 10px;
    }

    .btn-edit-vintage:hover { background: var(--vintage-dark); color: #fff; }
    .btn-delete-vintage { color: #b71c1c; border-color: #b71c1c; }
    .btn-delete-vintage:hover { background: #b71c1c; color: #fff; }

    /* --- UPDATED: MEDIA QUERY (RESPONSIF) --- */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: stretch !important;
            gap: 15px;
            text-align: center;
        }

        .page-header div {
            margin-bottom: 10px;
        }

        .btn-vintage-add {
            width: 100%; /* Full width di HP */
            padding: 12px 0;
            font-size: 1.1rem;
        }
    }
</style>


<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-5 page-header">
        <div>
            <h3 class="fw-bold mb-0">
                <i class="bi bi-images me-2"></i> Kelola Galeri
            </h3>
            <p class="text-muted small mt-2">Atoer foto-foto soeasana café disini.</p>
        </div>
        
        <a href="<?= base_url('admin/galeri/create'); ?>" class="btn-vintage-add">
            <i class="bi bi-plus-lg"></i> Tambah Foto Baroe
        </a>
    </div>

    <div class="row g-4">
        <?php if (empty($galeri)) : ?>
            <div class="col-12">
                <div class="alert text-center py-5" style="background-color: var(--vintage-card); border: 2px dashed var(--vintage-dark);">
                    <i class="bi bi-camera-reels fs-1 mb-3 d-block" style="color: var(--vintage-gold);"></i>
                    <h5>Beloem ada foto soeasana jang dioenggah.</h5>
                </div>
            </div>
        <?php else : ?>
            <?php foreach ($galeri as $g) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card-polaroid">
                        <div class="polaroid-img-wrapper">
                            <img src="<?= base_url('img/galeri/' . $g['gambar']); ?>" alt="<?= $g['judul']; ?>">
                        </div>
                        
                        <div class="flex-grow-1 d-flex flex-column">
                            <h5 class="fw-bold mb-1" style="font-family: var(--font-heading); font-size: 1.1rem;">
                                <?= $g['judul']; ?>
                            </h5>
                            <div class="gallery-description">
                                <?= $g['subjudul'] ? $g['subjudul'] : '<i class="text-muted">Tidak ada tjatatan.</i>'; ?>
                            </div>

                            <div class="mt-auto d-flex gap-2">
                                <a href="javascript:void(0);" 
                                   data-href="<?= base_url('admin/galeri/edit/' . $g['id']); ?>" 
                                   class="btn btn-action-sm btn-edit-vintage flex-fill btn-edit-confirm">
                                   <i class="bi bi-pencil-square"></i> Soenting
                                </a>
                                
                                <a href="javascript:void(0);" 
                                   data-href="<?= base_url('admin/galeri/delete/' . $g['id']); ?>" 
                                   class="btn btn-action-sm btn-delete-vintage flex-fill btn-delete-confirm">
                                   <i class="bi bi-trash"></i> Hapoes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- 1. KONFIRMASI HAPOES ---
        const deleteButtons = document.querySelectorAll('.btn-delete-confirm');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('data-href');

                Swal.fire({
                    title: 'Peringatan!',
                    text: "Apakah Toean jakin ingin menghapoes foto ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ja, Hapoes!',
                    cancelButtonText: 'Batalkan',
                    reverseButtons: true,
                    backdrop: `rgba(43, 29, 22, 0.6)`
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });

        // --- 2. KONFIRMASI EDIT ---
        const editButtons = document.querySelectorAll('.btn-edit-confirm');
        editButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('data-href');

                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Toean hendak mengubah data foto ini?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ja, Soenting!',
                    cancelButtonText: 'Kembali',
                    reverseButtons: true,
                    backdrop: `rgba(43, 29, 22, 0.6)`
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });

        // --- 3. NOTIFIKASI BERHASIL ---
        <?php if (session()->getFlashdata('pesan')) : ?>
            Swal.fire({
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('pesan'); ?>',
                icon: 'success',
                confirmButtonText: 'Selesai',
                backdrop: `rgba(43, 29, 22, 0.6)`
            });
        <?php endif; ?>
    });
</script>

<?= $this->endSection(); ?>