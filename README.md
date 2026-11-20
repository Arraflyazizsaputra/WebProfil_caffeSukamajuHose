# ☕ Sukamaju House — Web Profil & Sistem Manajemen Kafe Vintage

[![Framework](https://img.shields.io/badge/Framework-CodeIgniter%204.x-orange.svg)](https://codeigniter.com/)
[![PHP](https://img.shields.io/badge/PHP-%3E%3D%208.1-blue.svg)](https://www.php.net/)
[![Database](https://img.shields.io/badge/Database-MySQL%20%2F%20MariaDB-green.svg)](https://mariadb.org/)
[![UI Style](https://img.shields.io/badge/Aesthetic-Classic%20Vintage%201900s-brown.svg)](https://fonts.google.com/)

---

## 📜 1. Deskripsi Naratif Sistem

**Sukamaju House** adalah aplikasi web profil komprehensif sekaligus sistem manajemen operasional kafe dan ruang komunitas berbasis konsep **klasik jadoel (vintage nostalgia)**. Berdiri dan beroperasi secara resmi sejak **10 Februari 2025**, Sukamaju House lahir dari prakarsa dan visi sang pemilik sekaligus penanggung jawab utama, **Bapak Odon Montfort**. 

Secara administratif, kafe ini berlokasi di **Dusun Mekarsari, Kecamatan Kalijati, Kabupaten Subang**, tepat bersisian langsung dengan urat nadi jalan raya utama Sukamaju. Pemilihan nama *"Sukamaju House"* merefleksikan identitas tempat yang ramah, hangat, dan mudah melekat di hati para penikmat suasana (*catchy and memorable*).

Sistem web ini dibangun bukan sekadar sebagai etalase digital statis, melainkan representasi visual dan kultural dari model bisnis kolaboratif (**multi-tenant system**) yang diterapkan di Sukamaju House. Di dalamnya berpadu tiga entitas usaha mandiri dalam satu kehangatan atap:
1. **Tenant Minuman (Custombeer)** — Menyajikan racikan kopi autentik dan kreasi non-kopi segar yang dikurasi langsung oleh Owner Utama.
2. **Tenant Camilan (Soekamakan)** — Menghidangkan camilan gurih, makanan ringan, dan kudapan santai seperti *Mix Platter*, sosis bakar, hingga dimsum.
3. **Tenant Santapan (Roepa Rasa)** — Meracik hidangan utama yang kaya rempah dan mengenyangkan, seperti *Indomie Nyemek Bangladesh*, varian mi rempah Pakistan/Thailand, olahan nasi, hingga *dessert* kekinian ala brulee.

Melalui perpaduan gaya bahasa ejaan lama (*Van Ophuijsen / Soewandi*) dan tata visual ala warkop/kedai era 1900-an, sistem web ini menjembatani pengunjung untuk merasakan denyut nostalgia masa lalu sembari menikmati kemudahan teknologi informasi masa kini.

---

## ⚙️ 2. Fungsi dan Fitur Sistem

Sistem Sukamaju House dirancang dengan arsitektur **Model-View-Controller (MVC)** menggunakan **CodeIgniter 4**, memisahkan ruang publik pengunjung dengan panel kendali administratif berkeamanan tinggi.

### A. Fitur Publik (Front-End Pengunjung)
* **Beranda Interaktif (Landing Page):**
  * Carousel hero sinematik dengan potret suasana autentik kafe.
  * *Sadjian Favorit Terpilih*: Menampilkan representasi menu unggulan dari masing-masing tenant (Custombeer, Soekamakan, Roepa Rasa).
  * *Sekilas Galeri Polaroid*: Cuplikan dokumentasi sudut-sudut kafe berestetika tinggi.
  * Jam operasional dinamis (Setiap hari pukul 12.00 – 22.00 WIB) dan kutipan filosofi kedai.
* **Katalog Menoe Lengkap (Menu Page):**
  * Navigasi penyaringan (*filter*) kategori berbasis AJAX/URI (`Semoea`, `Custombeer`, `Soekamakan`, `Roepa Rasa`).
  * Informasi visual foto menu, nama hidangan, deskripsi bahan/keistimewaan, dan pita harga (*price ribbon*).
  * Modal dialog interaktif untuk melihat detail lengkap porsi dan cerita di balik menu.
* **Galeri Suasana Tempo Doeloe (Gallery Page):**
  * Arsip dokumentasi sudut-sudut kafe, perpustakaan mini, pojok baca, hingga display *vintage merchandise*.
  * Konsep bingkai foto *Polaroid* dengan narasi puitis tempo doeloe untuk tiap foto.
* **Tentang Kami (About Page):**
  * Narasi kronologis sejarah pendirian Sukamaju House, profil owner, dan filosofi multi-tenant.
  * Tinjauan fasilitas utama: Area Nongkrong Komunitas, Perpustakaan Mini, Display Penjualan Kaos & Pernak-Pernik Vintage, serta Layanan Wi-Fi.
* **Hubungi Kami & Kotak Masuk (Contact & Inbox):**
  * Formulir kirim pesan / ulasan pengunjung dengan validasi lengkap (*input sanitizer*).
  * Otomatisasi pencatatan waktu kirim berbasis zona waktu lokal **WIB (Asia/Jakarta)**.
  * Tombol integrasi cepat langsung ke WhatsApp Business Kafe (`+62 895-6384-01279`).
  * Tautan navigasi lokasi Google Maps menuju Jl. Raya Sukamaju, Kalijati, Subang.

### B. Fitur Panel Administrator (Back-End Management)
* **Sistem Autentikasi Terproteksi:**
  * Halaman Masuk (*Login*) dan Pendaftaran (*Register*) akun pengelola.
  * Keamanan hashing kata sandi modern (`password_hash` dengan algoritma `BCRYPT`).
  * Filter keamanan sesi (`AuthFilter`) untuk mencegah akses ilegal tanpa izin ke rute `/admin/*`.
* **Pengelolaan Menoe & Sadjian (CRUD Menu):**
  * Menambah menu baru beserta penentuan tenant/kategori dan pengunggahan visual foto hidangan.
  * Mengubah informasi nama menu, kategori, harga rupiah, dan deskripsi sajian.
  * Menghapus menu dengan pembersihan berkas gambar fisik lama secara otomatis dari server storage.
* **Pengelolaan Galeri Suasana (CRUD Galeri):**
  * Mengunggah arsip foto polaroid baru beserta judul dan subjudul bernada klasik.
  * Memperbarui foto dan sunting teks narasi suasana.
  * Menghapus potret galeri dengan proteksi dialog konfirmasi konseptual.
* **Pengelolaan Halaman Tentang Kami (Edit About):**
  * Memperbarui narasi sejarah kafe, judul profil, serta foto representatif utama langsung dari dasbor tanpa mengubah baris kode.
* **Kotak Masuk Pesan Pengunjung (Inbox Review):**
  * Memantau daftar kritik, saran, pertanyaan kemitraan, dan apresiasi yang dikirim pelanggan melalui formulir kontak.
  * Informasi pencatatan waktu masuk (*timestamp*) secara akurat dan opsi penghapusan berkala.

---

## 🎨 3. Tampilan dan Estetika Visual (UI / UX Design)

Tampilan antarmuka Sukamaju House mengadopsi estetika **Vintage Heritage & Antique Warmth**, menyajikan atmosfer hangat layaknya lembaran koran dan naskah mesin ketik tempo doeloe:

### 1. Palet Warna (Color Palette)
* **Vintage Dark (`#261C15` / `#1e1611`):** Nuansa kayu tua jati dan pekatnya biji kopi sangrai sebagai warna dasar bilah navigasi dan latar belakang galeri.
* **Aged Paper / Cream (`#fdfbf7` / `#f4f1ea`):** Warna kertas kuno bertekstur lembut sebagai latar baca utama yang nyaman bagi mata.
* **Antique Gold Accent (`#c5a059`):** Aksen emas tembaga antik untuk garis ganda (*double borders*), ikon penanda, lencana kategori, dan tombol aksi utama.
* **Vintage Ink (`#3e2723`):** Warna tinta cokelat tua pekat untuk teks paragraf guna memperkuat kesan naskah autentik.

### 2. Tipografi Karakteristik (Typography)
* **Heading & Display:** Menggunakan Google Fonts *'Special Elite'*, menghadirkan font mesin tik (*typewriter*) klasik bertekstur tinta nyata pada setiap judul bab, papan menu, dan plang informasi.
* **Body Text & Keterangan:** Menggunakan Google Fonts *'Courier Prime'*, memastikan teks narasi, harga, dan komposisi mudah dibaca secara rapi dan proporsional.

### 3. Komponen Visual Unik
* **Kartu Polaroid Miring (*Tilted Polaroid Frames*):** Kartu foto galeri dengan efek kemiringan acak (*rotate tilt*), bayangan lembut, dan efek transisi warna sepia menuju warna asli saat kursor melintas (*hover effect*).
* **Pita Harga Tradisional (*Price Ribbon*):** Penanda nominal harga hidangan bergaya pita vintage di sudut visual foto menu.
* **Drop-Cap Huruf Awal:** Huruf pertama berukuran besar bergaya surat kabar lama pada paragraf narasi sejarah kafe.
* **Pemberitahuan SweetAlert2 Kustom:** Seluruh pesan peringatan (*alert*) dan konfirmasi dialog diformat menggunakan tekstur kertas kuno, garis batas ganda, dan font mesin tik.
* **Aksesibilitas Mengambang (*Floating Controls*):** Tombol *Back to Top* dinamis dengan animasi halus dan tombol pintas pesan cepat *WhatsApp Floating Assistant*.

---

## 📁 4. Struktur Direktori Proyek

```text
webprofil_sukamajuhouse/
├── app/
│   ├── Config/              # Konfigurasi aplikasi, rute, database, filter
│   │   ├── Routes.php       # Pemetaan rute URL publik, auth, dan admin
│   │   └── ...
│   ├── Controllers/         # Kontroler logika sistem
│   │   ├── Admin.php        # Panel admin (CRUD Menu, Galeri, About, Pesan)
│   │   ├── AuthController.php # Autentikasi Login, Register, Logout
│   │   ├── BaseController.php
│   │   └── Home.php         # Rute publik (Landing, Menu, About, Galeri, Contact)
│   ├── Filters/
│   │   └── AuthFilter.php   # Filter proteksi rute admin
│   ├── Models/              # Model data entitas MySQL
│   │   ├── AboutModel.php   # Model tabel tbl_about
│   │   ├── GaleriModel.php  # Model tabel galeri
│   │   ├── MenuModel.php    # Model tabel menu
│   │   ├── PesanModel.php   # Model tabel tbl_pesan
│   │   └── UserModel.php    # Model tabel users
│   └── Views/               # Tampilan antarmuka pengguna
│       ├── about.php        # Halaman Tentang Kami
│       ├── contact.php      # Halaman Kontak & Kirim Pesan
│       ├── galeri.php       # Halaman Galeri Foto Polaroid
│       ├── landing_page.php # Halaman Beranda Utama
│       ├── menu_page.php    # Halaman Katalog Menu & Filter
│       ├── admin/           # Tampilan dashboard pengelola
│       │   ├── create.php   # Tambah menu
│       │   ├── edit.php     # Ubah menu
│       │   ├── index.php    # Daftar menu & filter admin
│       │   ├── about/       # Kelola data about
│       │   ├── galeri/      # Kelola arsip foto suasana
│       │   ├── pesan/       # Kotak masuk pesan
│       │   └── layout/      # Template layout dashboard admin
│       ├── auth/            # Halaman login & register
│       └── layout/          # Template master halaman publik
├── public/                  # Berkas web publik (Web Root)
│   ├── .htaccess            # Konfigurasi rewrite Apache
│   ├── index.php            # Titik masuk utama CodeIgniter
│   └── img/                 # Aset grafis, foto menu, background & galeri
│       ├── galeri/          # Direktori berkas foto suasana kafe
│       └── ...
├── system/                  # Core Framework CodeIgniter 4
├── writable/                # Direktori berkas runtime CI4
├── db_sukamaju.sql          # Berkas dump skema & data awal MySQL
├── .env                     # Berkas konfigurasi environment lokal
├── .env.example             # Contoh template konfigurasi environment
├── .gitignore               # Aturan pengabaian berkas git
└── spark                    # Utilitas CLI CodeIgniter 4
```

---

## 🚀 5. Panduan Instalasi & Menjalankan Proyek

### Persyaratan Lingkungan (*Prerequisites*)
* **PHP:** Versi 8.1 atau lebih baru (dengan ekstensi `intl`, `mbstring`, `mysqli`, `curl` aktif).
* **Database Server:** MySQL versi 5.7+ atau MariaDB 10.3+.
* **Web Server:** Apache (dapat menggunakan paket XAMPP / WampServer / Laragon).
* **Git:** Versi terbaru untuk kloning repositori.

### Langkah-Langkah Pemasangan

1. **Salin / Kloning Repositori:**
   ```bash
   git clone https://github.com/Arraflyazizsaputra/WebProfil_caffeSukamajuHose.git
   ```
   Pindahkan folder hasil kloning ke dalam direktori publik server web Anda (contoh: `C:\xampp\htdocs\webprofil_sukamajuhouse`).

2. **Impor Database:**
   * Buka phpMyAdmin (`http://localhost/phpmyadmin`) atau terminal MySQL Anda.
   * Buat database baru bernama: `db_sukamaju`.
   * Impor berkas **`db_sukamaju.sql`** yang tersedia di akar folder proyek ke dalam database tersebut.

3. **Konfigurasi Lingkungan (`.env`):**
   * Pastikan berkas `.env` telah aktif di akar direktori (dapat menyalin dari `.env.example`).
   * Periksa pengaturan koneksi database Anda:
     ```ini
     CI_ENVIRONMENT = development

     database.default.hostname = localhost
     database.default.database = db_sukamaju
     database.default.username = root
     database.default.password = 
     database.default.DBDriver = MySQLi
     database.default.port = 3306
     ```

4. **Menjalankan Aplikasi:**
   * **Menggunakan XAMPP Apache:**
     Buka peramban (*browser*) dan arahkan ke alamat:
     ```text
     http://localhost/webprofil_sukamajuhouse/public/
     ```
   * **Atau Menggunakan Spark CLI (Bawaan CodeIgniter 4):**
     Buka terminal di direktori proyek dan jalankan:
     ```bash
     php spark serve
     ```
     Lalu akses tautan lokal yang ditampilkan (biasanya `http://localhost:8080`).

---

## 🔑 6. Akses Administrator Bawaan (Default Login)

Untuk keperluan pengujian dan pengelolaan dasbor admin:
* **URL Masuk Admin:** `http://localhost/webprofil_sukamajuhouse/public/login`
* **Nama Pengguna (*Username*):** `admin`
* **Kata Sandi (*Password*):** `admin`

---

## 👥 7. Hak Cipta & Pengembang

* **Entitas:** Sukamaju House (Cafe & Community Space)
* **Penanggung Jawab & Owner:** Bapak Odon Montfort
* **Lokasi:** Dusun Mekarsari, Kec. Kalijati, Kab. Subang, Jawa Barat, Indonesia
* **Tahun Operasional:** Resmi sejak 10 Februari 2025
* **Pengembang Repositori:** [Arraflyazizsaputra](https://github.com/Arraflyazizsaputra)

---
*Nikmatilah secangkir seduhan kenangan dari masa lalu di Sukamaju House!*
