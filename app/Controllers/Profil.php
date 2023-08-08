<?php

namespace App\Controllers;

use App\Models\M_Profil;
use CodeIgniter\Session\Session;

class Profil extends BaseController
{
    protected $M_Profil;

    public function __construct()
    {
        $this->M_Profil = new M_Profil();
    }

    public function index()
    {
        $data = array(
            'menu' => 'profil',
            'submenu' => '',
            'judul' => 'Data Pengguna',
            'profil' => $this->M_Profil->all_data()
        );

        return view('Profil/index', $data);
    }

    function ubah($id)
    {
        $data = [
            'menu' => '',
            'submenu' => '',
            'judul' => 'Form Ubah Data Pengguna'
        ];

        $dataPengguna = $this->M_Profil->find($id);
        if (empty($dataPengguna)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengguna Tidak Ditemukan');
        }
        $data['pengguna'] = $dataPengguna;
        return view('Profil/ubah', $data);
    }

    public function perbarui($id)
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'label' => 'Nama penggun',
                'rules' => 'required'
            ],
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required'
            ],
            'no_hp' => [
                'label' => 'Nomor telepon',
                'rules' => 'required|numeric'
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required'
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required'
            ],
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $fileFoto = $this->request->getFile('foto');

        //cek gambar, apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            //pindah ke folder img
            $fileFoto->move('img');

            //ambil nama file
            $namaFoto = $fileFoto->getName();

            //hapus file lama
            unlink('img/' . $this->request->getVar('fotoLama'));
        }

        $this->M_Profil
            ->update($id, [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'no_hp' => $this->request->getVar('no_hp'),
                'password' => $this->request->getVar('password'),
                'level' => $this->request->getVar('level'),
                'foto' => $namaFoto
            ]);

        session()->setFlashdata('pesan', 'Data berhasil diperbarui');

        return redirect()->to('auth/logout');
    }
}
