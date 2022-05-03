<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirPlatSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'id_plat' => $i, //$title => $fake->sentence(6)
                'nom' => $fake->realText(25),  //$title => $fake->sentence(6)
                'descripcio_breu'  => $fake->realText(50), //$desc => $fake->text(100)
                'descripcio_detallada'  => $fake->realText(100), //$desc => $fake->text(100)
                'preu'  => $fake->randomDigit(),
            ];

            $this->db->table('plat')->insert($data);
        }
    }
}
