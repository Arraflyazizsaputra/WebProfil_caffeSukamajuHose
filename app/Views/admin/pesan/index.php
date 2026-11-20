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
        --font-heading: 'Special Elite', cursive;
        --font-body: 'Courier Prime', monospace;
    }

    body {
        background-color: var(--vintage-bg);
        font-family: var(--font-body);
        color: var(--vintage-text);
    }

    /* --- PERBAIKAN RESPONSIVITAS TABEL --- */
    .table-fixed-layout {
        table-layout: fixed; /* Kunci: Memaksa tabel mengikuti lebar persen yang ditentukan */
        width: 100%;
    }

    /* Kecilkan font khusus di tabel agar muat di zoom 100% karena font Courier itu lebar */
    .table-responsive {
        font-size: 0.9rem; 
        overflow-x: auto;
    }

    .text-truncate-multiline {
        /* Teknik agar teks panjang dipotong rapi dengan ... */
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Maksimal 2 baris */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }
    
    /* Agar kolom tanggal dan aksi tidak hancur saat layar mengecil */
    .col-fit {
        white-space: nowrap;
        width: 1%; /* Trik CSS agar kolom menyusut sesuai konten */
    }

    /* --- STYLING VINTAGE BAWAAN --- */
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

    /* Tombol Konfirmasi */
    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
        background-color: #b71c1c !important;
        color: #fff !important;
        border-radius: 0 !important;
        border: 2px solid var(--vintage-dark) !important;
        box-shadow: 4px 4px 0px var(--vintage-dark) !important;
        font-family: var(--font-body);
        text-transform: uppercase;
        font-weight: bold;
        transition: 0.3s;
    }

    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm.swal-btn-ok {
        background-color: var(--vintage-dark) !important;
    }

    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm:hover {
        background-color: #d32f2f !important;
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

    div:where(.swal2-container) button:where(.swal2-styled).swal2-cancel:hover {
        background-color: #d7ccc8 !important;
    }

    div:where(.swal2-icon).swal2-warning {
        border-color: #8d6e63 !important;
        color: #8d6e63 !important;
    }

    .page-header h3 {
        font-weight: 400;
        color: var(--vintage-dark);
        font-family: var(--font-heading);
        border-bottom: 2px dashed var(--vintage-dark);
        display: inline-block;
        padding-bottom: 5px;
        letter-spacing: 1px;
    }

    .card-vintage {
        background-color: var(--vintage-card);
        border: 1px solid var(--vintage-dark);
        box-shadow: 4px 4px 0px rgba(62, 39, 35, 0.15);
        border-radius: 2px;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(141, 110, 99, 0.1);
        color: var(--vintage-dark);
    }

    .table-hover thead {
        background-color: #d7ccc8 !important;
        border-bottom: 2px solid var(--vintage-dark);
        font-family: var(--font-heading);
    }
    
    .btn-link-vintage {
        color: var(--vintage-gold);
        font-weight: bold;
        text-decoration: underline;
        font-family: var(--font-body);
    }

    .btn-link-vintage:hover {
        color: var(--vintage-dark);
    }

    .btn-outline-danger {
        border-color: #b71c1c;
        color: #b71c1c;
        border-radius: 0;
        font-family: var(--font-body);
    }

    .btn-outline-danger:hover {
        background-color: #b71c1c;
        color: #fff;
    }
</style>

<div class="mb-4 pb-3 page-header">
    <div>
        <h3 class="fw-bold mb-0" style="color: var(--vintage-dark);">
            <i class="bi bi-envelope-paper me-2"></i> Kotak Masoek
        </h3>
        <p class="text-muted small mb-0 mt-2" style="font-family: var(--font-body);">
            Daftar kritiek, saran, dan pertanjaan pengoendjoeng.
        </p>
    </div>
</div>

<div class="card card-vintage border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 table-fixed-layout" style="font-family: var(--font-body);">
                <thead class="bg-light">
                    <tr>
                        <th class="p-3 text-uppercase" style="width: 150px;">Tanggal</th>
                        <th class="p-3 text-uppercase" style="width: 25%;">Pengirim</th>
                        <th class="p-3 text-uppercase">Pesan</th>
                        <th class="p-3 text-end text-uppercase" style="width: 80px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($pesan)) : ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">Beloem ada pesan masoek.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach($pesan as $p) : ?>
                        <tr>
                            <td class="p-3 text-muted small text-nowrap">
                                <i class="bi bi-calendar3 me-1"></i>
                                <?= date('d M Y', strtotime($p['created_at'])); ?><br>
                                <span class="ms-4"><?= date('H:i', strtotime($p['created_at'])); ?></span>
                            </td>
                            
                            <td class="p-3 text-truncate" style="max-width: 200px;">
                                <div class="fw-bold text-truncate" style="color: var(--vintage-dark);"><?= $p['nama']; ?></div>
                                <div class="small text-muted text-truncate"><?= $p['email']; ?></div>
                            </td>
                            
                            <td class="p-3">
                                <span class="badge bg-warning text-dark mb-1 border border-dark rounded-0"><?= $p['subject']; ?></span>
                                <p class="mb-0 text-muted small fst-italic text-truncate-multiline">
                                    "<?= $p['pesan']; ?>"
                                </p>
                                
                                <button type="button" class="btn btn-link btn-link-vintage btn-sm p-0" data-bs-toggle="modal" data-bs-target="#modalPesan<?= $p['id']; ?>">
                                    Batja selengkapnja
                                </button>
                            </td>

                            <td class="p-3 text-end">
                                <a href="javascript:void(0);" 
                                   data-href="<?= base_url('admin/pesan/delete/' . $p['id']); ?>" 
                                   class="btn btn-outline-danger btn-sm btn-delete-msg"
                                   title="Hapoes Pesan">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalPesan<?= $p['id']; ?>" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-0 border-2 border-dark" style="background-color: var(--vintage-card);">
                                    <div class="modal-header" style="border-bottom: 2px dashed var(--vintage-dark);">
                                        <h5 class="modal-title fw-bold" style="font-family: var(--font-heading);">Detail Pesan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body" style="font-family: var(--font-body);">
                                        <div class="mb-3">
                                            <label class="small text-muted fw-bold text-uppercase">Dari:</label>
                                            <div><?= $p['nama']; ?> (<?= $p['email']; ?>)</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="small text-muted fw-bold text-uppercase">Soebjek:</label>
                                            <div class="fw-bold"><?= $p['subject']; ?></div>
                                        </div>
                                        <hr style="border-top: 1px dashed var(--vintage-dark);">
                                        <div class="p-3 bg-white border border-dark">
                                            <?= nl2br($p['pesan']); ?>
                                        </div>
                                        <div class="mt-2 text-end small text-muted">
                                            Diterima pada: <?= $p['created_at']; ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <a href="mailto:<?= $p['email']; ?>?subject=Balasan: <?= $p['subject']; ?>" class="btn btn-dark btn-sm rounded-0" style="font-family: var(--font-body);">
                                            <i class="bi bi-reply-fill me-1"></i> Balas Email
                                        </a>
                                        <button type="button" class="btn btn-outline-dark btn-sm rounded-0" style="font-family: var(--font-body);" data-bs-dismiss="modal">Toetoep</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Logika Notifikasi Sukses
        <?php if (session()->getFlashdata('pesan')) : ?>
            Swal.fire({
                title: 'MAKLUMAT',
                text: '<?= session()->getFlashdata('pesan'); ?>',
                icon: 'success',
                confirmButtonText: 'Diterima',
                customClass: {
                    confirmButton: 'swal-btn-ok'
                },
                backdrop: `rgba(43, 29, 22, 0.4)`
            });
        <?php endif; ?>

        // 2. Logika Konfirmasi Hapus
        const deleteButtons = document.querySelectorAll('.btn-delete-msg');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const deleteUrl = this.getAttribute('data-href');

                Swal.fire({
                    title: 'Peringatan!',
                    text: "Apakah Toean jakin ingin membakar (menghapoes) surat ini dari arsip?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ja, Bakar!',
                    cancelButtonText: 'Simpan Sadja',
                    reverseButtons: true,
                    backdrop: `rgba(43, 29, 22, 0.6)`
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl;
                    }
                });
            });
        });
    });
</script>

<?= $this->endSection(); ?>