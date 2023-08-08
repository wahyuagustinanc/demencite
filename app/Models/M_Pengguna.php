<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'email', 'no_hp', 'password', 'level', 'foto'];

    public function all_data()
    {
        return $this->db->table('pengguna')
            ->get()
            ->getResultArray();
    }
}
