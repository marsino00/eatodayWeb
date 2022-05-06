<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirPlatSuplementSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'id_plat_suplement' => $i, //$title => $fake->sentence(6)
                'id_plat' => $i,  //$title => $fake->sentence(6)
                'id_suplement'  => $i, //$desc => $fake->text(100)

            ];

            $this->db->table('plat_suplement')->insert($data);
        }
    }
}
