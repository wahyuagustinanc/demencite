<?php

namespace App\Controllers;

use App\Models\M_Pasien;

class Pasien extends BaseController
{
    protected $M_Pasien;

    public function __construct()
    {
        $this->M_Pasien = new M_Pasien();
    }

    public function index()
    {
        $pasien = $this->M_Pasien->findAll();

        $data = [
            'menu' => 'data',
            'submenu' => 'datapasien',
            'judul' => 'Data Pasien',
            'pasien' => $pasien,
        ];

        return view('Pasien/index', $data);
    }

    public function tambah()
    {
        $data = [
            'menu' => '',
            'submenu' => '',
            'judul' => "Form Tambah Data Pasien",
        ];

        return view('Pasien/tambah', $data);
    }

    public function simpan()
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'label' => 'Nama pasien',
                'rules' => 'required'
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],
            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required'
            ],
            'umur' => [
                'label' => 'Umur pasien',
                'rules' => 'required|numeric'
            ],
            'pendidikan' => [
                'label' => 'Pendidikan pasien',
                'rules' => 'required'
            ],
            'pekerjaan' => [
                'label' => 'Pekerjaan pasien',
                'rules' => 'required'
            ],
            'riwayat_penyakit' => [
                'label' => 'Riwayat penyakit pasien',
                'rules' => 'required'
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/pasien/tambah')->withInput();
        }

        $this->M_Pasien->save([
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'umur' => $this->request->getVar('umur'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'riwayat_penyakit' => $this->request->getVar('riwayat_penyakit')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/pasien');
    }

    function ubah($id_pasien)
    {
        $data = [
            'menu' => '',
            'submenu' => '',
            'judul' => 'Form Ubah Data Pasien'
        ];

        $dataPasien = $this->M_Pasien->find($id_pasien);
        if (empty($dataPasien)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman Tidak Ditemukan');
        }
        $data['pasien'] = $dataPasien;
        return view('Pasien/ubah', $data);
    }

    public function perbarui($id_pasien)
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'label' => 'Nama pasien',
                'rules' => 'required'
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],
            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required'
            ],
            'umur' => [
                'label' => 'Umur pasien',
                'rules' => 'required|numeric'
            ],
            'pendidikan' => [
                'label' => 'Pendidikan pasien',
                'rules' => 'required'
            ],
            'pekerjaan' => [
                'label' => 'Pekerjaan pasien',
                'rules' => 'required'
            ],
            'riwayat_penyakit' => [
                'label' => 'Riwayat penyakit pasien',
                'rules' => 'required'
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->M_Pasien->update($id_pasien, [
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'umur' => $this->request->getVar('umur'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'riwayat_penyakit' => $this->request->getVar('riwayat_penyakit')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diperbarui');

        return redirect()->to('/pasien');
    }

    public function hapus($id_pasien)
    {
        $dataPasien = $this->M_Pasien->find($id_pasien);
        if (empty($dataPasien)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman Tidak Ditemukan');
        }
        $this->M_Pasien->delete($id_pasien);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/pasien');
    }
}
