<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirCartaSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'id_carta' => $i, //$title => $fake->sentence(6)
                'nom' => $fake->realText(25),  //$title => $fake->sentence(6)
                'descripcio'  => $fake->realText(100), //$desc => $fake->text(100)
                'actiu'  => 1,
            ];

            $this->db->table('carta')->insert($data);
        }
    }
}
