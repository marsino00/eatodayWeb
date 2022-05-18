<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirSuplementSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");
        $data = [
            'id_suplement' => 1, //$title => $fake->sentence(6)
            'descripcio'  => 'Maionesa',
            'preu' => '3,00'
        ];

        $this->db->table('suplement')->insert($data);
        for ($i = 2; $i < 11; $i++) {
            $data = [
                'id_suplement' => $i, //$title => $fake->sentence(6)
                'descripcio'  => $fake->realText(10), //$desc => $fake->text(100)
                'preu' => $fake->randomFloat()
            ];

            $this->db->table('suplement')->insert($data);
        }
    }
}
