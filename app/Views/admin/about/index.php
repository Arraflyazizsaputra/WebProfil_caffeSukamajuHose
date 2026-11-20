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

    div:where(.swal2-container) div:where(.swal2-html-container) {
        color: #5d4037 !important;
        font-size: 1.1rem;
    }

    div:where(.swal2-icon).swal2-success {
        border-color: var(--vintage-gold) !important;
        color: var(--vintage-gold) !important;
    }
    div:where(.swal2-icon).swal2-success [class^=swal2-success-line] {
        background-color: var(--vintage-gold) !important;
    }
    div:where(.swal2-icon).swal2-success .swal2-success-ring {
        border: .25em solid rgba(141, 110, 99, 0.2) !important;
    }
    div:where(.swal2-icon).swal2-warning {
        border-color: #b71c1c !important;
        color: #b71c1c !important;
    }

    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
        background-color: var(--btn-primary-vintage) !important;
        color: #fff !important;
        border-radius: 0 !important;
        border: 2px solid var(--vintage-dark) !important;
        box-shadow: 4px 4px 0px var(--vintage-dark) !important;
        font-family: var(--font-body); 
        text-transform: uppercase;
        font-weight: bold;
        transition: 0.3s;
    }

    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm:hover {
        background-color: var(--vintage-dark) !important;
        transform: translate(-2px, -2px);
    }

    /* Tombol Batal */
    div:where(.swal2-container) button:where(.swal2-styled).swal2-cancel {
        background-color: transparent !important;
        color: var(--vintage-dark) !important;
        border-radius: 0 !important;
        border: 2px solid var(--vintage-dark) !important;
        box-shadow: none !important;
        font-family: var(--font-body);
        text-transform: uppercase;
        font-weight: bold;
    }

    .page-header h3 {
        font-weight: 400;
        color: var(--vintage-dark);
        border-bottom: 2px dashed var(--vintage-dark);
        display: inline-block;
        padding-bottom: 5px;
        letter-spacing: 1px;
        font-family: var(--font-heading);
    }

    .card-vintage {
        background-color: var(--vintage-card);
        border: 1px solid var(--vintage-dark);
        box-shadow: 4px 4px 0px rgba(62, 39, 35, 0.15);
        border-radius: 2px;
    }

    .form-label {
        font-family: var(--font-heading);
        letter-spacing: 1px;
    }

    .form-control-vintage {
        background-color: #fff;
        border: 1px solid var(--vintage-dark);
        border-radius: 0;
        color: var(--vintage-text);
        font-family: var(--font-body); 
    }

    .form-control-vintage:focus {
        background-color: #fdfbf7;
        border-color: var(--vintage-gold);
        box-shadow: none;
        color: var(--vintage-dark);
    }

    .btn-vintage-save {
        background-color: var(--btn-primary-vintage);
        color: #fdfbf7;
        border: 2px solid var(--vintage-dark);
        border-radius: 4px;
        padding: 10px 30px;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 1px;
        transition: all 0.3s;
        box-shadow: 3px 3px 0px var(--vintage-dark);
        font-family: var(--font-body);
    }

    .btn-vintage-save:hover {
        background-color: var(--vintage-dark);
        color: #fff;
        transform: translate(-2px, -2px);
        box-shadow: 5px 5px 0px rgba(62, 39, 35, 0.4);
    }

    .btn-vintage-delete {
        background-color: transparent;
        color: #b71c1c;
        border: 2px solid #b71c1c;
        border-radius: 4px;
        padding: 10px 20px;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 1px;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
        font-family: var(--font-body);
    }

    .btn-vintage-delete:hover {
        background-color: #b71c1c;
        color: #fff;
        box-shadow: 3px 3px 0px rgba(183, 28, 28, 0.3);
    }

    .img-frame {
        border: 2px dashed var(--vintage-dark);
        padding: 5px;
        background: #fff;
    }
</style>


