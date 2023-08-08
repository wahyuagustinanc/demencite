<?php

namespace App\Controllers;

use App\Models\M_Pengguna;

class Pengguna extends BaseController
{
    protected $M_Pengguna;

    public function __construct()
    {
        $this->M_Pengguna = new M_Pengguna();
        helper('form');
    }

    public function index()
    {
        if (session()->get('level') <> 1) {
            return redirect()->to(base_url('home'));
        }

        $data = array(
            'menu' => 'data',
            'submenu' => 'datapengguna',
            'judul' => 'Data Pengguna',
            'pengguna' => $this->M_Pengguna->all_data()
        );
        return view('Pengguna/index', $data);
    }

    public function tambah()
    {
        $data = [
            'menu' => '',
            'submenu' => '',
            'judul' => "Form Tambah Data Pengguna",
        ];

        return view('Pengguna/tambah', $data);
    }

    public function simpan()
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'label' => 'Nama pengguna',
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
            return redirect()->to('/pengguna/tambah')->withInput();
        }

        //ambil file foto
        $fileFoto = $this->request->getFile('foto');
        //apakah tidak ada gambar yg diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            //pindah ke folder img
            $fileFoto->move('img');

            //ambil nama file
            $namaFoto = $fileFoto->getName();
        }


        $this->M_Pengguna->save([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'password' => $this->request->getVar('password'),
            'level' => $this->request->getVar('level'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/pengguna');
    }

    function ubah($id)
    {
        $data = [
            'menu' => '',
            'submenu' => '',
            'judul' => 'Form Ubah Data Pengguna'
        ];

        $dataPengguna = $this->M_Pengguna->find($id);
        if (empty($dataPengguna)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengguna Tidak Ditemukan');
        }
        $data['pengguna'] = $dataPengguna;
        return view('Pengguna/ubah', $data);
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

            //jika file gambar default.png
            if ($this->request->getVar('fotoLama') != 'default.png') {
                unlink('img/' . $this->request->getVar('fotoLama'));
            }
        }

        $this->M_Pengguna->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'password' => $this->request->getVar('password'),
            'level' => $this->request->getVar('level'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diperbarui');

        return redirect()->to('/pengguna');
    }

    public function hapus($id)
    {
        //cari gambar berdasarkan id
        $dataPengguna = $this->M_Pengguna->find($id);

        //jika file gambar default
        if ($dataPengguna['foto'] != 'default.png') {
            //hapus gambar
            unlink('img/' . $dataPengguna['foto']);
        }

        if (empty($dataPengguna)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengguna Tidak Ditemukan');
        }
        $this->M_Pengguna->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/pengguna');
    }
}
