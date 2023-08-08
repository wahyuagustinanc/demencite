<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Penilaian extends Model
{
    protected $table = 'dokumentasi';
    protected $primaryKey = 'id_dokumentasi';
    protected $id_pasien;
    protected $allowedFields = [
        'id_dokumentasi', 'nama_pemeriksa', 'id_pasien', 'tanggal', 'orientasi_waktu', 'orientasi_tempat',
        'registrasi', 'atensi_kalkulus', 'recall', 'bahasa_benda', 'bahasa_kata', 'bahasa_perintah', 'bahasa_perintah2',
        'bahasa_tulis', 'bahasa_gambar', 'total'
    ];

    public function getDokumen($id_dokumentasi = false)
    {
        if ($id_dokumentasi == false) {
            return $this->findAll();
        }

        return $this->join('pasien', 'pasien.id_pasien=dokumentasi.id_pasien')
            ->where(['id_dokumentasi' => $id_dokumentasi])->first();
    }

    public function getPasien()
    {
        return $this->db->table('dokumentasi')
            ->join('pasien', 'pasien.id_pasien=dokumentasi.id_pasien')
            ->get()->getResultArray();
    }
}