<div class="container-fluid mt-4">
    <div class="mb-4 pb-3 page-header">
        <div>
            <h3 class="fw-bold mb-0">
                <i class="bi bi-info-circle me-2"></i> Tentang Kami
            </h3>
            <p class="text-muted small mt-2 mb-0" style="font-family: var(--font-body);">
                Soenting profil, riwajat, dan filosofi café disini.
            </p>
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success border-dark rounded-0 mb-4 d-none" role="alert" id="flash-data-raw">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="card card-vintage border-0">
        <div class="card-body p-4">
            <form action="<?= base_url('admin/about/update'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $about['id']; ?>">
                <input type="hidden" name="oldGambar" value="<?= $about['gambar']; ?>">

                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <label class="form-label fw-bold text-uppercase">Djoedoel Halaman</label>
                            <input type="text" name="judul" class="form-control form-control-vintage form-control-lg" value="<?= $about['judul']; ?>" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-uppercase">Riwajat / Deskripsi Lengkap</label>
                            <textarea name="deskripsi" class="form-control form-control-vintage" rows="12" style="resize: none; line-height: 1.6;"><?= $about['deskripsi']; ?></textarea>
                            <div class="form-text text-muted fst-italic mt-2" style="font-family: var(--font-body);">
                                * Tjeritakan sedjarah, visi misi, atau filosofi café Anda disini.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card bg-transparent border-0">
                            <div class="card-body text-center p-0">
                                <label class="form-label fw-bold text-uppercase mb-3">Visueel Profil</label>
                                <div class="img-frame overflow-hidden mb-3 shadow-sm" style="height: 250px;">
                                    <img src="<?= base_url('img/' . $about['gambar']); ?>" class="img-fluid w-100 h-100" style="object-fit: cover;" id="img-preview">
                                </div>
                                <input type="file" name="gambar" class="form-control form-control-vintage form-control-sm mb-2" onchange="previewImg()">
                                <small class="text-muted fst-italic" style="font-family: var(--font-body);">Biarkan kosong djika tidak ingin mengganti portret.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4" style="border-top: 2px dashed var(--vintage-dark); opacity: 0.5;">

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0);" 
                       data-href="<?= base_url('admin/about/delete/' . $about['id']); ?>" 
                       class="btn btn-vintage-delete btn-delete-about"
                       title="Hapoes Data Profil">
                       <i class="bi bi-trash me-2"></i> Hapoes Data
                    </a>

                    <button type="submit" class="btn btn-vintage-save">
                        <i class="bi bi-save me-2"></i> Simpan Peroebahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function previewImg() {
        const foto = document.querySelector('input[name="gambar"]');
        const imgPreview = document.querySelector('#img-preview');

        if (foto.files && foto.files[0]) {
            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);
            
            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // 1. Notifikasi Sukses 
        <?php if (session()->getFlashdata('pesan')) : ?>
            Swal.fire({
                title: 'BERHASIL!',
                text: '<?= session()->getFlashdata('pesan'); ?>',
                icon: 'success',
                confirmButtonText: 'BAIKLAH',
                backdrop: `rgba(43, 29, 22, 0.6)`
            });
        <?php endif; ?>

        // 2. Konfirmasi Hapus
        const deleteButton = document.querySelector('.btn-delete-about');
        if (deleteButton) {
            deleteButton.addEventListener('click', function(e) {
                e.preventDefault();
                const deleteUrl = this.getAttribute('data-href');

                Swal.fire({
                    title: 'Peringatan Keras!',
                    text: "Apakah Toean jakin ingin menghapoes seluruh profil ini? Halaman 'Tentang Kami' akan kosong.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ja, Hapoes!',
                    cancelButtonText: 'Batalkan',
                    reverseButtons: true,
                    backdrop: `rgba(43, 29, 22, 0.6)`
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl;
                    }
                });
            });
        }
    });
</script>

<?= $this->endSection(); ?>