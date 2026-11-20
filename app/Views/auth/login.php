<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masoek - Admin Panel</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400&family=Special+Elite&display=swap" rel="stylesheet">

    <style>
        :root {
            --vintage-bg: #fdfbf7;
            --vintage-card: #fffcf5;
            --vintage-dark: #261C15;
            --vintage-text: #3e2723;
            --font-heading: 'Special Elite', cursive;
            --font-body: 'Courier Prime', monospace;
        }

        body {
            background-color: var(--vintage-bg);
            font-family: var(--font-body); 
            color: var(--vintage-text);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: 
                linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('<?= base_url('img/Bg1.png'); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .login-card {
            background-color: var(--vintage-card);
            border: 2px solid var(--vintage-dark);
            box-shadow: 10px 10px 0px rgba(20, 10, 5, 0.8);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            position: relative;
        }

        .tape {
            background-color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
            width: 130px;
            height: 35px;
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%) rotate(-2deg);
            border-left: 1px dashed rgba(0,0,0,0.1);
            border-right: 1px dashed rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            border-bottom: 2px dashed var(--vintage-dark);
            padding-bottom: 10px;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-family: var(--font-heading); 
        }

        .form-control {
            background-color: #fcfcfc;
            border: 1px solid var(--vintage-dark);
            border-radius: 0;
            font-family: var(--font-body); 
            color: var(--vintage-dark);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: var(--vintage-dark);
            background-color: #fff;
        }

        .btn-vintage {
            background-color: var(--vintage-dark);
            color: #fdfbf7;
            border: 1px solid var(--vintage-dark);
            width: 100%;
            padding: 10px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
            transition: all 0.2s;
            font-family: var(--font-body); 
        }

        .btn-vintage:hover {
            background-color: #fff;
            color: var(--vintage-dark);
            box-shadow: 2px 2px 0px rgba(0,0,0,0.2);
        }

        .alert-vintage {
            background-color: #ffcdd2;
            color: #b71c1c;
            border: 1px solid #b71c1c;
            font-size: 0.9rem;
        }

        .text-daftar {
            font-size: 0.85rem;
            color: var(--vintage-dark);
            margin-top: 15px;
            text-align: center;
        }
        
        .link-daftar {
            color: var(--vintage-dark);
            text-decoration: underline;
            font-weight: bold;
            cursor: pointer;
        }
        
        .link-daftar:hover {
            color: #5d4037; 
            text-decoration: none; 
        }
    </style>
</head>


<body>
    <div class="login-card">
        <div class="tape"></div>
        <h2>Masoek Sistem</h2>

        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-vintage p-2 text-center mb-3">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>
        
        <?php if(session()->getFlashdata('success')):?>
            <div class="alert alert-success p-2 text-center mb-3 border-dark rounded-0">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif;?>

        <form action="<?= base_url('/login/auth'); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nama Penggoena</label>
                <input type="text" name="username" class="form-control" id="username" required autofocus autocomplete="off">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-vintage">Masoek</button>
        </form>
        
        <div class="text-daftar">
            <span>Beloem poenja akoen?</span>
            <a href="<?= base_url('/register'); ?>" class="link-daftar">
                 Daftar disini.
            </a>
        </div>
        <div class="text-center mt-3">
            <small class="text-muted" style="font-size: 0.7rem;">&copy; 2025 - Sukamaju House</small>
        </div>
    </div>

    
</body>
</html>