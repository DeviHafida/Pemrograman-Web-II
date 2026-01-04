<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MemberToUsersSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->truncate();
        $members = [
            ['id' => 1, 'nama' => 'Dimas Mahesa Madya', 'telp' => '081234567891', 'alamat' => 'Jl. Hasan Basri'],
            ['id' => 2, 'nama' => 'Arjuna Wira Atmadja', 'telp' => '082234567892', 'alamat' => 'Jl. Simpang Cemara Raya'],
            ['id' => 3, 'nama' => 'Raditya Taraka Bunga', 'telp' => '083334567893', 'alamat' => 'Jl. Sultan Adam'],
            ['id' => 4, 'nama' => 'Raglana Andaru Ranu', 'telp' => '084434567894', 'alamat' => 'Jl. Pramuka'],
            ['id' => 5, 'nama' => 'Nadindra Wadon Nugraha', 'telp' => '085534567895', 'alamat' => 'Jl. Sutoyo S'],
            ['id' => 6, 'nama' => 'Hadyan Arga', 'telp' => '086634567896', 'alamat' => 'Jl. Gatot Subroto'],
            ['id' => 7, 'nama' => 'Nandana Sohib Lesmana', 'telp' => '087734567897', 'alamat' => 'Jl. Belitung Darat'],
            ['id' => 8, 'nama' => 'Padantya Sanatana Astama', 'telp' => '088834567898', 'alamat' => 'Jl. Antasari'],
            ['id' => 9, 'nama' => 'Bahuwirya Adiguna Palibaya', 'telp' => '089934567899', 'alamat' => 'Jl. A. Yani'],
            ['id' => 10, 'nama' => 'Frisqi Saggaf', 'telp' => '081045678900', 'alamat' => 'Jl. Veteran'],
            ['id' => 11, 'nama' => 'Rendra Dirgantara', 'telp' => '087755554444', 'alamat' => 'Jalan Raya Stagen'],
        ];

        foreach ($members as $member) {
            $username = strtolower(str_replace(' ', '.', $member['nama']));

            $email = $username . '@gmail.com';

            $password = explode(' ', $member['nama'])[0] . substr($member['telp'], -3);

            $data = [
                'username' => $username,
                'email'    => $email,
                'password' => $password,
            ];

            $this->db->table('users')->insert($data);
        }
    }
}
