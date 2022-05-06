<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirPlatAlergenSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'id_plat_alergen' => $i, //$title => $fake->sentence(6)
                'id_plat' => 1,  //$title => $fake->sentence(6)
                'codi_alergen'  => $i, //$desc => $fake->text(100)

            ];

            $this->db->table('plat_alergen')->insert($data);
        }
    }
}
