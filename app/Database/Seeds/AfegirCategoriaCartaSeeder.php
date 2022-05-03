<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirCategoriaCartaSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'id_categoria_carta' => $i, //$title => $fake->sentence(6)
                'id_categoria' => $i,  //$title => $fake->sentence(6)
                'id_carta'  => $i, //$desc => $fake->text(100)

            ];

            $this->db->table('categoria_carta')->insert($data);
        }
    }
}
