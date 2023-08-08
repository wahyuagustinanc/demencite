<?php

namespace App\Controllers;

use App\Models\M_Auth;

class Auth extends BaseController
{
    protected $M_Auth;

    public function __construct()
    {
        helper('form');
        $this->M_Auth = new M_Auth();
    }

    public function register()
    {
        $data = array(
            'judul' => 'Demencite - Register',
        );
        return view('register', $data);
    }

    public function simpan_register()
    {
        if ($this->validate([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required'
            ],
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required'
            ],
            'no_hp' => [
                'label' => 'No Handphone',
                'rules' => 'required|numeric'
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required'
            ],
            'repassword' => [
                'label' => 'Ulangi password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => 'Password tidak sama!'
                ]
            ]
        ])) {
            //jika valid
            $data = array(
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'no_hp' => $this->request->getPost('no_hp'),
                'password' => $this->request->getPost('password'),
                'level' => 2
            );
            $this->M_Auth->simpan_register($data);
            session()->setFlashdata('pesan', 'Akun Berhasil Terdaftar!');
            return redirect()->to(base_url('/'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/register'));
        }
    }

    public function login()
    {
        $data = array(
            'judul' => 'Demencite - Login',
        );
        return view('login', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required'
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required'
            ]
        ])) {
            //jika valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $id = $this->request->getPost('id');
            $cek = $this->M_Auth->login($email, $password);
            if ($cek) {
                //jika data benar
                session()->set('login', true);
                session()->set('id', $cek['id']);
                session()->set('nama', $cek['nama']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);
                session()->set('foto', $cek['foto']);
                session()->set('no_hp', $cek['no_hp']);
                session()->set('password', $cek['password']);
                //login sukses
                return redirect()->to(base_url('home'));
            } else {
                //jika data tidak benar
                session()->setFlashdata('pesan', 'Login gagal, cek kembali email atau password anda!');
                return redirect()->to(base_url('/'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->remove('login');
        session()->remove('nama');
        session()->remove('email');
        session()->remove('level');
        session()->remove('foto');
        session()->setFlashdata('pesan', 'Berhasil Logout');
        return redirect()->to(base_url('/'));
    }
}
