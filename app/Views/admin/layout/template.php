<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400&family=Special+Elite&display=swap" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --vintage-dark: #261C15;
            --vintage-medium: #3e2723;
            --vintage-gold: #c5a059;
            --vintage-cream: #fdfbf7;
            --vintage-bg: #f4f1ea;
            --font-heading: 'Special Elite', cursive;
            --font-body: 'Courier Prime', monospace;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--vintage-bg);
            color: var(--vintage-medium);
            overflow-x: hidden;
        }

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            min-width: 260px;
            max-width: 260px;
            background: var(--vintage-dark);
            color: #fff;
            transition: all 0.3s;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            border-right: 4px double var(--vintage-gold);
            box-shadow: 5px 0 15px rgba(0,0,0,0.3);
            z-index: 1000;
        }

        #sidebar.active { margin-left: -260px; }

        .sidebar-header {
            padding: 25px 20px;
            background: rgba(0,0,0,0.2);
            border-bottom: 1px dashed var(--vintage-gold);
            text-align: center;
        }

        .sidebar-brand {
            color: var(--vintage-gold);
            font-family: var(--font-heading);
            font-size: 1.5rem;
            letter-spacing: 2px;
            text-shadow: 2px 2px 0px #000;
        }

        #sidebar ul.components {
            padding: 20px 0;
            flex-grow: 1;
        }

        #sidebar ul li a {
            padding: 15px 25px;
            font-size: 0.95rem;
            display: block;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 5px solid transparent;
            letter-spacing: 1px;
            margin-bottom: 5px;
            font-family: var(--font-body);
        }

        #sidebar ul li a:hover {
            color: var(--vintage-cream);
            background: rgba(197, 160, 89, 0.1);
            border-left: 5px solid var(--vintage-gold);
            padding-left: 30px;
        }

        #sidebar ul li a.active {
            color: var(--vintage-dark);
            background: var(--vintage-gold);
            border-left: 5px solid #fff;
            font-weight: bold;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.2);
        }

        #sidebar ul li a i {
            margin-right: 12px;
            font-size: 1.1rem;
            vertical-align: middle;
        }

        #content {
            width: 100%;
            min-height: 100vh;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
        }

        .top-navbar {
            padding: 15px 30px;
            background: var(--vintage-cream);
            background-image: url('https://www.transparenttextures.com/patterns/aged-paper.png');
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(62, 39, 35, 0.2);
        }

        #sidebarCollapse {
            background: var(--vintage-dark);
            color: var(--vintage-gold);
            border: 1px solid var(--vintage-dark);
            border-radius: 4px;
            transition: 0.3s;
            width: 45px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #sidebarCollapse:hover {
            background: var(--vintage-gold);
            color: var(--vintage-dark);
        }

        .user-profile {
            background: rgba(197, 160, 89, 0.2);
            padding: 5px 15px;
            border-radius: 30px;
            border: 1px solid var(--vintage-gold);
        }

        .main-content {
            padding: 30px;
            flex-grow: 1;
        }

        div:where(.swal2-container) div:where(.swal2-popup) {
            background: #f4f1ea url('https://www.transparenttextures.com/patterns/aged-paper.png');
            border: 3px double var(--vintage-dark);
            font-family: var(--font-body) !important;
        }
        
        div:where(.swal2-container) h2:where(.swal2-title) {
            font-family: var(--font-heading) !important;
            color: var(--vintage-dark) !important;
        }

        div:where(.swal2-container) button.swal2-confirm {
            background-color: #b71c1c !important;
            border: 2px solid var(--vintage-dark) !important;
            border-radius: 0 !important;
            box-shadow: 4px 4px 0px var(--vintage-dark) !important;
            font-family: var(--font-body) !important;
            font-weight: bold;
            text-transform: uppercase;
        }

        div:where(.swal2-container) button.swal2-cancel {
            color: var(--vintage-dark) !important;
            font-family: var(--font-body) !important;
            font-weight: bold;
            text-transform: uppercase;
        }

        @media (max-width: 768px) {
            #sidebar { margin-left: -260px; position: fixed; height: 100%; }
            #sidebar.active { margin-left: 0; }
            .overlay { display: none; position: fixed; width: 100vw; height: 100vh; background: rgba(0,0,0,0.5); z-index: 999; opacity: 0; transition: all 0.5s; }
            .overlay.active { display: block; opacity: 1; }
        }
    </style>
</head>


