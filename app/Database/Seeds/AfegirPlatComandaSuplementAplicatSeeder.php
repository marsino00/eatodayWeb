<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use Faker\Factory;

class AfegirPlatComandaSuplementAplicatSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 2; $i < 11; $i++) {
            $data = [
                'id_plat_comanda_suplement_aplicat' => $i, //$title => $fake->sentence(6)
                'id_plat_comanda' => $i, //$title => $fake->sentence(6)
                'id_suplement_aplicat' => $i, //$title => $fake->sentence(6)
            ];

            $this->db->table('plat_comanda_suplement_aplicat')->insert($data);
        }
    }
}
