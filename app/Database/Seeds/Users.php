<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        //
        $data = [
            'user_name' => 'toko buah',
            'user_mail' => 'test@gmail.com',
            'user_password' => password_hash('aufal', PASSWORD_DEFAULT)
        ];

        $this->db->table('users')->insert($data);
    }
}
