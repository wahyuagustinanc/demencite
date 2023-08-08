<?php

namespace App\Controllers;

use App\Libraries\Pdfgenerator;
use App\Models\M_Penilaian;
use App\Models\M_Pasien;

class Penilaian extends BaseController
{
    protected $M_Penilaian;
    protected $M_Pasien;

    public function __construct()
    {
        $this->M_Penilaian = new M_Penilaian();
        $this->M_Pasien = new M_Pasien();
    }

    public function index()
    {
        $data = [
            'menu' => 'penilaian',
            'submenu' => '',
            'judul' => 'Lembar Penilaian',
            'penilaian' => $this->M_Penilaian->getDokumen()
        ];

        return view('Penilaian/index', $data);
    }

    public function dokumentasi()
    {
        $penilaian = $this->M_Penilaian;

        $data = [
            'menu' => 'dokumentasi',
            'submenu' => '',
            'judul' => 'Lembar Penilaian',
            'penilaian' => $penilaian->getPasien(),
        ];

        return view('Penilaian/dokumentasi', $data);
    }

    public function tambah()
    {
        $penilaian = $this->M_Penilaian->findAll();

        $data = [
            'menu' => '',
            'submenu' => '',
            'judul' => "Tambah Lembar Penilaian",
            'penilaian' => $penilaian,
            'pasien' => $this->M_Pasien->findAll()
        ];

        return view('Penilaian/tambah', $data);
    }

    public function simpan()
    {
        // validasi input
        if (!$this->validate([
            'id_pasien' => [
                'label' => 'Nama pasien',
                'rules' => 'required'
            ],
            // 'orientasi_waktu' => '0',
            // 'orientasi_tempat' => '0',
            // 'registrasi' => '0',
            // 'atensi_kalkulus' => '0',
            // 'recall' => '0',
            // 'bahasa_benda' => '0',
            // 'bahasa_kata' => '0',
            // 'bahasa_perintah' => '0',
            // 'bahasa_perintah2' => '0',
            // 'bahasa_tulis' => '0',
            // 'bahasa_gambar' => '0',
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/penilaian/tambah')->withInput();
        }

        $this->M_Penilaian->save([
            'nama_pemeriksa' => $this->request->getVar('nama_pemeriksa'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'tanggal' => $this->request->getVar('tanggal'),
            'orientasi_waktu' => $this->request->getVar('orientasi_waktu'),
            'orientasi_tempat' => $this->request->getVar('orientasi_tempat'),
            'registrasi' => $this->request->getVar('registrasi'),
            'atensi_kalkulus' => $this->request->getVar('atensi_kalkulus'),
            'recall' => $this->request->getVar('recall'),
            'bahasa_benda' => $this->request->getVar('bahasa_benda'),
            'bahasa_kata' => $this->request->getVar('bahasa_kata'),
            'bahasa_perintah' => $this->request->getVar('bahasa_perintah'),
            'bahasa_perintah2' => $this->request->getVar('bahasa_perintah2'),
            'bahasa_tulis' => $this->request->getVar('bahasa_tulis'),
            'bahasa_gambar' => $this->request->getVar('bahasa_gambar'),
            'total' => $this->request->getVar('total'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        return redirect()->to('penilaian/dokumentasi');
    }

    public function detail($id_dokumentasi)
    {
        $data = [
            'menu' => '',
            'submenu' => '',
            'judul' => 'Detail Hasil Pemeriksaan',
            'detail' => $this->M_Penilaian->getDokumen($id_dokumentasi),
        ];

        return view('Penilaian/detail', $data);
    }

    public function hapus($id_dokumentasi)
    {
        $dataDokumen = $this->M_Penilaian->find($id_dokumentasi);
        if (empty($dataDokumen)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman Tidak Ditemukan');
        }
        $this->M_Penilaian->delete($id_dokumentasi);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/penilaian/dokumentasi');
    }
}