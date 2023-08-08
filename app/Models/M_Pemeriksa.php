<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pemeriksa extends Model
{
    protected $table = 'pemeriksa';
    protected $primaryKey = 'id_pemeriksa';
    protected $allowedFields = ['id_pemeriksa', 'nama', 'nik', 'jenis_kelamin', 'posisi'];
}
