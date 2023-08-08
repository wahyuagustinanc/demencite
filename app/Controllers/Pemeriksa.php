<?php

namespace App\Controllers;

use App\Models\M_Pemeriksa;

class Pemeriksa extends BaseController
{
    protected $M_Pemeriksa;

    public function __construct()
    {
        $this->M_Pemeriksa = new M_Pemeriksa();
    }

    public function index()
    {
        $pemeriksa = $this->M_Pemeriksa->findAll();

        $data = [
            'menu' => 'data',
            'submenu' => 'datapemeriksa',
            'judul' => 'Daftar Pemeriksa Demensia',
            'pemeriksa' => $pemeriksa
        ];

        return view('Pemeriksa/index', $data);
    }

    public function tambah()
    {
        $data = [
            'menu' => '',
            'submenu' => '',
            'judul' => "Form Tambah Data Pemeriksa",
        ];

        return view('Pemeriksa/tambah', $data);
    }

    public function simpan()
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'label' => 'Nama pemeriksa',
                'rules' => 'required'
            ],
            'nik' => [
                'label' => 'NIK pemeriksa',
                'rules' => 'required'
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],
            'posisi' => [
                'label' => 'Posisi pemeriksa',
                'rules' => 'required'
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/pemeriksa/tambah')->withInput();
        }

        $this->M_Pemeriksa->save([
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'posisi' => $this->request->getVar('posisi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/pemeriksa');
    }

    function ubah($id_pemeriksa)
    {
        $data = [
            'menu' => '',
            'submenu' => '',
            'judul' => 'Form Ubah Data Pemeriksa'
        ];

        $dataPemeriksa = $this->M_Pemeriksa->find($id_pemeriksa);
        if (empty($dataPemeriksa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pemeriksa Tidak Ditemukan');
        }
        $data['pemeriksa'] = $dataPemeriksa;
        return view('Pemeriksa/ubah', $data);
    }

    public function perbarui($id_pemeriksa)
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'label' => 'Nama pasien',
                'rules' => 'required'
            ],
            'nik' => [
                'label' => 'NIK pasien',
                'rules' => 'required'
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],
            'posisi' => [
                'label' => 'Posisi pemeriksa',
                'rules' => 'required'
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->M_Pemeriksa->update($id_pemeriksa, [
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'posisi' => $this->request->getVar('posisi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diperbarui');

        return redirect()->to('/pemeriksa');
    }

    public function hapus($id_pemeriksa)
    {
        $dataPemeriksa = $this->M_Pemeriksa->find($id_pemeriksa);
        if (empty($dataPemeriksa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pemeriksa Tidak Ditemukan');
        }
        $this->M_Pemeriksa->delete($id_pemeriksa);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/pemeriksa');
    }
}