<body>

    <?php 
        // LOGIKA ACTIVE STATE
        $uri = uri_string();
        $isGaleri = strpos($uri, 'admin/galeri') !== false;
        $isAbout = strpos($uri, 'admin/about') !== false;
        $isPesan = strpos($uri, 'admin/pesan') !== false;
        $isMenu = !$isGaleri && !$isAbout && !$isPesan && strpos($uri, 'admin') !== false;
    ?>

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <i class="bi bi-cup-hot-fill text-warning fs-2 d-block mb-2"></i>
                <h4 class="sidebar-brand fw-bold mb-0">SUKAMAJU</h4>
                <small class="text-white-50" style="font-size: 0.7rem; letter-spacing: 2px; font-family: var(--font-body);">VINTAGE DASHBOARD</small>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="<?= base_url('admin') ?>" class="<?= $isMenu ? 'active' : '' ?>">
                        <i class="bi bi-journal-text"></i> Kelola Menoe
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('admin/galeri') ?>" class="<?= $isGaleri ? 'active' : '' ?>">
                        <i class="bi bi-images"></i> Kelola Galeri
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('admin/about'); ?>" class="<?= $isAbout ? 'active' : '' ?>">
                        <i class="bi bi-info-circle"></i> Tentang Kami
                    </a>
                </li>
                
                <li>
                    <a href="<?= base_url('admin/pesan'); ?>" class="<?= $isPesan ? 'active' : '' ?>">
                        <i class="bi bi-envelope-paper"></i> Kotak Masoek
                    </a>
                </li>
            </ul>

            <div class="p-4 mt-auto">
                <a href="<?= base_url('/') ?>" target="_blank" class="btn btn-outline-warning w-100 btn-sm mb-3 rounded-0" style="border-style: dashed; font-family: var(--font-body);">
                    <i class="bi bi-box-arrow-up-right me-1"></i> Lihat Website
                </a>
                
                <button type="button" id="btn-logout" class="btn btn-danger w-100 btn-sm rounded-0 d-flex align-items-center justify-content-center gap-2 shadow-sm" style="border: 2px solid #b71c1c; font-family: var(--font-body); font-weight: bold;">
                    <i class="bi bi-door-open-fill"></i> Keluar
                </button>
            </div>
        </nav>

        <div id="content">
            <nav class="top-navbar">
                <button type="button" id="sidebarCollapse" class="btn btn-sm" title="Toggle Menu">
                    <i class="bi bi-list fs-4"></i>
                </button>

                <div class="user-profile d-flex align-items-center gap-2">
                    <div class="text-end d-none d-md-block" style="line-height: 1.2;">
                        <small class="d-block text-muted" style="font-size: 0.7rem;">Login sebagai:</small>
                        <span style="font-weight: bold; color: var(--vintage-dark);"><?= session()->get('username'); ?></span>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode(session()->get('username')); ?>&background=c5a059&color=fff&bold=true" class="rounded-circle border border-dark" width="40" alt="User">
                </div>
            </nav>

            <div class="main-content">
                <?= $this->renderSection('content'); ?>
            </div>

            <footer class="bg-white p-3 text-center text-muted small border-top" style="background-color: var(--vintage-cream) !important; border-top: 2px dashed var(--vintage-gold) !important;">
                Dibuat dengan <i class="bi bi-heart-fill text-danger mx-1"></i> by <strong>Sukamaju House Administrator</strong>
            </footer>
        </div>
    </div>

    <div class="overlay"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            
            // --- 1. Sidebar Toggle  ---
            const sidebar = document.getElementById('sidebar');
            const sidebarCollapse = document.getElementById('sidebarCollapse');
            const overlay = document.querySelector('.overlay');
            const menuIcon = sidebarCollapse.querySelector('i');

            function toggleSidebar() {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');

                if (menuIcon.classList.contains('bi-list')) {
                    menuIcon.classList.remove('bi-list');
                    menuIcon.classList.add('bi-x-lg');
                } else {
                    menuIcon.classList.remove('bi-x-lg');
                    menuIcon.classList.add('bi-list');
                }
            }

            function closeSidebar() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                menuIcon.classList.remove('bi-x-lg');
                menuIcon.classList.add('bi-list');
            }

            sidebarCollapse.addEventListener('click', toggleSidebar);
            overlay.addEventListener('click', closeSidebar);

            // --- 2. SweetAlert Logout ---
            const btnLogout = document.getElementById('btn-logout');
            if(btnLogout) {
                btnLogout.addEventListener('click', function() {
                    Swal.fire({
                        title: 'Hendak Keluar?',
                        text: "Sesi Toean akan diakhiri disini.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ja, Keluar',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        backdrop: `rgba(43, 29, 22, 0.6)`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?= base_url('logout'); ?>";
                        }
                    });
                });
            }
        });
    </script>


</body>
</html>