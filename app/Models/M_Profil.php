<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Profil extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'email', 'no_hp', 'password', 'foto'];

    public function all_data()
    {
        return $this->db->table('pengguna')
            ->where('id', session()->get('id'))
            ->get()
            ->getResultArray();
    }
}
