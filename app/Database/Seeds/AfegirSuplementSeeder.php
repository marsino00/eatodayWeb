<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirSuplementSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'id_suplement' => $i, //$title => $fake->sentence(6)
                'descripcio'  => $fake->realText(50), //$desc => $fake->text(100)
            ];

            $this->db->table('suplement')->insert($data);
        }
    }
}
