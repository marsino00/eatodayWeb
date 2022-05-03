<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirAlergenSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'codi_alergen' => $i, //$title => $fake->sentence(6)
                'descripcio'  => $fake->realText(50), //$desc => $fake->text(100)
            ];

            $this->db->table('alergen')->insert($data);
        }
    }
}
