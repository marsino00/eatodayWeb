<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;


class AfegirCartaPlatSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'id_carta_plat' => $i, //$title => $fake->sentence(6)
                'id_carta'  => $i, //$desc => $fake->text(100)
                'id_plat' => $i,  //$title => $fake->sentence(6)

            ];

            $this->db->table('carta_plat')->insert($data);
        }
    }
}
