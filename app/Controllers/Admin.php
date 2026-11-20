<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\GaleriModel;
use App\Models\AboutModel;
use App\Models\PesanModel;

class Admin extends BaseController
{
    protected $menuModel;
    protected $galeriModel;
    protected $aboutModel;
    protected $pesanModel;

    public function __construct()
    {
        $this->menuModel   = new MenuModel();
        $this->galeriModel = new GaleriModel();
        $this->aboutModel  = new AboutModel();
        $this->pesanModel  = new PesanModel();
    }


    // 1. KELOLA MENOE KOPI & SADJIAN

    public function index()
    {
        $data = [
            'title' => 'Daftar Menoe | Dashboard Admin',
            'menus' => $this->menuModel->findAll()
        ];
        return view('admin/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Menoe Baroe'];
        return view('admin/create', $data);
    }

    public function store()
    {
        $fileGambar = $this->request->getFile('gambar');
        
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
        }

        $this->menuModel->save([
            'nama_menu' => $this->request->getVar('nama_menu') ?? $this->request->getVar('nama_kopi'),
            'kategori'  => $this->request->getVar('kategori'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga'     => $this->request->getVar('harga'),
            'gambar'    => $namaGambar
        ]);

        return redirect()->to('/admin')->with('pesan', 'Sadjian baroe berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Oebah Data Sadjian',
            'menu'  => $this->menuModel->find($id)
        ];
        return view('admin/edit', $data);
    }

    public function update($id)
    {
        $fileGambar = $this->request->getFile('gambar');
        $oldGambar  = $this->request->getVar('oldGambar');

        if ($fileGambar->getError() == 4) {
            $namaGambar = $oldGambar;
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);

            if ($oldGambar != 'default.jpg' && file_exists('img/' . $oldGambar)) {
                unlink('img/' . $oldGambar);
            }
        }

        $this->menuModel->save([
            'id'        => $id,
            'nama_menu' => $this->request->getVar('nama_menu') ?? $this->request->getVar('nama_kopi'),
            'kategori'  => $this->request->getVar('kategori'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga'     => $this->request->getVar('harga'),
            'gambar'    => $namaGambar
        ]);

        return redirect()->to('/admin')->with('pesan', 'Data sadjian berhasil diperbarui.');
    }

    public function delete($id)
    {
        $menu = $this->menuModel->find($id);

        if ($menu['gambar'] != 'default.jpg' && file_exists('img/' . $menu['gambar'])) {
            unlink('img/' . $menu['gambar']);
        }

        $this->menuModel->delete($id);
        return redirect()->to('/admin')->with('pesan', 'Sadjian telah dihapoese.');
    }


    // 2. KELOLA GALERI SUASANA

    public function galeri()
    {
        $data = [
            'title'  => 'Kelola Galeri Suasana',
            'galeri' => $this->galeriModel->findAll()
        ];
        return view('admin/galeri/index', $data);
    }

    public function galeri_create()
    {
        $data = ['title' => 'Tambah Foto Suasana'];
        return view('admin/galeri/create', $data);
    }

    public function galeri_store()
    {
        $fileGambar = $this->request->getFile('gambar');

        if (!$fileGambar->isValid()) {
            return redirect()->back()->with('error', 'Gambar tidak valid.');
        }

        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('img/galeri', $namaGambar);

        $this->galeriModel->save([
            'judul'    => $this->request->getVar('judul'),
            'subjudul' => $this->request->getVar('subjudul'),
            'gambar'   => $namaGambar
        ]);

        return redirect()->to('/admin/galeri')->with('pesan', 'Foto baroe berhasil ditambahkan ke galeri.');
    }

    // --- BAGIAN YANG DIPERBAIKI ---
    public function galeri_edit($id)
    {
        $data = [
            'title'  => 'Ubah Foto Galeri',
            'galeri' => $this->galeriModel->find($id)
        ];

        // Pastikan mengarah ke view 'edit' khusus galeri, bukan 'index'
        return view('admin/galeri/edit', $data); 
    }

    public function galeri_update($id)
    {
        $fileGambar = $this->request->getFile('gambar');
        $oldGambar  = $this->request->getVar('oldGambar');

        if ($fileGambar->getError() == 4) {
            $namaGambar = $oldGambar;
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img/galeri', $namaGambar);

            if ($oldGambar != '' && file_exists('img/galeri/' . $oldGambar)) {
                unlink('img/galeri/' . $oldGambar);
            }
        }

        $this->galeriModel->save([
            'id'       => $id,
            'judul'    => $this->request->getVar('judul'),
            'subjudul' => $this->request->getVar('subjudul'),
            'gambar'   => $namaGambar
        ]);

        return redirect()->to('/admin/galeri')->with('pesan', 'Data galeri berhasil diubah.');
    }

    public function galeri_delete($id)
    {
        $foto = $this->galeriModel->find($id);
        
        if($foto['gambar'] != '' && file_exists('img/galeri/' . $foto['gambar'])){
            unlink('img/galeri/' . $foto['gambar']);
        }

        $this->galeriModel->delete($id);

        return redirect()->to('/admin/galeri')->with('pesan', 'Foto galeri telah berhasil dihapoese.');
    }


    // 3. KELOLA HALAMAN ABOUT (TENTANG KAMI)

    public function about()
    {
        $data = [
            'title' => 'Kelola Halaman Tentang Kami',
            'about' => $this->aboutModel->find(1)
        ];
        return view('admin/about/index', $data);
    }

    public function about_update()
    {
        $id = $this->request->getVar('id');
        $fileGambar = $this->request->getFile('gambar');
        $oldGambar  = $this->request->getVar('oldGambar');

        if ($fileGambar->getError() == 4) {
            $namaGambar = $oldGambar;
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);

            if ($oldGambar != 'default.jpg' && file_exists('img/' . $oldGambar)) {
                unlink('img/' . $oldGambar);
            }
        }

        $this->aboutModel->save([
            'id'        => $id,
            'judul'     => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'gambar'    => $namaGambar
        ]);

        return redirect()->to('/admin/about')->with('pesan', 'Data About berhasil diperbarui!');
    }


    // 4. KELOLA PESAN MASUK / INBOX

    public function pesan()
    {
        $data = [
            'title' => 'Kotak Masuk / Kritik Saran',
            'pesan' => $this->pesanModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/pesan/index', $data);
    }

    public function pesan_delete($id)
    {
        $this->pesanModel->delete($id);
        return redirect()->to('/admin/pesan')->with('pesan', 'Pesan berhasil dihapus.');
    }
}