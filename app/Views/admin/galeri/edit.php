<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400&family=Special+Elite&display=swap" rel="stylesheet">

<style>
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
    }

    .vintage-font-header {
        font-family: var(--font-heading);
        color: var(--vintage-dark);
        letter-spacing: 1px;
    }

    .vintage-font-body {
        font-family: var(--font-body);
        color: var(--vintage-text);
    }

    .card-vintage {
        background-color: #fffaf0;
        border: 2px dashed var(--vintage-dark);
        border-radius: 5px;
        box-shadow: 5px 5px 15px rgba(0,0,0,0.1);
    }

    .form-control {
        background-color: #fff;
        border: 1px solid var(--vintage-dark);
        border-radius: 0;
        font-family: var(--font-body);
        color: var(--vintage-dark);
    }

    .form-control:focus {
        background-color: #fff;
        border-color: var(--vintage-accent);
        box-shadow: 0 0 0 0.25rem rgba(197, 160, 89, 0.25);
    }

    .form-label {
        font-family: var(--font-heading);
        font-weight: bold;
        color: var(--vintage-dark);
    }

    .img-preview-vintage {
        border: 5px solid #fff;
        box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
        filter: sepia(30%);
        transition: all 0.3s ease;
    }

    .img-preview-vintage:hover {
        filter: sepia(0%);
        transform: scale(1.05) rotate(-2deg);
    }

    .btn-vintage {
        border-radius: 0;
        font-family: var(--font-body);
        font-weight: bold;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 2px solid var(--vintage-dark);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    /* Tombol Kembali */
    .btn-vintage-back {
        background-color: transparent;
        color: var(--vintage-dark);
    }

    .btn-vintage-back:hover {
        background-color: var(--vintage-dark);
        color: var(--vintage-accent);
        transform: translateX(-3px);
    }

    /* Tombol Update */
    .btn-vintage-save {
        background-color: var(--vintage-dark);
        color: var(--vintage-accent);
    }

    .btn-vintage-save:hover {
        background-color: var(--vintage-accent);
        color: var(--vintage-dark);
        transform: translateY(-3px);
        box-shadow: 3px 3px 0px var(--vintage-dark);
    }
</style>


<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="vintage-font-header">
        <i class="bi bi-pencil-square me-2"></i>Oebah Poto Galerij
    </h3>
    <a href="<?= base_url('admin/galeri'); ?>" class="btn btn-vintage btn-vintage-back shadow-sm px-4 py-2">
        <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>
</div>


<div class="card card-vintage shadow-sm">
    <div class="card-body p-4">
        <form action="<?= base_url('admin/galeri/update/' . $galeri['id']); ?>" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="oldGambar" value="<?= $galeri['gambar']; ?>">

            <div class="mb-4">
                <label class="form-label">Djoedoel Poto</label>
                <input type="text" name="judul" class="form-control" value="<?= $galeri['judul']; ?>" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Soebdjoedoel / Keterangan</label>
                <input type="text" name="subjudul" class="form-control" value="<?= $galeri['subjudul']; ?>">
            </div>

            <div class="mb-4">
                <label class="form-label">Berkas Gambar</label>
                <div class="row align-items-center p-3 border border-dark border-opacity-25 bg-white mx-0">
                    <div class="col-sm-3 text-center mb-3 mb-sm-0">
                        <img src="<?= base_url('img/galeri/' . $galeri['gambar']); ?>" class="img-fluid img-preview-vintage" alt="Preview Gambar">
                        <small class="text-muted d-block text-center mt-2 vintage-font-body" style="font-size: 0.75rem;">Poto Saat Ini</small>
                    </div>
                    <div class="col-sm-9">
                        <input type="file" name="gambar" class="form-control mb-2">
                        <div class="vintage-font-body text-muted small fst-italic">
                            <i class="bi bi-info-circle"></i> Biarkan kosong djika tidak ingin mengganti gambar.
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-dark opacity-25 my-4">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-vintage btn-vintage-save px-5 py-2">
                    <i class="bi bi-check-circle-fill"></i> Simpan Peroebahan
                </button>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>