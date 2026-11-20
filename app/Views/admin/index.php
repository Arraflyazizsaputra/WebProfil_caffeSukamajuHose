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
        --vintage-accent: #d7ccc8;
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

    .page-header h2 {
        font-family: var(--font-heading);
        color: var(--vintage-dark);
        border-bottom: 2px dashed var(--vintage-dark);
        display: inline-block;
        padding-bottom: 5px;
        text-transform: uppercase;
    }

    .card-vintage {
        background-color: var(--vintage-card);
        border: 1px solid #9e9e9e;
        box-shadow: 3px 3px 0px rgba(62, 39, 35, 0.2);
        border-radius: 2px;
    }

    .admin-filter-btn {
        font-size: 0.8rem;
        border: 1px solid var(--vintage-dark);
        background: transparent;
        color: var(--vintage-dark);
        padding: 5px 15px;
        text-transform: uppercase;
        font-weight: bold;
        transition: 0.3s;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 5px;
    }

    .admin-filter-btn:hover, .admin-filter-btn.active {
        background: var(--vintage-dark);
        color: var(--vintage-accent);
    }

    .btn-vintage-add {
        background-color: var(--btn-primary-vintage);
        color: #fdfbf7;
        font-family: var(--font-body);
        border: 2px solid var(--vintage-dark);
        padding: 10px 20px;
        text-transform: uppercase;
        font-weight: bold;
        box-shadow: 3px 3px 0px var(--vintage-dark);
        text-decoration: none;
        transition: 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-vintage-add:hover {
        background-color: var(--vintage-dark);
        color: #fff;
        transform: translate(-2px, -2px);
        box-shadow: 6px 6px 0px rgba(62, 39, 35, 0.4);
    }

    .table-vintage thead {
        background-color: #d7ccc8;
        color: var(--vintage-dark);
        border-bottom: 2px solid var(--vintage-dark);
        font-family: var(--font-heading);
    }

    .badge-kategori {
        font-family: var(--font-body);
        text-transform: uppercase;
        font-size: 0.7rem;
        padding: 4px 8px;
        border: 1px solid var(--vintage-dark);
        background: rgba(197, 160, 89, 0.1);
        color: var(--vintage-dark);
        font-weight: bold;
    }

    .img-thumbnail-vintage {
        padding: 3px;
        background-color: #fff;
        border: 1px solid #000;
        box-shadow: 2px 2px 0px rgba(0,0,0,0.1);
    }

    @media (max-width: 768px) {
        .table-vintage thead { display: none; }
        .table-vintage tbody tr { display: block; margin-bottom: 20px; border: 1px solid var(--vintage-dark); padding: 10px; background: #fff; }
        .table-vintage tbody td { display: block; text-align: right; position: relative; padding-left: 50%; border-bottom: 1px dashed #eee; }
        .table-vintage tbody td::before { 
            content: attr(data-label); 
            position: absolute; left: 10px; font-weight: bold; font-family: var(--font-heading); 
            text-transform: uppercase; font-size: 0.8rem;
        }
    }
</style>


<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4 page-header">
        <div>
            <h2><i class="bi bi-journal-richtext me-2"></i>Daftar Menoe & Sadjian</h2>
            <p class="text-muted small mb-0">Arsip rupa-rupa hidangan Sukamaju House</p>
        </div>
        
        <a href="<?= base_url('admin/create'); ?>" class="btn-vintage-add">
            <i class="bi bi-plus-circle"></i> <span>Tambah Menoe</span>
        </a>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('pesan'); ?>',
                confirmButtonColor: '#4e342e'
            });
        </script>
    <?php endif; ?>

    <div class="mb-3">
        <span class="small fw-bold text-uppercase me-2" style="font-family: var(--font-heading);">Saring:</span>
        <button class="admin-filter-btn active" onclick="filterTable('all')">Semoea</button>
        <button class="admin-filter-btn" onclick="filterTable('custombeer')">Custombeer</button>
        <button class="admin-filter-btn" onclick="filterTable('soekamakan')">Soekamakan</button>
        <button class="admin-filter-btn" onclick="filterTable('roeparasa')">Roepa Rasa</button>
    </div>

    <div class="card card-vintage">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-vintage align-middle mb-0" id="menuTable">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No.</th>
                            <th width="10%">Visueel</th>
                            <th width="20%">Nama Sadjian</th>
                            <th width="15%">Kategori</th>
                            <th width="20%">Harga</th>
                            <th width="25%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($menus as $m) : ?>
                        <tr class="menu-item" data-category="<?= $m['kategori']; ?>">
                            <td class="text-center" data-label="No."><?= $i++; ?>.</td>
                            <td data-label="Visueel">
                                <img src="<?= base_url('img/' . $m['gambar']); ?>" 
                                     class="img-thumbnail-vintage" 
                                     width="65" height="65" 
                                     style="object-fit: cover;"
                                     onerror="this.src='<?= base_url('img/default.jpg'); ?>'">
                            </td>
                            <td data-label="Nama Sadjian">
                                <span class="fw-bold" style="font-family: var(--font-heading); color: var(--vintage-dark); font-size: 1.1rem;">
                                    <?= $m['nama_menu']; ?>
                                </span>
                            </td>
                            <td data-label="Kategori">
                                <span class="badge-kategori">
                                    <?php 
                                        if($m['kategori'] == 'custombeer') echo 'Custombeer';
                                        elseif($m['kategori'] == 'soekamakan') echo 'Soekamakan';
                                        elseif($m['kategori'] == 'roeparasa') echo 'Roepa Rasa';
                                        else echo '<i class="text-muted">Nihil</i>';
                                    ?>
                                </span>
                            </td>
                            <td data-label="Harga">
                                <span style="font-family: var(--font-heading); color: #2e7d32; font-weight: bold;">
                                    Rp <?= number_format($m['harga'], 0, ',', '.'); ?>
                                </span>
                            </td>
                            <td class="text-center" data-label="Aksi">
                                <div class="btn-group" role="group">
                                    <button type="button" data-href="<?= base_url('admin/edit/' . $m['id']); ?>" data-nama="<?= $m['nama_menu']; ?>" class="btn btn-outline-dark btn-sm rounded-0 border-dark btn-edit">
                                        <i class="bi bi-pencil-square"></i> Soenting
                                    </button>
                                    
                                    <button type="button" data-href="<?= base_url('admin/delete/' . $m['id']); ?>" data-nama="<?= $m['nama_menu']; ?>" class="btn btn-outline-danger btn-sm rounded-0 border-dark btn-delete">
                                        <i class="bi bi-trash3"></i> Hapoes
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php if(empty($menus)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <p class="mt-2">Beloem ada data sadjian jang ditambahkan.</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    // FUNGSI FILTER TABEL
    function filterTable(category) {
        document.querySelectorAll('.admin-filter-btn').forEach(btn => {
            btn.classList.remove('active');
            if(btn.innerText.toLowerCase() === category || (category === 'all' && btn.innerText.toLowerCase() === 'semoea')) {
                btn.classList.add('active');
            }
        });

        const items = document.querySelectorAll('.menu-item');
        items.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Konfirmasi Hapoes
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const url = this.getAttribute('data-href');
                const nama = this.getAttribute('data-nama');
                
                Swal.fire({
                    title: 'Peringatan!',
                    html: `Apakah Toean jakin ingin menghapoes menu <br><strong>"${nama}"</strong>?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ja, Hapoes!',
                    cancelButtonText: 'Batalkan',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#8d6e63',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });

        // Konfirmasi Soenting (Edit)
        const editButtons = document.querySelectorAll('.btn-edit');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const url = this.getAttribute('data-href');
                const nama = this.getAttribute('data-nama');
                
                Swal.fire({
                    title: 'Soenting Data',
                    html: `Apakah Toean hendak mengoebah data menu <br><strong>"${nama}"</strong>?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ja, Soenting!',
                    cancelButtonText: 'Tidak Jadi',
                    confirmButtonColor: '#4e342e',
                    cancelButtonColor: '#8d6e63',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>

<?= $this->endSection(); ?>