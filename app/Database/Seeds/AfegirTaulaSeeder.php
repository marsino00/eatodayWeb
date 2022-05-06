<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirTaulaSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'codi_taula' => $i, //$title => $fake->sentence(6)
                'codi_establiment'  => 1, //$desc => $fake->text(100)
            ];

            $this->db->table('taula')->insert($data);
        }
    }
}
