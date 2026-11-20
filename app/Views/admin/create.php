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
        background-color: var(--vintage-cream);
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

    .form-control, .form-select {
        background-color: #fff;
        border: 1px solid var(--vintage-dark);
        border-radius: 0;
        font-family: var(--font-body);
        color: var(--vintage-dark);
    }

    .form-control:focus, .form-select:focus {
        background-color: #fff;
        border-color: var(--vintage-accent);
        box-shadow: 0 0 0 0.25rem rgba(197, 160, 89, 0.25);
    }

    .form-label {
        font-family: var(--font-heading);
        font-weight: bold;
        color: var(--vintage-dark);
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
        text-decoration: none;
    }

    .btn-vintage-back:hover {
        background-color: var(--vintage-dark);
        color: var(--vintage-accent);
        transform: translateX(-3px);
    }

    /* Tombol Simpan */
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

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="vintage-font-header">
            <i class="bi bi-plus-square-dotted me-2"></i>Tambah Menoe Baroe
        </h3>
        
        <a href="<?= base_url('admin'); ?>" class="btn btn-vintage btn-vintage-back shadow-sm px-4 py-2">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>

    <div class="card card-vintage shadow-sm">
        <div class="card-body p-4">
            <form action="<?= base_url('admin/store'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Nama Kopi / Sadjian</label>
                        <input type="text" name="nama_menu" class="form-control" placeholder="Masoekkan nama sadjian..." required autofocus>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Kategori Sadjian</label>
                        <select name="kategori" class="form-select" required>
                            <option value="" selected disabled>-- Pilih Kategori --</option>
                            <option value="custombeer">Custombeer (Kopi & Non-Kopi)</option>
                            <option value="soekamakan">Soekamakan (Makanan Ringan)</option>
                            <option value="roeparasa">Roepa Rasa (Makanan Berat)</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Harga (Roepiah)</label>
                    <div class="input-group">
                        <span class="input-group-text rounded-0 border-dark bg-light" style="font-family: var(--font-body);">Rp.</span>
                        <input type="number" name="harga" class="form-control" placeholder="Contoh: 15000" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi Singkat</label>
                    <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tjeritakan sedikit tentang keistimewaan sadjian ini..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Gambar Menoe</label>
                    <input type="file" name="gambar" class="form-control">
                    <div class="mt-2">
                        <small class="text-muted vintage-font-body" style="font-size: 0.8rem;">
                            <i class="bi bi-info-circle"></i> Format: jpg, jpeg, png. Maksimal 2MB.
                        </small>
                    </div>
                </div>

                <hr class="border-dark opacity-25 my-4">

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-outline-secondary rounded-0 px-4 py-2 vintage-font-body">
                        Reset Form
                    </button>
                    <button type="submit" class="btn btn-vintage btn-vintage-save px-5 py-2">
                        <i class="bi bi-save2-fill"></i> Simpan Data
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>