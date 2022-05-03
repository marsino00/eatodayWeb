<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirCategoriaSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'id_categoria' => $i, //$title => $fake->sentence(6)
                'nom' => $fake->realText(25),  //$title => $fake->sentence(6)
                'descripcio'  => $fake->realText(100), //$desc => $fake->text(100)
                'actiu'  => 1,
                'codi_establiment'  => $i //$desc => $fake->text(100)
            ];

            $this->db->table('categoria')->insert($data);
        }
    }
}
