<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirCategoriaSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");
        $data = [
            'id_categoria' => 1, //$title => $fake->sentence(6)
            'nom' => 'Menú del dia',  //$title => $fake->sentence(6)
            'descripcio'  => 'Aquest menú és el menú diari', //$desc => $fake->text(100)
            'actiu'  => 1,
            'codi_establiment'  => 1 //$desc => $fake->text(100)
        ];
        $this->db->table('categoria')->insert($data);

        for ($i = 2; $i < 11; $i++) {
            $data = [
                'id_categoria' => $i, //$title => $fake->sentence(6)
                'nom' => $fake->realText(10),  //$title => $fake->sentence(6)
                'descripcio'  => $fake->realText(50), //$desc => $fake->text(100)
                'actiu'  => 1,
                'codi_establiment'  => $i //$desc => $fake->text(100)
            ];

            $this->db->table('categoria')->insert($data);
        }
    }
}
