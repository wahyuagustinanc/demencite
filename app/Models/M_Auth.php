<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Auth extends Model
{
    public function simpan_register($data)
    {
        $this->db->table('pengguna')->insert($data);
    }

    public function login($email, $password)
    {
        return $this->db->table('pengguna')->where([
            'email' => $email,
            'password' => $password
        ])->get()->getRowArray();
    }
}
