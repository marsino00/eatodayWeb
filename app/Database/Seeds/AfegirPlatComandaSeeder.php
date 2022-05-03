<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirPlatComandaSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'id_plat_comanda' => $i, //$title => $fake->sentence(6)
                'id_plat' => $i, //$title => $fake->sentence(6)
                'id_comanda' => $i, //$title => $fake->sentence(6)
                'estat_plat' => "Elaborat",  //$title => $fake->sentence(6)

            ];

            $this->db->table('plat_comanda')->insert($data);
        }
    }
}
