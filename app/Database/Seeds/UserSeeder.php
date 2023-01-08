<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name'     => 'Afi',
            'username' => 'afif',
            'email'    => 'afif@mail.com',
            'password' => password_hash('afifny', PASSWORD_BCRYPT),
            'role'     => 'member'
        ];
        $this->db->table('users')->insert($data);
    }
}
