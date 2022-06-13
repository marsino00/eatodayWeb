<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AfegirTemaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_tema' => 1, //$title => $fake->sentence(6)
            'descripcio'  => "Atenció al client", //$desc => $fake->text(100)
        ];

        $this->db->table('tema')->insert($data);
        for ($i = 2; $i < 11; $i++) {
            $data = [
                'id_tema' => $i, //$title => $fake->sentence(6)
                'descripcio'  => "Tema " . $i, //$desc => $fake->text(100)
            ];

            $this->db->table('tema')->insert($data);
        }
    }
}
