<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\GaleriModel;
use App\Models\AboutModel;
use App\Models\PesanModel;

class Home extends BaseController
{
    /**
     * Halaman Beranda / Landing Page
     */
    public function index()
    {
        $menuModel   = new MenuModel();
        $galeriModel = new GaleriModel();

        // Mengambil satu menu Sadjian Favorit
        $favCustombeer = $menuModel->where('kategori', 'custombeer')->first();
        $favSoekamakan = $menuModel->where('kategori', 'soekamakan')->first();
        $favRoeparasa  = $menuModel->where('kategori', 'roeparasa')->first();

        $menusPilihan = array_filter([$favCustombeer, $favSoekamakan, $favRoeparasa]);

        $data = [
            'title'  => 'Beranda | Sukamaju House',
            'menus'  => $menusPilihan,
            'galeri' => $galeriModel->orderBy('id', 'DESC')->findAll(6)
        ];

        return view('landing_page', $data);
    }

    /**
     * Halaman Daftar Menu Lengkap
     */
    public function menu($kategori = null)
    {
        $menuModel = new MenuModel();

        if ($kategori) {
            $menus = $menuModel->where('kategori', $kategori)->findAll();
            $title = 'Menu ' . ucfirst($kategori) . ' | Sukamaju House';
        } else {
            $menus = $menuModel->findAll();
            $title = 'Daftar Menu | Sukamaju House';
        }

        $data = [
            'title'          => $title,
            'menus'          => $menus,
            'kategori_aktif' => $kategori 
        ];

        return view('menu_page', $data);
    }

    /**
     * Halaman Tentang Kami
     */
    public function about()
    {
        $aboutModel = new AboutModel();
        $dataAbout = $aboutModel->find(1);

        $data = [
            'title' => 'Tentang Kami | Sukamaju House',
            'about' => $dataAbout
        ];

        return view('about', $data);
    }

    /**
     * Halaman Hubungi Kami / Kontak
     */
    public function contact()
    {
        $data = ['title' => 'Hubungi Kami | Sukamaju House'];
        return view('contact', $data);
    }

    /**
     * Halaman Galeri Foto Lengkap
     */
    public function galeri()
    {
        $galeriModel = new GaleriModel();
        $data = [
            'title'  => 'Galeri Foto | Sukamaju House',
            'galeri' => $galeriModel->orderBy('id', 'DESC')->findAll()
        ];
        return view('galeri', $data);
    }

    /**
     * Logika untuk memproses pengiriman pesan (Inbox) dari halaman kontak
     */
    public function kirim_pesan()
    {
        $pesanModel = new PesanModel();

        // 1. Validasi input
        if (!$this->validate([
            'nama'  => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'pesan' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Mohon lengkapi data dengan benar.');
        }

        // 2. SET ZONA WAKTU KE WIB (ASIA/JAKARTA)
        // Ini wajib agar jam tidak selisih 7 jam (UTC)
        date_default_timezone_set('Asia/Jakarta');

        // 3. Simpan ke database
        $pesanModel->save([
            'nama'       => $this->request->getPost('nama'),
            'email'      => $this->request->getPost('email'),
            'subject'    => $this->request->getPost('subject'),
            'pesan'      => $this->request->getPost('pesan'),
            
            // Waktu sekarang sudah otomatis mengikuti zona Asia/Jakarta
            'created_at' => date('Y-m-d H:i:s') 
        ]);

        return redirect()->to('/contact')->with('sukses', 'Pesan Toean & Njonja telah kami terima. Terima kasih.');
    }
}