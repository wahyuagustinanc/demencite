<?php

namespace App\Controllers;

use App\Models\M_Pasien;
use App\Models\M_Pemeriksa;
use App\Models\M_Pengguna;
use App\Models\M_Penilaian;

class Home extends BaseController
{
    protected $M_Pasien;
    protected $M_Pemeriksa;
    protected $M_Pengguna;
    protected $M_Penilaian;

    public function __construct()
    {
        $this->M_Pasien = new M_Pasien();
        $this->M_Pemeriksa = new M_Pemeriksa();
        $this->M_Pengguna = new M_Pengguna();
        $this->M_Penilaian = new M_Penilaian();
    }
    public function index()
    {
        $pasien = $this->M_Pasien->get()->resultID->num_rows;
        $pemeriksa = $this->M_Pemeriksa->get()->resultID->num_rows;
        $pengguna = $this->M_Pengguna->get()->resultID->num_rows;
        $penilaian = $this->M_Penilaian->get()->resultID->num_rows;
        $data = [
            'menu' => 'home',
            'submenu' => '',
            'judul' => 'Sistem Pencatatan Pemeriksaan Demensia',
            'pasien' => $pasien,
            'pemeriksa' => $pemeriksa,
            'pengguna' => $pengguna,
            'penilaian' => $penilaian,
            'pas' => $this->M_Pasien->findAll(),
            'pen' => $this->M_Penilaian->findAll()
        ];

        echo view('Home/index', $data);
    }
}
