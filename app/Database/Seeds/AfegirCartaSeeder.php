<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirCartaSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");
        $data = [
            'id_carta' => 1, //$title => $fake->sentence(6)
            'nom' => "Carta d'hamburgueses",  //$title => $fake->sentence(6)
            'descripcio'  => "En aquesta carta trobaras una varietat d'hamburgueses", //$desc => $fake->text(100)
            'actiu'  => 1,
        ];

        $this->db->table('carta')->insert($data);
        for ($i = 2; $i < 11; $i++) {
            $data = [
                'id_carta' => $i, //$title => $fake->sentence(6)
                'nom' => "carta" . $i,  //$title => $fake->sentence(6)
                'descripcio'  => "descripcio de la carta " . $i, //$desc => $fake->text(100)
                'actiu'  => 1,
            ];

            $this->db->table('carta')->insert($data);
        }
    }
}
