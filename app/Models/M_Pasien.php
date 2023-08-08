<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pasien extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $allowedFields = ['id_pasien', 'nama', 'jenis_kelamin', 'tgl_lahir', 'umur', 'pendidikan', 'pekerjaan', 'riwayat_penyakit'];

    public function grafikJK()
    {
        return $this->db->query('SELECT jenis_kelamin, COUNT(*) as total FROM pasien GROUP BY jenis_kelamin')->getResultArray();
    }
}
