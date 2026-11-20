<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    // 1. Menampilkan Form Login
    public function index()
    {
        return view('auth/login');
    }


    // 2. Proses Login
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data = $model->where('username', $username)->first();
        
        if($data){
            $pass = $data['password'];
            if($pass == $password || password_verify($password, $pass)){
                $ses_data = [
                    'id'       => $data['id'],
                    'username' => $data['username'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin');
            }else{
                $session->setFlashdata('msg', 'Kata sandi salah, Toean!');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Nama penggoena tidak ditemoekan!');
            return redirect()->to('/login');
        }
    }


    // 3. Menampilkan Form Register
    public function register()
    {
        return view('auth/register');
    }


    // 4. Simpan Data Register 
    public function save()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $confpassword = $this->request->getVar('confpassword');

        if($password !== $confpassword){
            $session->setFlashdata('msg', 'Kata sandi tidak tjotjok!');
            return redirect()->to('/register');
        }

        $existingUser = $model->where('username', $username)->first();
        if($existingUser){
            $session->setFlashdata('msg', 'Nama penggoena soedah dipakai!');
            return redirect()->to('/register');
        }

        $model->save([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        $session->setFlashdata('success', 'Berhasil daftar! Silakan masoek.');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}