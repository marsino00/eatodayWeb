<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirSuplementAplicatSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 2; $i < 11; $i++) {
            $data = [
                'id_suplement_aplicat' => $i, //$title => $fake->sentence(6)
                'descripcio'  => $fake->realText(100), //$desc => $fake->text(100)
                'preu' => $fake->randomFloat()
            ];

            $this->db->table('suplement_aplicat')->insert($data);
        }
    }
}
